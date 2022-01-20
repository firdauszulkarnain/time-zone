<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Customer extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        if ($data['user'] != null) {
            $role = $data['user']['role_id'];
            if ($role == 1) {
                redirect('admin');
            } else if ($role == 2) {
                redirect('user');
            }
        }
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['judul'] = 'Time Zone';

        $this->load->library('pagination');
        // Halaman Pagination
        $config['total_rows'] = $this->modeluser->hitungdataprodukjam();
        $config['base_url'] = 'http://localhost/time-zone/customer/index';
        // Total Baris Pagination
        $config['per_page'] = 6;

        // INISIALISASI Pagination
        $this->pagination->initialize($config);
        // END INISIALISASI

        $data['start'] = $this->uri->segment(3);
        $data['jamtangan'] = $this->modeluser->getdatajam($config['per_page'], $data['start']);
        // END PAGINATION
        $this->load->view('template_toko/header', $data);
        $this->load->view('template_toko/galeri_foto');
        $this->load->view('template_toko/index', $data);
        $this->load->view('template_toko/footer');
    }

    public function customer_profile()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['judul'] = 'Edit Profile';
        $this->form_validation->set_rules(
            'nama',
            'Nama',
            'trim|required',
            [
                'required' => 'Nama Harus Diisi'
            ]
        );
        $this->form_validation->set_rules(
            'notelp',
            'No Telephone',
            'required|trim|min_length[11]|numeric',
            [
                'required' => 'No Telephone Tidak Boleh Kosong',
                'min_length' => 'No Telephone Salah',
                'numeric' => 'No Telephone Salah'
            ]
        );

        if ($this->form_validation->run() == false) {
            $this->load->view('template_toko/header', $data);
            $this->load->view('template_toko/edit_customer', $data);
            $this->load->view('template_toko/footer');
        } else {

            // Cek Gambar
            $image = $_FILES['image']['name'];
            if ($image) {
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/profile';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('image')) {
                    $old_image = $data['user']['foto'];
                    if ($old_image != 'Default.jpg') {
                        unlink(FCPATH . 'assets/img/profile/' . $old_image);
                    }
                    $new_image = $this->upload->data('file_name');
                    $this->db->set('foto', $new_image);
                } else {
                    echo $this->upload->display_errors();
                }
            }



            $nama = $this->input->post('nama');
            $email = $this->input->post('email');
            $notelp = $this->input->post('notelp');
            $this->db->set('nama', $nama);
            $this->db->set('notelp', $notelp);
            $this->db->where('email', $email);
            $this->db->update('user');
            $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil</strong> Update Profile
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
            </div>');
            redirect('customer/customer_profile');
        }
    }

    public function shop()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Shop Time Zone';

        $this->load->library('pagination');
        // Halaman Pagination
        $config['total_rows'] = $this->modeluser->hitungdataprodukjam();
        $config['base_url'] = 'http://localhost/time-zone/customer/shop';
        // Total Baris Pagination
        $config['per_page'] = 6;

        // INISIALISASI Pagination
        $this->pagination->initialize($config);
        // END INISIALISASI

        $data['start'] = $this->uri->segment(3);
        $data['jamtangan'] = $this->modeluser->getdatajamnewest($config['per_page'], $data['start']);
        $data['prices'] = $this->modeluser->getdatajamprices($config['per_page'], $data['start']);
        // END PAGINATION
        $this->load->view('template_toko/header', $data);
        $this->load->view('template_toko/shop');
        $this->load->view('template_toko/footer');
    }

    public function keranjang()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        if ($this->session->userdata('email')) {
            $data['judul'] = 'Trolley';
            $this->load->view('template_toko/header', $data);
            $this->load->view('template_toko/keranjang');
            $this->load->view('template_toko/footer');
        } else {
            redirect('auth');
        }
    }

    public function tambahkeranjang($id_produk)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jamtangan'] = $this->modeluser->detailproduk($id_produk);
        $id = $data['jamtangan']['id_produk'];
        $price = $data['jamtangan']['harga'];
        $nama = $data['jamtangan']['nama'];
        $gambar = $data['jamtangan']['gambar'];
        $namauser = $data['jamtangan']['nama_user'];
        $qty = $this->input->post('qty');
        if ($qty > 1) {
            $qty = $qty;
        } else {
            $qty = 1;
        }
        $data = array(
            'id'            => $id,
            'qty'           => $qty,
            'price'         => $price,
            'name'          => $nama,
            'picture'       => $gambar,
            'user'          => $namauser
        );

        if ($data) {
            $this->cart->insert($data);
            redirect('customer/keranjang');
        } else {
            redirect('customer');
        }
    }



    public function detailproduk($id_produk)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['jm'] = $this->modeluser->detailproduk($id_produk);
        $data['judul'] = 'Detail Produk';

        $this->load->view('template_toko/header', $data);
        $this->load->view('template_toko/detailproduk');
        $this->load->view('template_toko/footer');
    }

    public function hapuskeranjang()
    {
        $this->cart->destroy();
        redirect('customer/keranjang');
    }

    public function hapusproduk($row_id)
    {
        $coba = $this->cart->remove($row_id);
        redirect('customer/keranjang');
    }

    public function aboutus()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['judul'] = 'About Us';
        $this->load->view('template_toko/header', $data);
        $this->load->view('template_toko/about');
        $this->load->view('template_toko/footer');
    }

    public function contact()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['judul'] = 'Contacts';
        $this->load->view('template_toko/header', $data);
        $this->load->view('template_toko/contact');
        $this->load->view('template_toko/footer');
    }

    public function bayar()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Checkout';
        $id_user = $data['user']['id_user'];
        $data['provuser'] = $this->modeluser->getdatauser($id_user);
        $data['kab'] = $this->modeluser->getdatakab($id_user);
        if (!$this->session->userdata('email')) {
            redirect('auth');
        }

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', ['required' => 'Nama Toko Tidak Boleh Kosong']);
        $this->form_validation->set_rules(
            'notelp',
            'No Telephone',
            'required|trim|min_length[11]|numeric',
            [
                'required' => 'No Telephone Tidak Boleh Kosong',
                'min_length' => 'No Telephone Salah',
                'numeric' => 'No Telephone Salah'
            ]
        );
        $this->form_validation->set_rules('alamat', 'Alamat Lengkap', 'required|trim', ['required' => 'Alamat Tidak Boleh Kosong']);
        $this->form_validation->set_rules('kabupaten', 'Kabupaten', 'required|trim', ['required' => 'Kabupaten Tidak Boleh Kosong']);


        if ($this->form_validation->run() == false) {
            $this->load->view('template_toko/header', $data);
            $this->load->view('template_toko/checkout', $data);
            $this->load->view('template_toko/footer');
        } else {
            $this->modeluser->checkout($id_user);
            // $this->session->set_flashdata('checkout', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil</strong> Melakukan Pesanan
            // <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            //     <span aria-hidden="true">&times;</span>
            // </button>
            // </div>');
            $this->cart->destroy();
            redirect('customer/pesanan_customer');
        }
    }

    public function pesanan_customer()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['judul'] = 'Pesanan Saya';
        $user_id = $data['user']['id_user'];
        $data['pesanan'] = $this->modeluser->pesanancustomer($user_id);
        $this->load->view('template_toko/header', $data);
        $this->load->view('template_toko/pesanan_customer');
        $this->load->view('template_toko/footer');
    }
}
