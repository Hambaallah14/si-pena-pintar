<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
Class Penceramah extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model('MUser');
        $this->load->model('MPenceramah');
		if (! $this->session->userdata('logged')) { //cek session
            redirect('login'); //jika tidak ada session maka balek ke menu login
        }
	}

	public function index(){
		$data['title'] 	  	     = "Daftar Penceramah - SI Pena Pintar";
		$data['id_user'] 		 = $this->session->userdata('id_user');
        $data['akses_login'] 	 = $this->session->userdata('akses_login');
        $data['penceramah'] 	 = $this->MPenceramah->allPenceramah();
		$data['user'] 	 		 = $this->MUser->user_by_iduser($this->session->userdata('id_user'), $this->session->userdata('akses_login'));
		$this->load->view('kerangka/_1_header-css', $data);
		$this->load->view('kerangka/_2_sidebar');
        $this->load->view('penceramah/index');
		$this->load->view('kerangka/_4_footer-js');
    }

	public function add(){
		$data['title'] 	  	      = "Daftar Penceramah - SI Pena Pintar";
		$this->form_validation->set_rules('penceramah-id', 'penceramah-id', 'required');
		$this->form_validation->set_rules('penceramah-nama', 'penceramah-nama', 'required');
		$this->form_validation->set_rules('penceramah-jabatan', 'penceramah-jabatan', 'required');
        $this->form_validation->set_rules('penceramah-password', 'penceramah-password', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('kerangka/_1_header-css', $data);
			$this->load->view('kerangka/_2_sidebar');
			$this->load->view('penceramah/index');
			$this->load->view('kerangka/_4_footer-js');
		}
		else{
			$this->MPenceramah->add();
			$this->session->set_flashdata('flash', 'Disimpan');
			redirect('penceramah');
		}
	}

	public function delete($nip_wi){
		$this->MPenceramah->delete($nip_wi);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('penceramah');
	}

	public function edit_pribadi(){
		$this->MPenceramah->edit_pribadi();
		$this->session->set_flashdata('flash', 'Diubah');
		redirect('penceramah');
	}

	public function edit_akun(){
		// echo $this->input->post('wi-nip', true);
		$this->MPenceramah->edit_akun();
		$this->session->set_flashdata('flash', 'Diubah');
		redirect('penceramah');
	}
}
 ?>
