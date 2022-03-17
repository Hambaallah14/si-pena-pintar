<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
Class Form_akun extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
        $this->load->model('MUser');
		$this->load->model('MPeserta');		
		if (! $this->session->userdata('logged')) { //cek session
            redirect('login'); //jika tidak ada session maka balek ke menu login
		}
	}

	public function index(){
		$data['title'] 	 		 = "Form Registrasi";
		$data['id_user'] 		 = $this->session->userdata('id_user');
		$data['akses_login'] 	 = $this->session->userdata('akses_login');
		$data['user'] 	 		 = $this->MUser->user_by_iduser($this->session->userdata('id_user'), $this->session->userdata('akses_login'));
		$data['agama']			 = $this->MPeserta->allAgama();
		$this->load->view('form-data-pribadi/index', $data);
	}
}
 ?>
