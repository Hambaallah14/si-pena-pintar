<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MPendamping extends CI_Model{
    public function __construct() {
		parent::__construct(); 
    }
    
    public function allPendamping(){
      return $this->db->query("SELECT tb_pendamping.nip, tb_pendamping.nama, tb_pendamping.jabatan, tb_login.status_user FROM tb_pendamping INNER JOIN tb_login ON tb_pendamping.nip=tb_login.id_user")->result_array();
    }

    public function add(){
      $data_pendamping = [
        "nip"             => $this->input->post('pendamping-nip', true),
        "nama"            => $this->input->post('pendamping-nama', true),
        "jabatan"         => $this->input->post('pendamping-jabatan', true)
      ];
      $this->db->insert('tb_pendamping', $data_pendamping);

      $data_login = [
          "id_user"       => $this->input->post('pendamping-nip', true),
          "password"      => md5($this->input->post('pendamping-password', true)),
          "akses_login"   => "pendamping",
          "status_user"   => "aktif"
      ];
      $this->db->insert('tb_login', $data_login);
    }


    public function delete($nip){
      // tb_pendamping
      $this->db->where('nip', $nip);
      $this->db->delete('tb_pendamping');
      
      // tb_login
      $this->db->where('id_user', $nip);
      $this->db->delete('tb_login');
    }

    public function edit_pribadi(){
      // tb_pendamping
      $data_edit = [
        "nip"             => $this->input->post('pendamping-nip', true),
        "nama"            => $this->input->post('pendamping-nama', true),
        "jabatan"         => $this->input->post('pendamping-jabatan', true)
      ];
      $this->db->where("nip", $this->input->post('pendamping-nip', true));
		  $this->db->update('tb_pendamping', $data_edit);
    }

    public function edit_akun(){
      // tb_login
      $data_edit_status = [
        "status_user" => $this->input->post('pendamping-status-user', true)
      ];
      $this->db->where("id_user", $this->input->post('pendamping-nip', true));
		  $this->db->update('tb_login', $data_edit_status);
    }
}