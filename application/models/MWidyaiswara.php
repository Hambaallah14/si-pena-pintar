<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MWidyaiswara extends CI_Model{
    public function __construct() {
		parent::__construct(); 
    }
    
    public function allWidyaiswara(){
      return $this->db->query("SELECT tb_widyaiswara.nip_wi, tb_widyaiswara.nama, tb_widyaiswara.jabatan, tb_widyaiswara.no_telp, tb_widyaiswara.email, tb_login.status_user FROM tb_widyaiswara INNER JOIN tb_login ON tb_widyaiswara.nip_wi=tb_login.id_user")->result_array();
    }

    public function add(){
      $data_wi = [
        "nip_wi"      => $this->input->post('wi-nip', true),
        "nama"        => $this->input->post('wi-nama', true),
        "jabatan"     => $this->input->post('wi-jabatan', true),
        "no_telp"     => $this->input->post('wi-no_telp', true),
        "email"       => $this->input->post('wi-email', true)
      ];
      $this->db->insert('tb_widyaiswara', $data_wi);

      $data_login = [
          "id_user"       => $this->input->post('wi-nip', true),
          "password"      => md5($this->input->post('wi-password', true)),
          "akses_login"   => "widyaiswara",
          "status_user"   => "aktif"
      ];
      $this->db->insert('tb_login', $data_login);
    }


    public function delete($nip_wi){
      // tb_widyaiswara
      $this->db->where('nip_wi', $nip_wi);
      $this->db->delete('tb_widyaiswara');
      
      // tb_login
      $this->db->where('id_user', $nip_wi);
      $this->db->delete('tb_login');
    }

    public function edit_pribadi(){
      // tb_widyaiswara
      $data_edit = [
        "nama"        => $this->input->post('wi-nama', true),
        "jabatan"     => $this->input->post('wi-jabatan', true),
        "no_telp"     => $this->input->post('wi-no_telp', true),
        "email"       => $this->input->post('wi-email', true)
      ];
      $this->db->where("nip_wi", $this->input->post('wi-nip', true));
		  $this->db->update('tb_widyaiswara', $data_edit);
    }

    public function edit_akun(){
      // tb_login
      $data_edit_status = [
        "status_user" => $this->input->post('wi-status-user', true)
      ];
      $this->db->where("id_user", $this->input->post('wi-nip', true));
		  $this->db->update('tb_login', $data_edit_status);
    }
}