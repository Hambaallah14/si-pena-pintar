<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
Class Pengaturan extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model('MUser');
		$this->load->model('MPengaturan');
		if (! $this->session->userdata('logged')) { //cek session
            redirect('login'); //jika tidak ada session maka balek ke menu login
        }
	}

	public function index(){
		$data['title'] 	  	       = "Pengaturan - SI Pena Pintar";
		$data['id_user'] 		   = $this->session->userdata('id_user');
        $data['akses_login'] 	   = $this->session->userdata('akses_login');
		$data['jadwal_registrasi'] = $this->MPengaturan->JadwalRegistrasi();
		$data['jadwal_pengumuman'] = $this->MPengaturan->JadwalPengumuman();
		$data['user'] 	 		   = $this->MUser->user_by_iduser($this->session->userdata('id_user'), $this->session->userdata('akses_login'));
		$this->load->view('kerangka/_1_header-css', $data);
		$this->load->view('kerangka/_2_sidebar');
        $this->load->view('pengaturan/index');
		$this->load->view('kerangka/_4_footer-js');
    }

	
	public function update_jadwal_registrasi(){
		$this->MPengaturan->update_jadwal_registrasi();
		$this->session->set_flashdata('flash', 'Diubah');
		redirect('pengaturan');
	}

	public function update_jadwal_pengumuman(){
		$this->MPengaturan->update_jadwal_pengumuman();
		$this->session->set_flashdata('flash', 'Diubah');
		redirect('pengaturan');
	}
}
 ?>
