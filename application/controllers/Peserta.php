<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
Class Peserta extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model('MUser');
        $this->load->model('MPeserta');
		if (! $this->session->userdata('logged')) { //cek session
            redirect('login'); //jika tidak ada session maka balek ke menu login
        }
	}

	public function index(){
		$data['title'] 	  	     = "Daftar Peserta - SI Pena Pintar";
		$data['id_user'] 		 = $this->session->userdata('id_user');
        $data['akses_login'] 	 = $this->session->userdata('akses_login');
        $data['peserta']    	 = $this->MPeserta->allPeserta();
		$data['user'] 	 		 = $this->MUser->user_by_iduser($this->session->userdata('id_user'), $this->session->userdata('akses_login'));
		$this->load->view('kerangka/_1_header-css', $data);
		$this->load->view('kerangka/_2_sidebar');
        $this->load->view('peserta/index');
		$this->load->view('kerangka/_4_footer-js');
    }

	public function delete($nip_peserta){
		$this->MPeserta->delete($nip_peserta);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('peserta');
	}
}
 ?>
