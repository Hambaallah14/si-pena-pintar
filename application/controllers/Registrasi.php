<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
Class Registrasi extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
        $this->load->model('MPeserta');
	}

	public function index(){
		
    }

	public function add(){
		$data['title'] 	  	      = "Registrasi Peserta - SI Pena Pintar";
		$this->form_validation->set_rules('peserta-nip', 'peserta-nip', 'required');
		$this->form_validation->set_rules('peserta-nama', 'peserta-nama', 'required');
		$this->form_validation->set_rules('peserta-alamat', 'peserta-alamat', 'required');
		$this->form_validation->set_rules('peserta-no_telp', 'peserta-no_telp', 'required');
		$this->form_validation->set_rules('peserta-email', 'peserta-email', 'required');
        $this->form_validation->set_rules('peserta-instansi', 'peserta-instansi', 'required');
        $this->form_validation->set_rules('peserta-unor', 'peserta-unor', 'required');
        $this->form_validation->set_rules('peserta-pelatihan', 'peserta-pelatihan', 'required');
        $this->form_validation->set_rules('peserta-password', 'peserta-password', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('kerangka/_1_header-css', $data);
			$this->load->view('kerangka/_2_sidebar');
			$this->load->view('login/login');
			$this->load->view('kerangka/_4_footer-js');
		}
		else{
			$this->MPeserta->add();
			$this->session->set_flashdata('flash1', 'Disimpan');
			redirect('login');
		}
	}
}
 ?>
