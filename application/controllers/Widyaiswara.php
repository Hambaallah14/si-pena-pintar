<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
Class Widyaiswara extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model('MUser');
        $this->load->model('MWidyaiswara');
		if (! $this->session->userdata('logged')) { //cek session
            		redirect('login'); //jika tidak ada session maka balek ke menu login
        	}
	}

	public function index(){
		$data['title'] 	  	      = "Daftar Widyaiswara - SI Pena Pintar";
        $data['akses_login'] 	 = $this->session->userdata('akses_login');
        $data['widyaiswara'] 	 = $this->MWidyaiswara->allWidyaiswara();
		$data['user'] 	 		 = $this->MUser->user_by_iduser($this->session->userdata('id_user'), $this->session->userdata('akses_login'));
		$this->load->view('kerangka/_1_header-css', $data);
		$this->load->view('kerangka/_2_sidebar');
        $this->load->view('widyaiswara/index');
		$this->load->view('kerangka/_4_footer-js');
    }

	public function add(){
		$data['title'] 	  	      = "Daftar Widyaiswara - SI Pena Pintar";
		$this->form_validation->set_rules('wi-nip', 'wi-nip', 'required');
		$this->form_validation->set_rules('wi-nama', 'wi-nama', 'required');
		$this->form_validation->set_rules('wi-jabatan', 'wi-jabatan', 'required');
		$this->form_validation->set_rules('wi-no_telp', 'wi-no_telp', 'required');
		$this->form_validation->set_rules('wi-email', 'wi-email', 'required');
        $this->form_validation->set_rules('wi-password', 'wi-password', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('kerangka/_1_header-css', $data);
			$this->load->view('kerangka/_2_sidebar');
			$this->load->view('widyaiswara/index');
			$this->load->view('kerangka/_4_footer-js');
		}
		else{
			$this->MWidyaiswara->add();
			$this->session->set_flashdata('flash', 'Disimpan');
			redirect('widyaiswara');
		}
	}
}
 ?>
