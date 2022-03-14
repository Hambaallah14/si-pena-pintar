<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
Class Bagi_kelompok extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model('MUser');
        $this->load->model('MPembagian_kelompok');
		if (! $this->session->userdata('logged')) { //cek session
            redirect('login'); //jika tidak ada session maka balek ke menu login
        }
	}

	public function index(){
		$data['title'] 	  	     = "Pembagian Kelompok - SI Pena Pintar";
		$data['id_user'] 		 = $this->session->userdata('id_user');
        $data['akses_login'] 	 = $this->session->userdata('akses_login');
		$data['bagi_batch']		 = $this->MPembagian_kelompok->allPembagian_kelompok();
		$data['user'] 	 		 = $this->MUser->user_by_iduser($this->session->userdata('id_user'), $this->session->userdata('akses_login'));
		$this->load->view('kerangka/_1_header-css', $data);
		$this->load->view('kerangka/_2_sidebar');
        $this->load->view('kelompok/pembagian_batch');
		$this->load->view('kerangka/_4_footer-js');
    }

	public function add(){
		$data['title'] 	  	      = "Pembagian Kelompok - SI Pena Pintar";
		$this->form_validation->set_rules('batch-tahun', 'batch-tahun', 'required');
		$this->form_validation->set_rules('batch', 'batch', 'required');
	
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('kerangka/_1_header-css', $data);
			$this->load->view('kerangka/_2_sidebar');
			$this->load->view('kelompok/pembagian_batch');
			$this->load->view('kerangka/_4_footer-js');
		}
		else{
			$this->MPembagian_kelompok->add();
			$this->session->set_flashdata('flash', 'Disimpan');
			redirect('bagi_kelompok');
		}
	}

	public function delete($id){
		$this->MPembagian_kelompok->delete($id);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('bagi_kelompok');
	}


	// TAMBAH ANGKATAN
	public function angkatan($id){
		$data['title'] 	  	     = "Pembagian Angkatan - SI Pena Pintar";
		$data['id_user'] 		 = $this->session->userdata('id_user');
        $data['akses_login'] 	 = $this->session->userdata('akses_login');
		$data['id_batch']        = $id;
		$data['bagi_angkatan']   = $this->MPembagian_kelompok->allPembagian_angkatan($id);
		$data['user'] 	 		 = $this->MUser->user_by_iduser($this->session->userdata('id_user'), $this->session->userdata('akses_login'));
		$this->load->view('kerangka/_1_header-css', $data);
		$this->load->view('kerangka/_2_sidebar');
        $this->load->view('kelompok/pembagian_angkatan');
		$this->load->view('kerangka/_4_footer-js');
	}

	public function add_angkatan(){
		$data['title'] 	    = "Pembagian Angkatan - SI Pena Pintar";
		$id_batch 			= $this->input->post('id_batch');
		$this->form_validation->set_rules('id_batch', 'id_batch', 'required');
		$this->form_validation->set_rules('angkatan', 'angkatan', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('kerangka/_1_header-css', $data);
			$this->load->view('kerangka/_2_sidebar');
			$this->load->view('kelompok/pembagian_angkatan');
			$this->load->view('kerangka/_4_footer-js');
		}
		else{
			$this->MPembagian_kelompok->add_angkatan();
			$this->session->set_flashdata('flash', 'Disimpan');
			redirect('bagi_kelompok/angkatan/'.$id_batch);
		}
	}

	public function delete_angkatan($id_batch, $id_angkatan){
		$this->MPembagian_kelompok->delete_angkatan($id_angkatan);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('bagi_kelompok/angkatan/'.$id_batch);
	}
}
 ?>
