<?php

defined('BASEPATH') or exit('No direct script access allowed');

class User extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        ceklogin();
    }
    public function index()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'My Profil';
        $this->load->view('template/header', $data);
        $this->load->view('template/sidebar');
        $this->load->view('template/topbar');
        $this->load->view('user/index');
        $this->load->view('template/footer');
    }

    public function edit()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();

        $data['title'] = 'Edit Profile';
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
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('user/edituser', $data);
            $this->load->view('template/footer');
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
            redirect('user');
        }
    }


    public function changepassword()
    {
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['title'] = 'Change Password';
        $this->form_validation->set_rules(
            'password_saatini',
            'Password Saat Ini',
            'trim|required',
            ['required' => 'Password Saat Ini Harus Diisi']
        );
        $this->form_validation->set_rules(
            'password_baru1',
            'Password Baru',
            'required|trim|min_length[6]|matches[password_baru2]',
            [
                'required' => 'Password Baru Tidak Boleh Kosong',
                'min_length' => 'Password Kurang Dari 6 Karakter',
                'matches' => 'Password Baru Tidak Sama'
            ]
        );
        $this->form_validation->set_rules(
            'password_baru2',
            'Konfirmasi Password',
            'required|trim|matches[password_baru1]',
            [
                'required' => 'Konfirmasi Password Tidak Boleh Kosong',
                'matches' => 'Konfirmasi Password Tidak Sama'
            ]
        );
        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('user/changepassword');
            $this->load->view('template/footer');
        } else {
            $current_password = htmlspecialchars($this->input->post('password_saatini', true));
            $password_tersimpan = $data['user']['password'];
            $newpassword = htmlspecialchars($this->input->post('password_baru1', true));
            if (!password_verify($current_password, $password_tersimpan)) {
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Gagal</strong> Password Saat Ini Salah
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>');
                redirect('user/changepassword');
            } else {
                if ($newpassword == $current_password) {
                    $this->session->set_flashdata('pesan', '<div class="alert alert-danger alert-dismissible fade show" role="alert"><strong>Gagal</strong> Password Baru Tidak Boleh Sama Dengan Password Saat Ini
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>');
                    redirect('user/changepassword');
                } else {
                    $password_hash = password_hash($newpassword, PASSWORD_DEFAULT);
                    $this->db->set('password', $password_hash);
                    $this->db->where('email', $data['user']['email']);
                    $this->db->update('user');

                    $this->session->set_flashdata('pesan', '<div class="alert alert-success alert-dismissible fade show" role="alert"><strong>Berhasil</strong> Update Password
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                        </div>');
                    redirect('user/changepassword');
                }
            }
        }
    }
}
