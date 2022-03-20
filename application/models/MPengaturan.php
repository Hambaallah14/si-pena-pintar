<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MPengaturan extends CI_Model{
    public function __construct() {
		parent::__construct(); 
    }
    
    public function JadwalRegistrasi(){
      return $this->db->query("SELECT * FROM tb_jadwal_pendaftaran")->result_array();
    }

    public function JadwalPengumuman(){
      return $this->db->query("SELECT * FROM tb_jadwal_pengumuman")->result_array();
    }

    public function update_jadwal_registrasi(){
      $data = [
        "start_date"  => $this->input->post('pengaturan-tanggal-mulai', true),
        "finish_date" => $this->input->post('pengaturan-tanggal-akhir', true)
      ];
      $this->db->where("id", $this->input->post('pengaturan-id', true));
      $this->db->update('tb_jadwal_pendaftaran', $data);
    }

    public function update_jadwal_pengumuman(){
      $data = [
        "tgl_jadwal"  => $this->input->post('pengaturan-tanggal-pengumuman', true)
      ];
      $this->db->where("id", $this->input->post('pengaturan-id', true));
      $this->db->update('tb_jadwal_pengumuman', $data);
    }


    
}