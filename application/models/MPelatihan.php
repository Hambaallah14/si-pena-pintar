<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MPelatihan extends CI_Model{
    public function __construct() {
		parent::__construct(); 
    }
    
    public function allPelatihan(){
      return $this->db->query("SELECT * FROM tb_pelatihan")->result_array();
    }
}