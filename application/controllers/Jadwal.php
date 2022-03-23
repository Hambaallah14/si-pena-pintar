<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
Class Jadwal extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
        $this->load->model('MUser');
		$this->load->model('MJadwal');
		$this->load->model('MPelatihan');
		$this->load->model('MJadwalPelatihan');
		$this->load->model('MPembagian_kelompok');
		if (! $this->session->userdata('logged')) { //cek session
            redirect('login'); //jika tidak ada session maka balek ke menu login
        }
	}

	public function index(){
		$data['title'] 	 		    	 = "Jadwal Pelatihan - SI Pena Pintar";
		$data['id_user'] 		    	 = $this->session->userdata('id_user');
		$data['akses_login'] 	    	 = $this->session->userdata('akses_login');
		$data['user'] 	 		    	 = $this->MUser->user_by_iduser($this->session->userdata('id_user'), $this->session->userdata('akses_login'));
		$data['jadwal_pengumuman']  	 = $this->MJadwal->jadwal_pengumuman();
		$data['pembagian_kelompok'] 	 = $this->MPembagian_kelompok->all($this->session->userdata('id_user'));
		$data['header_jadwal_pelatihan'] = $this->MJadwalPelatihan->header_jadwal_pelatihan();
			$this->load->view('kerangka/_1_header-css', $data);
			$this->load->view('kerangka/_2_sidebar');
			$this->load->view('jadwal/_1_index');
			$this->load->view('kerangka/_4_footer-js');
	}

	public function tambah_jadwal(){
		$data['title'] 	 		    	 = "Tambah Jadwal - SI Pena Pintar";
		$data['id_user'] 		    	 = $this->session->userdata('id_user');
		$data['akses_login'] 	    	 = $this->session->userdata('akses_login');
		$data['user'] 	 		    	 = $this->MUser->user_by_iduser($this->session->userdata('id_user'), $this->session->userdata('akses_login'));

		$data['metode_belajar']			 = $this->MJadwalPelatihan->allMetodeBelajar();
		$data['pelatihan']  			 = $this->MPelatihan->allPelatihan();
			$this->load->view('kerangka/_1_header-css', $data);
			$this->load->view('kerangka/_2_sidebar');
			$this->load->view('jadwal/_2_tambah_jadwal');
			$this->load->view('kerangka/_4_footer-js');
	}

	public function hapus_jadwal($id_jadwal){
		$this->MJadwalPelatihan->deleteJadwalPelatihan($id_jadwal);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('jadwal');
	}

	public function selectBatch(){
		$id_pelatihan  = $this->input->post("id_pelatihan");
		$tahun 		   = $this->input->post("tahun");
		$data['batch'] = $this->MJadwalPelatihan->selectBatch($id_pelatihan, $tahun);
		$this->load->view('jadwal/_3_hasilselectBatch', $data);
	}

	public function addJadwalPelatihan(){
		$data['title'] 	  	      = "Tambah Jadwal - SI Pena Pintar";
		$this->form_validation->set_rules('jadwal-metode-belajar', 'jadwal-metode-belajar', 'required');
		$this->form_validation->set_rules('jadwal-pelatihan', 'jadwal-pelatihan', 'required');
		$this->form_validation->set_rules('jadwal-tahun', 'jadwal-tahun', 'required');
        $this->form_validation->set_rules('jadwal-batch', 'jadwal-batch', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('kerangka/_1_header-css', $data);
			$this->load->view('kerangka/_2_sidebar');
			$this->load->view('jadwal/_2_tambah_jadwal');
			$this->load->view('kerangka/_4_footer-js');
		}
		else{
			$this->MJadwalPelatihan->addJadwalPelatihan();
			$this->session->set_flashdata('flash', 'Disimpan');
			redirect('jadwal');
		}
	}

	public function jadwal_tanggal($id_jadwal){
		$data['title'] 	 		    	 	 = "Jadwal Pelatihan - SI Pena Pintar";
		$data['id_user'] 		    	 	 = $this->session->userdata('id_user');
		$data['akses_login'] 	    	 	 = $this->session->userdata('akses_login');
		$data['user'] 	 		    	 	 = $this->MUser->user_by_iduser($this->session->userdata('id_user'), $this->session->userdata('akses_login'));
		$data['jadwal_pengumuman']  	 	 = $this->MJadwal->jadwal_pengumuman();
		$data['pembagian_kelompok'] 		 = $this->MPembagian_kelompok->all($this->session->userdata('id_user'));
		$data['tambah_tanggal_pelatihan'] 	 = $this->MJadwalPelatihan->jadwal_tanggal($id_jadwal);
			$this->load->view('kerangka/_1_header-css', $data);
			$this->load->view('kerangka/_2_sidebar');
			$this->load->view('jadwal/_4_index_tanggal');
			$this->load->view('kerangka/_4_footer-js');
	}


	public function hapus_jadwal_tanggal($id_tanggal){
		$this->MJadwalPelatihan->deleteJadwalPelatihan($id_jadwal);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('jadwal');
	}
}
 ?>
