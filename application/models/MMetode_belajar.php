<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MMetode_belajar extends CI_Model{
    public function __construct() {
		parent::__construct(); 
    }
    
    public function allMetode(){
      return $this->db->query("SELECT * FROM tb_pembelajaran")->result_array();
    }
}