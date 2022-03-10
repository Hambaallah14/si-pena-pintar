<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
Class Login extends CI_Controller{
	
	public function index(){
		$data['title'] 	  = "Login - SI Pena Pintar";
		$this->load->view('kerangka/_1_header-css', $data);
		$this->load->view('kerangka/_2_sidebar');
		// $this->load->view('kerangka/_3_content');
		$this->load->view('kerangka/_4_footer-js');
	}
}
 ?>
