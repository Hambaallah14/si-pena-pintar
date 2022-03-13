<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
Class Pendamping extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model('MUser');
        $this->load->model('MPendamping');
		if (! $this->session->userdata('logged')) { //cek session
            redirect('login'); //jika tidak ada session maka balek ke menu login
        }
	}

	public function index(){
		$data['title'] 	  	     = "Daftar Pendamping - SI Pena Pintar";
		$data['id_user'] 		 = $this->session->userdata('id_user');
        $data['akses_login'] 	 = $this->session->userdata('akses_login');
        $data['pendamping'] 	 = $this->MPendamping->allPendamping();
		$data['user'] 	 		 = $this->MUser->user_by_iduser($this->session->userdata('id_user'), $this->session->userdata('akses_login'));
		$this->load->view('kerangka/_1_header-css', $data);
		$this->load->view('kerangka/_2_sidebar');
        $this->load->view('pendamping/index');
		$this->load->view('kerangka/_4_footer-js');
    }

	public function add(){
		$data['title'] 	  	      = "Daftar Pendamping - SI Pena Pintar";
		$this->form_validation->set_rules('pendamping-nip', 'pendamping-nip', 'required');
		$this->form_validation->set_rules('pendamping-nama', 'pendamping-nama', 'required');
		$this->form_validation->set_rules('pendamping-jabatan', 'pendamping-jabatan', 'required');
        $this->form_validation->set_rules('pendamping-password', 'pendamping-password', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('kerangka/_1_header-css', $data);
			$this->load->view('kerangka/_2_sidebar');
			$this->load->view('pendamping/index');
			$this->load->view('kerangka/_4_footer-js');
		}
		else{
			$this->MPendamping->add();
			$this->session->set_flashdata('flash', 'Disimpan');
			redirect('pendamping');
		}
	}

	public function delete($nip_wi){
		$this->MPendamping->delete($nip_wi);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('pendamping');
	}

	public function edit_pribadi(){
		$this->MPendamping->edit_pribadi();
		$this->session->set_flashdata('flash', 'Diubah');
		redirect('pendamping');
	}

	public function edit_akun(){
		// echo $this->input->post('wi-nip', true);
		$this->MPendamping->edit_akun();
		$this->session->set_flashdata('flash', 'Diubah');
		redirect('pendamping');
	}
}
 ?>
