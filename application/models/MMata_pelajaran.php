<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MMata_pelajaran extends CI_Model{
    public function __construct() {
		parent::__construct(); 
    }
    
    public function allMapel(){
      return $this->db->query("SELECT tb_mapel.id_mapel, tb_mapel.mapel, tb_cara_belajar.cara_belajar, tb_pembelajaran.pembelajaran FROM tb_mapel INNER JOIN tb_cara_belajar ON tb_mapel.id_cara_belajar=tb_cara_belajar.id INNER JOIN tb_pembelajaran ON tb_pembelajaran.id=tb_mapel.id_pembelajaran")->result_array();
    }

    public function add(){
      $data_mapel = [
        "mapel"             => $this->input->post('mapel', true),
        "id_cara_belajar"   => $this->input->post('mapel-cara_belajar', true),
        "id_pembelajaran"   => $this->input->post('mapel-metode_belajar', true),
        "id_agenda"         => $this->input->post('mapel-agenda', true)
      ];
      $this->db->insert('tb_mapel', $data_mapel);
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