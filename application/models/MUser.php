<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MUser extends CI_Model{
    public function __construct() {
		parent::__construct(); 
    }
    
    public function user_by_iduser($id_user, $akses_login){
        if($akses_login == "admin" || $akses_login == "peserta"){
            return $this->db->query("select * from tb_peserta WHERE nip_peserta = '$id_user'")->result_array();
        }
        else if($akses_login == "widyaiswara"){
            return $this->db->query("select * from tb_widyaiswara WHERE nip_wi = '$id_user'")->result_array();
        }  
    }
}