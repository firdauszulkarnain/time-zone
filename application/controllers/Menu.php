<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        ceklogin();
    }

    public function index()
    {
        // Title
        $data['title'] = 'Menu Management';
        // Topbar User
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        // $data['menu'] = $this->db->get('user_menu')->result_array();

        $this->form_validation->set_rules(
            'menu',
            'Menu',
            'trim|required',
            ['required' => 'Nama Menu Harus Diisi']
        );

        $this->load->library('pagination');
        // Halaman Pagination
        $config['total_rows'] = $this->modelmenu->hitungdata();
        $config['base_url'] = 'http://localhost/time-zone/menu/index';
        // Total Baris Pagination
        $config['per_page'] = 3;

        // INISIALISASI Pagination
        $this->pagination->initialize($config);
        // END INISIALISASI

        $data['start'] = $this->uri->segment(3);
        $data['menu'] = $this->modelmenu->getdatamenu($config['per_page'], $data['start']);
        // END PAGINATION

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('menu/index', $data);
            $this->load->view('template/footer');
        } else {
            //Menambahkan Menu
            $this->db->insert('user_menu', ['menu' => $this->input->post('menu')]);
            $this->session->set_flashdata('pesan', 'Tambahkan Menu');
            redirect('menu');
        }
    }

    // Hapus Menu
    public function hapusmenu($id)
    {
        $this->modelmenu->hapusmenu($id);
        $this->session->set_flashdata('pesan', 'Hapus Menu');
        redirect('menu');
    }

    // Update Menu
    public function updatemenu($id)
    {
        $data['title'] = 'Menu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get_where('user_menu', ['id_menu' => $id])->row_array();

        $this->form_validation->set_rules('menu', 'Menu', 'trim|required', ['required' => 'Nama Menu Harus Diisi']);


        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('menu/updatemenu');
            $this->load->view('template/footer');
        } else {
            $this->modelmenu->updatemenu($id);
            $this->session->set_flashdata('pesan', 'Update Menu');
            redirect('menu');
        }
    }

    // SUBMENU
    public function submenu()
    {
        $data['title'] = 'SubMenu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->db->get('user_menu')->result_array();
        // $data['submenu'] = $this->modelmenu->getdatasubmenu();

        $this->form_validation->set_rules('title', 'Title', 'trim|required', ['required' => 'Nama Menu Harus Diisi']);
        $this->form_validation->set_rules('menu_id', 'Menu', 'trim|required', ['required' => 'Pilih Menu']);
        $this->form_validation->set_rules('url', 'Url', 'trim|required', ['required' => 'URL Harus Diisi']);
        $this->form_validation->set_rules('icon', 'Icon', 'trim|required', ['required' => 'Icon Harus Diisi']);

        $this->load->library('pagination');
        // Halaman Pagination
        $config['total_rows'] = $this->modelmenu->hitungdatasubmenu();
        $config['base_url'] = 'http://localhost/time-zone/menu/submenu';
        // Total Baris Pagination
        $config['per_page'] = 3;

        // INISIALISASI Pagination
        $this->pagination->initialize($config);
        // END INISIALISASI

        $data['start'] = $this->uri->segment(3);
        $data['submenu'] = $this->modelmenu->getdatasubmenu($config['per_page'], $data['start']);
        // END PAGINATION

        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('menu/submenu', $data);
            $this->load->view('template/footer');
        } else {
            $this->modelmenu->tambahsubmenu();
            $this->session->set_flashdata('pesan', 'Tambahkan Sub Menu');
            redirect('menu/submenu');
        }
    }

    // Hapus Sub Menu
    public function hapussubmenu($id)
    {
        $this->modelmenu->hapussubmenu($id);
        $this->session->set_flashdata('pesan', 'Hapus Sub Menu');
        redirect('menu/submenu');
    }

    // Update Sub MEnu
    public function updatesubmenu($id)
    {
        $data['title'] = 'SubMenu Management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['submenu'] = $this->modelmenu->getdataupdatesubmenu($id);
        // Ambil Menu_id Untuk Foreign Key Id_menu
        $idmenu = $data['submenu']['menu_id'];
        // Ambil Data Home Menu
        $data['menu'] = $this->db->get_where('user_menu', ['id_menu !=' => $idmenu])->result_array();

        $this->form_validation->set_rules('title', 'Title', 'trim|required', ['required' => 'Nama Menu Harus Diisi']);
        $this->form_validation->set_rules('url', 'Url', 'trim|required', ['required' => 'URL Harus Diisi']);
        $this->form_validation->set_rules('icon', 'Icon', 'trim|required', ['required' => 'Icon Harus Diisi']);


        if ($this->form_validation->run() == false) {
            $this->load->view('template/header', $data);
            $this->load->view('template/sidebar');
            $this->load->view('template/topbar');
            $this->load->view('menu/updatesubmenu', $data);
            $this->load->view('template/footer');
        } else {
            $this->modelmenu->updatesubmenu($id);
            $this->session->set_flashdata('pesan', 'Update Sub Menu');
            redirect('menu/submenu');
        }
    }
}
