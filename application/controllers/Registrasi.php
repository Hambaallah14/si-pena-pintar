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
		$this->form_validation->set_rules('peserta-nip', 'NIP', 'required');
		$this->form_validation->set_rules('peserta-nama', 'Nama', 'required');
		$this->form_validation->set_rules('peserta-email', 'Email', 'required');
        $this->form_validation->set_rules('peserta-password', 'Password', 'required|matches[peserta-password]');
		$this->form_validation->set_rules('peserta-confirm-password', 'Konfirmasi assword', 'required');
		
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
		$data['user'] 	 		 = $this->MUser->select_registrasi_user($this->session->userdata('id_user'));
		$data['pelatihan']		 = $this->MPeserta->allPelatihan();
		$data['agama']			 = $this->MPeserta->allAgama();
		$data['gol']			 = $this->MPeserta->allGolongan();
		$data['instansi']		 = $this->MPeserta->allInstansi();
		$data['pola']			 = $this->MPeserta->allPolaPenyelenggaraan();
		$this->load->view('form-data-pribadi/index', $data);
	}

	public function add_form_registrasi(){
		$nip 	    = $this->input->post('peserta-nip', true);
		$upload_sk  = $this->MPeserta->upload_file_sk_cpns($nip);
		$upload_jab = $this->MPeserta->upload_file_sk_jab($nip);
		if($upload_sk['result'] == "success" || $upload_jab['result'] == "success"){
			$this->MPeserta->edit_form_registrasi($upload_sk, $upload_jab);
			$this->session->set_flashdata('flash', 'Diperbaharui');
			redirect('dashboard');
		}
		$this->Mpeserta->edit_form_registrasi($upload_file);
	}
}
 ?>
