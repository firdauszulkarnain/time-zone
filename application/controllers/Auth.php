<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function pilih()
    {
        $data['title'] = 'Login Page';
        $this->load->view('template/auth_header', $data);
        $this->load->view('auth/pilih');
        $this->load->view('template/auth_footer');
    }

    public function index()
    {
        if ($this->session->userdata('email')) {
            redirect('user');
        }
        $data['title'] = 'Login Page';
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email', [
            'required' => 'Email Tidak Boleh Kosong',
            'valid_email' => "Email Tidak Valid"
        ]);
        $this->form_validation->set_rules('password', 'password', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/auth_header', $data);
            $this->load->view('auth/login');
            $this->load->view('template/auth_footer');
        } else {
            $this->_login();
        }
    }

    private function _login()
    {

        $email = htmlspecialchars($this->input->post('email'));
        $password = $this->input->post('password');

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        // Jika Usernya Ada
        if ($user) {
            // Jika Usernya Active

            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $user['email'],
                    'role_id' => $user['role_id']
                ];
                $this->session->set_userdata($data);
                if ($user['role_id'] == 1) {
                    redirect('admin');
                } else if ($user['role_id'] == 2) {
                    redirect('user');
                } else {
                    redirect('customer');
                }
            } else {
                $this->session->set_flashdata('error', 'Email Belum Diaktivasi');
                redirect('auth');
            }
        } else {
            $this->session->set_flashdata('pesan', 'Email Bellum Terdaftar');
            redirect('auth');
        }
    }

    public function register($role_id)
    {
        $data['kabupaten'] = $this->db->get('kabupaten')->result_array();
        if ($this->session->userdata('email')) {
            redirect('user');
        }
        $data['title'] = 'Form Regis';
        if ($role_id == 3) {
            $data['regis'] = 'CUSTOMER';
        } else if ($role_id == 2) {
            $data['regis'] = 'SELLER';
        }

        $this->form_validation->set_rules('nama', 'Nama Lengkap', 'required|trim', ['required' => 'Nama Toko Tidak Boleh Kosong']);
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email|is_unique[user.email]', [
            'required' => 'Email Tidak Boleh Kosong',
            'valid_email' => "Email Tidak Valid",
            'is_unique' => "Email Telah Digunakan"
        ]);
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
        $this->form_validation->set_rules('kabupaten', 'Kapubaten', 'required|trim', ['required' => 'Kabupaten Tidak Boleh Kosong']);

        $this->form_validation->set_rules(
            'password1',
            'Password',
            'required|trim|min_length[6]|matches[password2]',
            [
                'required' => 'Password Tidak Boleh Kosong',
                'min_length' => 'Password Kurang Dari 6 Karakter',
                'matches' => 'Password Tidak Sama'
            ]
        );
        $this->form_validation->set_rules('password2', 'Password', 'required|trim|matches[password1]');

        if ($this->form_validation->run() == false) {
            $this->load->view('template/auth_header', $data);
            $this->load->view('auth/register', $data);
            $this->load->view('template/auth_footer');
        } else {
            $this->modeluser->registrasi($role_id);
            $this->session->set_flashdata('pesan', 'Registrasi Akun, Silahkan Login');
            redirect('auth');
        }
    }


    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('pesan', 'Logout Berhasil');
        redirect('/');
    }

    public function blocked()
    {
        $data['title'] = 'Access Blocked';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('template/auth_header', $data);
        $this->load->view('auth/blocked', $data);
        $this->load->view('template/auth_footer');
    }
}
