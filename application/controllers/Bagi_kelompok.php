<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
Class Bagi_kelompok extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model('MUser');
        $this->load->model('MPembagian_kelompok');
		$this->load->model('MPelatihan');
		$this->load->model('MPeserta');
		if (! $this->session->userdata('logged')) { //cek session
            redirect('login'); //jika tidak ada session maka balek ke menu login
        }
	}

	public function index(){
		$data['title'] 	  	     = "Pembagian Kelompok - SI Pena Pintar";
		$data['id_user'] 		 = $this->session->userdata('id_user');
        $data['akses_login'] 	 = $this->session->userdata('akses_login');
		$data['bagi_batch']		 = $this->MPembagian_kelompok->allPembagian_batch();
		$data['pelatihan']       = $this->MPelatihan->allPelatihan();
		$data['user'] 	 		 = $this->MUser->user_by_iduser($this->session->userdata('id_user'), $this->session->userdata('akses_login'));
		$this->load->view('kerangka/_1_header-css', $data);
		$this->load->view('kerangka/_2_sidebar');
        $this->load->view('kelompok/pembagian_batch');
		$this->load->view('kerangka/_4_footer-js');
    }

	public function add(){
		$data['title'] 	  	      = "Pembagian Kelompok - SI Pena Pintar";
		$this->form_validation->set_rules('batch-tahun', 'batch-tahun', 'required');
		$this->form_validation->set_rules('id-pelatihan', 'id-pelatihan', 'required');
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
		$data['batch']		     = $this->MPembagian_kelompok->allPembagian_batch_by_id($id);
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

	public function kelompok($id_angkatan){
		$data['title'] 	  	     = "Pembagian Kelompok - SI Pena Pintar";
		$data['id_user'] 		 = $this->session->userdata('id_user');
        $data['akses_login'] 	 = $this->session->userdata('akses_login');
		$data['id_angkatan']     = $id_angkatan;
		$data['angkatan']		 = $this->MPembagian_kelompok->allPembagian_angkatan_by_id($id_angkatan);
		$data['bagi_kelompok']   = $this->MPembagian_kelompok->allPembagian_kelompok($id_angkatan);
		$data['user'] 	 		 = $this->MUser->user_by_iduser($this->session->userdata('id_user'), $this->session->userdata('akses_login'));
		$this->load->view('kerangka/_1_header-css', $data);
		$this->load->view('kerangka/_2_sidebar');
        $this->load->view('kelompok/pembagian_kelompok');
		$this->load->view('kerangka/_4_footer-js');
	}

	public function add_kelompok(){
		$data['title'] 	    = "Pembagian Kelompok - SI Pena Pintar";
		$id_angkatan 		= $this->input->post('id_angkatan');
		$this->form_validation->set_rules('id_angkatan', 'id_angkatan', 'required');
		$this->form_validation->set_rules('kelompok', 'kelompok', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('kerangka/_1_header-css', $data);
			$this->load->view('kerangka/_2_sidebar');
			$this->load->view('kelompok/pembagian_kelompok');
			$this->load->view('kerangka/_4_footer-js');
		}
		else{
			$this->MPembagian_kelompok->add_kelompok();
			$this->session->set_flashdata('flash', 'Disimpan');
			redirect('bagi_kelompok/kelompok/'.$id_angkatan);
		}
	}

	public function delete_kelompok($id_angkatan, $id_kelompok){
		$this->MPembagian_kelompok->delete_kelompok($id_kelompok);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('bagi_kelompok/kelompok/'.$id_angkatan);
	}



	public function peserta($id_kelompok){
		$data['title'] 	  	     	= "Pembagian Peserta - SI Pena Pintar";
		$data['id_user'] 		 	= $this->session->userdata('id_user');
        $data['akses_login'] 	 	= $this->session->userdata('akses_login');
		$data['id_kelompok']     	= $id_kelompok;
		$data['kelompok']		 	= $this->MPembagian_kelompok->allPembagian_kelompok_by_id($id_kelompok);
		$data['bagi_peserta']    	= $this->MPembagian_kelompok->allPembagian_peserta($id_kelompok);
		$data['user'] 	 		 	= $this->MUser->user_by_iduser($this->session->userdata('id_user'), $this->session->userdata('akses_login'));
		$this->load->view('kerangka/_1_header-css', $data);
		$this->load->view('kerangka/_2_sidebar');
        $this->load->view('kelompok/pembagian_peserta');
		$this->load->view('kerangka/_4_footer-js');
	}

	public function tambah_peserta_kelompok($id_kelompok){
			$data['title'] 	  	     	= "Pembagian Peserta - SI Pena Pintar";
			$data['id_user'] 		 	= $this->session->userdata('id_user');
			$data['akses_login'] 	 	= $this->session->userdata('akses_login');
			$data['id_kelompok']     	= $id_kelompok;

			$data['instansi']		 	= $this->MPeserta->allInstansi();
			$data['gol']			 	= $this->MPeserta->allGolongan();
			$data['user'] 	 		 	= $this->MUser->user_by_iduser($this->session->userdata('id_user'), $this->session->userdata('akses_login'));
			$this->load->view('kerangka/_1_header-css', $data);
			$this->load->view('kerangka/_2_sidebar');
			$this->load->view('kelompok/tambah_peserta');
			$this->load->view('kerangka/_4_footer-js');	
	}

	public function selectPeserta(){
			$instansi   = $this->input->post('instansi');
			$golongan   = $this->input->post('golongan');
			$data['peserta'] = $this->MPembagian_kelompok->selectPeserta($instansi, $golongan);
			$this->load->view('kelompok/hasil-filter-select-peserta', $data);
	}

	public function add_peserta(){
		$data['title'] 	    = "Pembagian Peserta - SI Pena Pintar";
		$id_kelompok 		= $this->input->post('id_kelompok', TRUE);
		$this->MPembagian_kelompok->add_peserta();
		$this->session->set_flashdata('flash', 'Disimpan');
		redirect('bagi_kelompok/peserta/'.$id_kelompok);
	}

	public function delete_peserta($id_kelompok, $nip_peserta){
		$this->MPembagian_kelompok->delete_peserta($nip_peserta);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('bagi_kelompok/peserta/'.$id_kelompok);
	}
}
 ?>
