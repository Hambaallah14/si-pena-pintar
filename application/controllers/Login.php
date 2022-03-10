<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
Class Login extends CI_Controller{
	public function __construct(){
		parent::__construct();
		$this->load->library('Form_validation');
		$this->load->helper(array('Form', 'Cookie', 'String'));
		$this->load->model('MLogin');
	}

	public function index(){
		$cookie = get_cookie('penjadwalan'); // Ambil Cookie
		if ($this->session->userdata('logged')) { // Cek Session
			redirect('dashboard');
		}
		else if($cookie <> ''){
			$row = $this->MLogin->get_by_cookie($cookie)->row(); //memeriksa cookie
			if($row){ //jika cookiesnya ada
				$this->daftar_session($row);
			}
			else{
				$data = array(
					'id_user'  => set_value('id_user'),
					'password' => set_value('password'),
					'flash'    => $this->session->flashdata('flash')
				);
				$this->load->view('login/login', $data);
			}
		}
		else{
			$data = array(
				'id_user'  => set_value('id_user'),
				'password' => set_value('password'),
				'flash'    => $this->session->flashdata('flash')
			);
			$this->load->view('login/login', $data);
		}
	}

	public function daftar_session($row){
		$session = array(
			'logged'		=> TRUE,
			'id'			=> $row->id,
			'id_user'		=> $row->id_user,
			'akses_login'	=> $row->akses_login
			);
		$this->session->set_userdata($session);
		redirect('dashboard');
	}

	public function cek(){
		$id 	  = $this->input->post('login-nip');
        $password = $this->input->post('login-password');
		$row 	  = $this->MLogin->login($id, $password)->row();
		if($row){
			if($row->status_user !== "aktif"){
				$this->session->set_flashdata('flash', 'Akun belum aktif');
        		$this->index();
			}
			else{
				$key = random_string('alnum', 64);
				set_cookie('penjadwalan', $key, 3600*24*30); // set expired 30 hari kedepan
				$update_key = array(  // simpan key di database
					'cookies' => $key
				);
				$this->MLogin->update($update_key, $row->id);
            	$this->daftar_session($row);
			}
		}
	}

	public function logout(){
		delete_cookie('penjadwalan');
		$this->session->sess_destroy();
		redirect('login');
	}
}
 ?>
