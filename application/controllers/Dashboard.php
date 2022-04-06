<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
Class Dashboard extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
        $this->load->model('MUser');
		$this->load->model('MJadwal');
		$this->load->model('MPembagian_kelompok');

		$this->load->model('MWidyaiswara');
		$this->load->model('MPendamping');
		$this->load->model('MPenceramah');
		if (! $this->session->userdata('logged')) { //cek session
            redirect('login'); //jika tidak ada session maka balek ke menu login
        }
	}

	public function index(){
		$data['title'] 	 		   	= "Dashboard - SI Pena Pintar";
		$data['id_user'] 		   	= $this->session->userdata('id_user');
		$data['akses_login'] 	   	= $this->session->userdata('akses_login');
		$data['jadwal_pengumuman'] 	= $this->MJadwal->jadwal_pengumuman();
		$data['user'] 	 		   	= $this->MUser->user_by_iduser($this->session->userdata('id_user'), $this->session->userdata('akses_login'));
		$data['pembagian_kelompok'] = $this->MPembagian_kelompok->all($this->session->userdata('id_user'));


		// COUNT
		$data['jumlah_wi']			= count($this->MWidyaiswara->allWidyaiswara());
		$data['jumlah_pendamping']	= count($this->MPendamping->allPendamping());
		$data['jumlah_penceramah']	= count($this->MPenceramah->allPenceramah());
		
			$this->load->view('kerangka/_1_header-css', $data);
			$this->load->view('kerangka/_2_sidebar');
			$this->load->view('dashboard/index');
			$this->load->view('kerangka/_4_footer-js');
	}
}
 ?>
