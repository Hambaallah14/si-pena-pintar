<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
Class Pengampu_materi extends CI_Controller{
	
	public function __construct(){
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper('url');
		$this->load->model('MUser');
        $this->load->model('MPengampumateri');
		if (! $this->session->userdata('logged')) { //cek session
            redirect('login'); //jika tidak ada session maka balek ke menu login
        }
	}

	public function index(){
		$data['title'] 	  	     = "Daftar Pengampu Materi - SI Pena Pintar";
		$data['id_user'] 		 = $this->session->userdata('id_user');
        $data['akses_login'] 	 = $this->session->userdata('akses_login');
        $data['pengampu_materi'] = $this->MPengampumateri->allAgenda();
		$data['user'] 	 		 = $this->MUser->user_by_iduser($this->session->userdata('id_user'), $this->session->userdata('akses_login'));
		$this->load->view('kerangka/_1_header-css', $data);
		$this->load->view('kerangka/_2_sidebar');
        $this->load->view('pengampu_materi/index');
		$this->load->view('kerangka/_4_footer-js');
    }

	public function add(){
		$data['title'] 	  	      = "Daftar Pengampu Materi - SI Pena Pintar";
		$this->form_validation->set_rules('agenda', 'agenda', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('kerangka/_1_header-css', $data);
			$this->load->view('kerangka/_2_sidebar');
			$this->load->view('pengampu_materi/index');
			$this->load->view('kerangka/_4_footer-js');
		}
		else{
			$this->MPengampumateri->add();
			$this->session->set_flashdata('flash', 'Disimpan');
			redirect('pengampu_materi');
		}
	}

	public function delete($id_agenda){
		$this->MPengampumateri->delete($id_agenda);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('pengampu_materi');
	}

	public function tambah_widyaiswara($id_agenda){
		$data['title'] 	  	     	= "Daftar Pengampu Materi - SI Pena Pintar";
		$data['id_user'] 		 	= $this->session->userdata('id_user');
        $data['akses_login'] 		= $this->session->userdata('akses_login');
        $data['widyaiswara']	 	= $this->MPengampumateri->allPengampu($id_agenda);
		$data['id_agenda']			= $id_agenda;
		$data['selectWidyaiswara']	= $this->MPengampumateri->selectWidyaiswara();
		$data['user'] 	 		 	= $this->MUser->user_by_iduser($this->session->userdata('id_user'), $this->session->userdata('akses_login'));
		$this->load->view('kerangka/_1_header-css', $data);
		$this->load->view('kerangka/_2_sidebar');
        $this->load->view('pengampu_materi/widyaiswara');
		$this->load->view('kerangka/_4_footer-js');
	}

	public function add_widyaiswara(){
		$data['title'] 	  	= "Daftar Pengampu Materi - SI Pena Pintar";
		$id_agenda			=	$this->input->post('id_agenda');
		$this->form_validation->set_rules('id_agenda', 'id_agenda', 'required');
		$this->form_validation->set_rules('wi', 'wi', 'required');
		if ($this->form_validation->run() == FALSE) {
			$this->load->view('kerangka/_1_header-css', $data);
			$this->load->view('kerangka/_2_sidebar');
			$this->load->view('pengampu_materi/widyaiswara');
			$this->load->view('kerangka/_4_footer-js');
		}
		else{
			$this->MPengampumateri->add_widyaiswara();
			$this->session->set_flashdata('flash', 'Disimpan');
			redirect('pengampu_materi/tambah_widyaiswara/'.$id_agenda);
		}
	}

	public function delete_wi($id_agenda, $nip_wi){
		$this->MPengampumateri->delete_wi($nip_wi);
		$this->session->set_flashdata('flash', 'Dihapus');
		redirect('pengampu_materi/widyaiswara/'.$id_agenda);
	}
}
 ?>
