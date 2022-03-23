<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
Class Mata_pelajaran extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model('MUser');
        $this->load->model('MMata_pelajaran');
		$this->load->model('MCaraPembelajaran');
		$this->load->model('MMetode_belajar');
		$this->load->model('MPengampumateri');
		if (! $this->session->userdata('logged')) { //cek session
            redirect('login'); //jika tidak ada session maka balek ke menu login
        }
	}

	public function index(){
		$data['title'] 	  	     = "Daftar Mata Pelajaran - SI Pena Pintar";
		$data['id_user'] 		 = $this->session->userdata('id_user');
        $data['akses_login'] 	 = $this->session->userdata('akses_login');

        $data['mapel']		  	 = $this->MMata_pelajaran->allMapel();
		$data['cara_belajar']    = $this->MCaraPembelajaran->allCaraPembelajaran();
		$data['metode_belajar']  = $this->MMetode_belajar->allMetode();
		$data['agenda']		     = $this->MPengampumateri->allagenda();

		$data['user'] 	 		 = $this->MUser->user_by_iduser($this->session->userdata('id_user'), $this->session->userdata('akses_login'));
		$this->load->view('kerangka/_1_header-css', $data);
		$this->load->view('kerangka/_2_sidebar');
        $this->load->view('mata_pelajaran/index');
		$this->load->view('kerangka/_4_footer-js');
    }

	public function add(){
		$data['title'] 	  	      = "Daftar Mata Pelajaran - SI Pena Pintar";
		$this->form_validation->set_rules('mapel', 'mapel', 'required');
		$this->form_validation->set_rules('mapel-cara_belajar', 'mapel-cara_belajar', 'required');
		$this->form_validation->set_rules('mapel-metode_belajar', 'mapel-metode_belajar', 'required');
		$this->form_validation->set_rules('mapel-agenda', 'mapel-agenda', 'required');
	
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('kerangka/_1_header-css', $data);
			$this->load->view('kerangka/_2_sidebar');
			$this->load->view('mata_pelajaran/index');
			$this->load->view('kerangka/_4_footer-js');
		}
		else{
			$this->MMata_pelajaran->add();
			$this->session->set_flashdata('flash', 'Disimpan');
			redirect('mata_pelajaran');
		}
	}

	public function delete($nip_wi){
		// $this->MPendamping->delete($nip_wi);
		// $this->session->set_flashdata('flash', 'Dihapus');
		// redirect('pendamping');
	}
}
 ?>
