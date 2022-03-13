<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MPenceramah extends CI_Model{
    public function __construct() {
		parent::__construct(); 
    }
    
    public function allPenceramah(){
      return $this->db->query("SELECT tb_penceramah.id_penceramah, tb_penceramah.nama, tb_penceramah.jabatan, tb_login.status_user FROM tb_penceramah INNER JOIN tb_login ON tb_penceramah.id_penceramah=tb_login.id_user")->result_array();
    }

    public function add(){
      $data_penceramah = [
        "id_penceramah"   => $this->input->post('penceramah-id', true),
        "nama"            => $this->input->post('penceramah-nama', true),
        "jabatan"         => $this->input->post('penceramah-jabatan', true)
      ];
      $this->db->insert('tb_penceramah', $data_penceramah);

      $data_login = [
          "id_user"       => $this->input->post('penceramah-id', true),
          "password"      => md5($this->input->post('penceramah-password', true)),
          "akses_login"   => "penceramah",
          "status_user"   => "aktif"
      ];
      $this->db->insert('tb_login', $data_login);
    }


    public function delete($id_penceramah){
      // tb_penceramah
      $this->db->where('id_penceramah', $id_penceramah);
      $this->db->delete('tb_penceramah');
      
      // tb_login
      $this->db->where('id_user', $id_penceramah);
      $this->db->delete('tb_login');
    }

    public function edit_pribadi(){
      // tb_penceramah
      $data_edit = [
        "id_penceramah"   => $this->input->post('penceramah-id', true),
        "nama"            => $this->input->post('penceramah-nama', true),
        "jabatan"         => $this->input->post('penceramah-jabatan', true)
      ];
      $this->db->where("id_penceramah", $this->input->post('penceramah-id', true));
		  $this->db->update('tb_penceramah', $data_edit);
    }

    public function edit_akun(){
      // tb_login
      $data_edit_status = [
        "status_user" => $this->input->post('penceramah-status-user', true)
      ];
      $this->db->where("id_user", $this->input->post('penceramah-id', true));
		  $this->db->update('tb_login', $data_edit_status);
    }
}