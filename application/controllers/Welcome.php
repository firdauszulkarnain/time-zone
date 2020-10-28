<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Welcome extends CI_Controller
{
	public function index()
	{
		$data['judul'] = 'TimeZone';
		$this->load->view('template_toko/header', $data);
		$this->load->view('template_toko/galeri_foto');
		$this->load->view('template_toko/index');
		$this->load->view('template_toko/footer');
	}
}
