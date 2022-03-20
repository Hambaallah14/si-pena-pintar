<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MJadwal extends CI_Model{
    public function __construct() {
		parent::__construct(); 
    }
    
    public function jadwal_pengumuman(){
      return $this->db->query("SELECT * FROM tb_jadwal_pengumuman")->result_array();
    }
}