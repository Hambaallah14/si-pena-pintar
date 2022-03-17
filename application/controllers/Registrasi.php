<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
Class Registrasi extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
        $this->load->model('MPeserta');
		$this->load->model('MUser');
	}

	public function index(){
		
    }

	public function add(){
		$data['title'] 	  	      = "Registrasi Peserta - SI Pena Pintar";
		$this->form_validation->set_rules('peserta-nip', 'peserta-nip', 'required');
		$this->form_validation->set_rules('peserta-nama', 'peserta-nama', 'required');
		$this->form_validation->set_rules('peserta-email', 'peserta-email', 'required');
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

	public function form_registrasi(){
		$data['title'] 	 		 = "Form Registrasi - SI Pena Pintar";
		$data['id_user'] 		 = $this->session->userdata('id_user');
		$data['akses_login'] 	 = $this->session->userdata('akses_login');
		$data['user'] 	 		 = $this->MUser->user_by_iduser($this->session->userdata('id_user'), $this->session->userdata('akses_login'));
		$data['pelatihan']		 = $this->MPeserta->allPelatihan();
		$data['agama']			 = $this->MPeserta->allAgama();
		$data['gol']			 = $this->MPeserta->allGolongan();
		$data['instansi']		 = $this->MPeserta->allInstansi();
		$data['pola']			 = $this->MPeserta->allPolaPenyelenggaraan();
		$this->load->view('form-data-pribadi/index', $data);
	}

	public function add_form_registrasi(){
		$this->MPeserta->edit_form_registrasi();
		$this->session->set_flashdata('flash', 'Diperbaharui');
		redirect('dashboard');
	}
}
 ?>
