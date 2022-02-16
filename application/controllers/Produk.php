<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Produk extends CI_Controller
{
    public function index()
    {
        $data['title'] = 'Jam Tangan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $user_id = $data['user']['id_user'];
        $data['jamtangan'] = $this->modeluser->getdatajamuser($user_id);


        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('produk/jamtangan', $data);
        $this->load->view('template/footer');
    }

    public function tambahproduk()
    {
        $data['title'] = 'Tambah Jam Tangan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $user_id = $data['user']['id_user'];
        //   Validation
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required', ['required' => 'Nama Produk Harus Diisi']);
        $this->form_validation->set_rules(
            'harga',
            'Harga',
            'trim|required|numeric|min_length[5]',
            [
                'required' => 'Harga Harus Diisi',
                'numeric' => 'Terjadi Kesalahan Input Harga',
                'min_length' => 'Terjadi Kesalahan Input Harga'
            ]
        );
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required', ['required' => 'Deskripsi Harus Diisi']);


        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('produk/tambahjamtangan', $data);
            $this->load->view('template/footer');
        } else {
            // Cek Gambar
            $gambar = $_FILES['gambar']['name'];
            if ($gambar) {
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/fototoko';
                $this->load->library('upload', $config);

                if (!$this->upload->do_upload('gambar')) {
                    echo "Gagal";
                    die;
                } else $gambar = $this->upload->data('file_name');
            }

            $this->modeluser->tambahprodukjam($gambar, $user_id);
            $this->session->set_flashdata('pesan', 'Tambah Produk Jam');
            redirect('produk');
        }
    }

    public function hapusproduk($id_produk)
    {
        $this->modeluser->hapusproduk($id_produk);
        $this->session->set_flashdata('pesan', 'Hapus Produk Jam');
        redirect('produk');
    }

    public function updateproduk($id_produk)
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Edit Produk Jam Tangan';
        $data['jamtangan'] = $this->db->get_where('produk_jam', ['id_produk' => $id_produk])->row_array();

        //   Validation
        $this->form_validation->set_rules('nama', 'Nama', 'trim|required', ['required' => 'Nama Produk Harus Diisi']);
        $this->form_validation->set_rules(
            'harga',
            'Harga',
            'trim|required|numeric|min_length[5]',
            [
                'required' => 'Harga Harus Diisi',
                'numeric' => 'Terjadi Kesalahan Input Harga',
                'min_length' => 'Terjadi Kesalahan Input Harga'
            ]
        );
        $this->form_validation->set_rules('deskripsi', 'Deskripsi', 'trim|required', ['required' => 'Deskripsi Harus Diisi']);

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('produk/updatejamtangan', $data);
            $this->load->view('template/footer');
        } else {
            $gambar = $_FILES['gambar']['name'];
            $old_gambar = $data['jamtangan']['gambar'];
            if ($gambar) {
                $config['allowed_types'] = 'jpeg|jpg|png';
                $config['max_size']     = '2048';
                $config['upload_path'] = './assets/img/fototoko';
                $this->load->library('upload', $config);
                if ($this->upload->do_upload('gambar')) {
                    unlink(FCPATH . 'assets/img/fototoko/' . $old_gambar);
                    $gambar = $this->upload->data('file_name');
                }
            } else {
                $gambar = $old_gambar;
            }
            $nama = $this->input->post('nama');
            $harga = $this->input->post('harga');
            $deskripsi = $this->input->post('deskripsi');
            $data = [
                "nama" => $nama,
                "harga" => $harga,
                "deskripsi" => $deskripsi,
                "gambar" => $gambar
            ];
            $this->db->where('id_produk', $id_produk);
            $this->db->update('produk_jam', $data);
            $this->session->set_flashdata('pesan', 'Update Produk Jam');
            redirect('produk');
        }
    }
    public function pesanan()
    {
        $data['title'] = 'Pesanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $agen_id = $data['user']['id_user'];
        $data['pesanan'] = $this->modeluser->tampilpesanan($agen_id);

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('produk/pesanan', $data);
        $this->load->view('template/footer');
    }

    public function detailpesanan($id)
    {
        $data['title'] = 'Detail Pesanan';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['pesanan'] = $this->modeluser->detailpesanan($id);

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('produk/detailpesanan', $data);
        $this->load->view('template/footer');
    }

    public function setpesanan($id)
    {
        $status = htmlspecialchars($this->input->post('status', true));
        $data['update'] = $this->modeluser->setpesanan($id, $status);
        if ($status == 'Selesai') {
            $this->session->set_flashdata('pesan', 'Selesaikan Pesanan');
        } else {
            $this->session->set_flashdata('pesan', 'Update Status Pesanan');
        }
        redirect('produk/pesanan');
    }


    public function invoice()
    {
        $data['title'] = 'Invoice';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $agen_id = $data['user']['id_user'];
        $data['invoice'] = $this->modeluser->getdatainvoice($agen_id);


        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('produk/invoice', $data);
        $this->load->view('template/footer');
    }

    public function detailinvoice($id)
    {
        $data['title'] = 'Detail Invoice';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['invoice'] = $this->modeluser->detailinvoice($id);

        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('produk/detailinvoice', $data);
        $this->load->view('template/footer');
    }
}
