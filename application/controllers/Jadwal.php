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
		$this->load->model('MPengampumateri');
		
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
		$data['jadwal_pelatihan']		 = $this->MJadwalPelatihan->jadwalPelatihan($this->session->userdata('id_user'));
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


	// JADWAL TANGGAL PELATIHAN
	public function jadwal_tanggal($id_jadwal, $id_batch){
		$data['title'] 	 		    	 	 = "Jadwal Pelatihan - SI Pena Pintar";
		$data['id_user'] 		    	 	 = $this->session->userdata('id_user');
		$data['akses_login'] 	    	 	 = $this->session->userdata('akses_login');
		$data['user'] 	 		    	 	 = $this->MUser->user_by_iduser($this->session->userdata('id_user'), $this->session->userdata('akses_login'));
		$data['jadwal_pengumuman']  	 	 = $this->MJadwal->jadwal_pengumuman();
		$data['pembagian_kelompok'] 		 = $this->MPembagian_kelompok->all($this->session->userdata('id_user'));
		$data['idJadwal']					 = $id_jadwal;
		$data['idBatch']					 = $id_batch;
		$data['header_jadwal_tanggal']  	 = $this->MJadwalPelatihan->jadwal_tanggal($id_jadwal);
			$this->load->view('kerangka/_1_header-css', $data);
			$this->load->view('kerangka/_2_sidebar');
			$this->load->view('jadwal/_4_index_tanggal');
			$this->load->view('kerangka/_4_footer-js');
	}


	public function addJadwalTanggal(){
		$data['title'] 	  	    = "Tambah Jadwal - SI Pena Pintar";
		$id_jadwal				= $this->input->post('tanggal-id_jadwal', TRUE);
		$id_batch				= $this->input->post('tanggal-id_batch', TRUE);
		$this->form_validation->set_rules('tanggal-id_jadwal', 'tanggal-id_jadwal', 'required');
		$this->form_validation->set_rules('tanggal', 'tanggal', 'required');
		
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('kerangka/_1_header-css', $data);
			$this->load->view('kerangka/_2_sidebar');
			$this->load->view('jadwal/_4_index_tanggal');
			$this->load->view('kerangka/_4_footer-js');
		}
		else{
			$this->MJadwalPelatihan->addJadwalTanggal();
			$this->session->set_flashdata('flash', 'Disimpan');
			redirect('jadwal/jadwal_tanggal/'.$id_jadwal."/".$id_batch);
		}
	}


	public function hapus_jadwal_tanggal($id_jadwal, $id_tanggal){
		$this->MJadwalPelatihan->deleteJadwalTanggal($id_tanggal);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('jadwal/jadwal_tanggal/'.$id_jadwal);
	}



	// JADWAL MATERI
	public function jadwal_materi($id_jadwal, $id_batch, $id_tanggal){
		$data['title'] 	 		    	 	 = "Jadwal Pelatihan - SI Pena Pintar";
		$data['id_user'] 		    	 	 = $this->session->userdata('id_user');
		$data['akses_login'] 	    	 	 = $this->session->userdata('akses_login');
		$data['user'] 	 		    	 	 = $this->MUser->user_by_iduser($this->session->userdata('id_user'), $this->session->userdata('akses_login'));
		$data['jadwal_pengumuman']  	 	 = $this->MJadwal->jadwal_pengumuman();
		$data['pembagian_kelompok'] 		 = $this->MPembagian_kelompok->all($this->session->userdata('id_user'));
		$data['idJadwal']					 = $id_jadwal;
		$data['idBatch']					 = $id_batch;
		$data['idTanggal']					 = $id_tanggal;
		$data['header_jadwal_materi']   	 = $this->MJadwalPelatihan->jadwal_materi($id_tanggal);
			$this->load->view('kerangka/_1_header-css', $data);
			$this->load->view('kerangka/_2_sidebar');
			$this->load->view('jadwal/_5_index_materi');
			$this->load->view('kerangka/_4_footer-js');
	}


	public function tambah_jadwal_materi($id_jadwal, $id_batch, $id_tanggal){
		$data['title'] 	 		    	 	 = "Jadwal Pelatihan - SI Pena Pintar";
		$data['id_user'] 		    	 	 = $this->session->userdata('id_user');
		$data['akses_login'] 	    	 	 = $this->session->userdata('akses_login');
		$data['user'] 	 		    	 	 = $this->MUser->user_by_iduser($this->session->userdata('id_user'), $this->session->userdata('akses_login'));
		$data['jadwal_pengumuman']  	 	 = $this->MJadwal->jadwal_pengumuman();
		$data['pembagian_kelompok'] 		 = $this->MPembagian_kelompok->all($this->session->userdata('id_user'));
		$data['idJadwal']					 = $id_jadwal;
		$data['idBatch']					 = $id_batch;
		$data['idTanggal']					 = $id_tanggal;
		$data['agenda']		     			 = $this->MPengampumateri->allagenda();
			$this->load->view('kerangka/_1_header-css', $data);
			$this->load->view('kerangka/_2_sidebar');
			$this->load->view('jadwal/_6_tambah_jadwal_materi');
			$this->load->view('kerangka/_4_footer-js');
	}

	public function selectMateri(){
		$id_agenda  = $this->input->post("id_agenda");
		$data['materi'] = $this->MJadwalPelatihan->selectMateri($id_agenda);
		$this->load->view('jadwal/_7_hasilselectMateri', $data);
	}

	public function addJadwalMateri(){
		$data['title'] 	  	      = "Tambah Materi - SI Pena Pintar";
		$id_jadwal				  = $this->input->post('id_jadwal');
		$id_batch				  = $this->input->post('id_batch');
		$id_tanggal				  = $this->input->post('id_tanggal');
		$this->form_validation->set_rules('id_tanggal', 'id_tanggal', 'required');
		$this->form_validation->set_rules('jadwal-agenda-materi', 'jadwal-agenda-materi', 'required');
        $this->form_validation->set_rules('jadwal-materi', 'jadwal-materi', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('kerangka/_1_header-css', $data);
			$this->load->view('kerangka/_2_sidebar');
			$this->load->view('jadwal/_6_tambah_jadwal_materi');
			$this->load->view('kerangka/_4_footer-js');
		}
		else{
			$this->MJadwalPelatihan->addJadwalMateri();
			$this->session->set_flashdata('flash', 'Disimpan');
			redirect('jadwal/jadwal_materi/'.$id_jadwal."/".$id_batch."/".$id_tanggal);
		}
	}


	public function hapus_jadwal_materi($id_j_m, $id_jadwal, $id_batch, $id_tanggal){
		$this->MJadwalPelatihan->deleteJadwalMateri($id_j_m);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('jadwal/jadwal_materi/'.$id_jadwal."/".$id_batch."/".$id_tanggal);
	}



	// JADWAL PENGAJAR
	public function jadwal_pengajar($id_jadwal, $id_batch, $id_tanggal, $id_j_m, $id_agenda, $id_mapel){
		$data['title'] 	 		    	 	 = "Jadwal Pelatihan - SI Pena Pintar";
		$data['id_user'] 		    	 	 = $this->session->userdata('id_user');
		$data['akses_login'] 	    	 	 = $this->session->userdata('akses_login');
		$data['user'] 	 		    	 	 = $this->MUser->user_by_iduser($this->session->userdata('id_user'), $this->session->userdata('akses_login'));
		$data['jadwal_pengumuman']  	 	 = $this->MJadwal->jadwal_pengumuman();
		$data['pembagian_kelompok'] 		 = $this->MPembagian_kelompok->all($this->session->userdata('id_user'));
		$data['idJadwal']					 = $id_jadwal;
		$data['idBatch']					 = $id_batch;
		$data['idTanggal']					 = $id_tanggal;
		$data['idMateri']					 = $id_j_m;
		$data['idAgenda']					 = $id_agenda;
		$data['idMapel']					 = $id_mapel;
		$data['header_jadwal_pengajar']   	 = $this->MJadwalPelatihan->jadwal_pengajar($id_j_m);
			$this->load->view('kerangka/_1_header-css', $data);
			$this->load->view('kerangka/_2_sidebar');
			$this->load->view('jadwal/_8_index_pengajar');
			$this->load->view('kerangka/_4_footer-js');
	}

	public function tambah_jadwal_pengajar($id_jadwal, $id_batch, $id_tanggal, $id_materi, $id_agenda, $id_mapel){
		$data['title'] 	 		    	 	 = "Jadwal Pelatihan - SI Pena Pintar";
		$data['id_user'] 		    	 	 = $this->session->userdata('id_user');
		$data['akses_login'] 	    	 	 = $this->session->userdata('akses_login');
		$data['user'] 	 		    	 	 = $this->MUser->user_by_iduser($this->session->userdata('id_user'), $this->session->userdata('akses_login'));
		$data['jadwal_pengumuman']  	 	 = $this->MJadwal->jadwal_pengumuman();
		$data['pembagian_kelompok'] 		 = $this->MPembagian_kelompok->all($this->session->userdata('id_user'));
		$data['idJadwal']					 = $id_jadwal;
		$data['idBatch']					 = $id_batch;
		$data['idTanggal']					 = $id_tanggal;
		$data['idMateri']					 = $id_materi;
		$data['idAgenda']					 = $id_agenda;
		$data['idMapel']					 = $id_mapel;

		$data['selectBatch']				 = $this->MPembagian_kelompok->selectAngkatan($id_batch, $id_tanggal, $id_mapel);
		$data['sesi']						 = $this->MJadwalPelatihan->sesi();
		$data['zoom']						 = $this->MJadwalPelatihan->zoom();
			$this->load->view('kerangka/_1_header-css', $data);
			$this->load->view('kerangka/_2_sidebar');
			$this->load->view('jadwal/_9_tambah_jadwal_pengajar');
			$this->load->view('kerangka/_4_footer-js');
	}

	public function selectPembimbing(){
		$id_tanggal         = $this->input->post("id_tanggal");
		$materi             = $this->input->post("materi");
		$mulai  		    = $this->input->post("mulai");
		$selesai 		    = $this->input->post("selesai");
		$data['pembimbing'] = $this->MJadwalPelatihan->selectPembimbing($id_tanggal, $materi, $mulai, $selesai);
		$this->load->view('jadwal/_10_hasilselectPembimbing', $data);
	}

	public function selectPendamping(){
		$id_tanggal         = $this->input->post("id_tanggal");
		$mulai  		    = $this->input->post("mulai");
		$selesai 		    = $this->input->post("selesai");
		$data['pendamping'] = $this->MJadwalPelatihan->selectPendamping($id_tanggal, $mulai, $selesai);
		$this->load->view('jadwal/_11_hasilselectPendamping', $data);
	}

	public function addJadwalPengajar(){
		$data['title'] 	  	      = "Tambah Materi - SI Pena Pintar";
		$id_jadwal				  = $this->input->post('id_jadwal');
		$id_batch				  = $this->input->post('id_batch');
		$id_tanggal				  = $this->input->post('id_tanggal');
		$id_j_m					  = $this->input->post('id_j_m');
		$id_agenda				  = $this->input->post('id_agenda');
		$id_mapel				  = $this->input->post('id_mapel');
		$this->form_validation->set_rules('id_j_m', 'id_j_m', 'required');
		$this->form_validation->set_rules('jadwal-pengajar-angkatan', 'jadwal-pengajar-angkatan', 'required');
		$this->form_validation->set_rules('jadwal-pengajar-sesi', 'jadwal-pengajar-sesi', 'required');
		$this->form_validation->set_rules('jadwal-pengajar-room', 'jadwal-pengajar-room', 'required');
		$this->form_validation->set_rules('jadwal-pengajar-waktu-mulai', 'jadwal-pengajar-waktu-mulai', 'required');
		$this->form_validation->set_rules('jadwal-pengajar-waktu-selesai', 'jadwal-pengajar-waktu-selesai', 'required');
		$this->form_validation->set_rules('jadwal-pengajar-pembimbing', 'jadwal-pengajar-pembimbing', 'required');
		$this->form_validation->set_rules('jadwal-pengajar-pendamping', 'jadwal-pengajar-pendamping', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('kerangka/_1_header-css', $data);
			$this->load->view('kerangka/_2_sidebar');
			$this->load->view('jadwal/_9_tambah_jadwal_pengajar');
			$this->load->view('kerangka/_4_footer-js');
		}
		else{
			$this->MJadwalPelatihan->addJadwalPengajar();
			$this->session->set_flashdata('flash', 'Disimpan');
			redirect('jadwal/jadwal_pengajar/'.$id_jadwal."/".$id_batch."/".$id_tanggal."/".$id_j_m."/".$id_agenda."/".$id_mapel);
		}
	}


	public function hapus_jadwal_pengajar($id_jadwal, $id_batch, $id_tanggal, $id_j_m, $id_agenda, $id_mapel, $id_j_p){
		$this->MJadwalPelatihan->deleteJadwalPengajar($id_j_p);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('jadwal/jadwal_pengajar/'.$id_jadwal."/".$id_batch."/".$id_tanggal."/".$id_j_m."/".$id_agenda."/".$id_mapel);
	}
}
 ?>
