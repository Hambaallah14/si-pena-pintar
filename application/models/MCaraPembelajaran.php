<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MCaraPembelajaran extends CI_Model{
    public function __construct() {
		parent::__construct(); 
    }
    
    public function allCaraPembelajaran(){
      return $this->db->query("SELECT * FROM tb_cara_belajar")->result_array();
    }
}