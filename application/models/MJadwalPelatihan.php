<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MJadwalPelatihan extends CI_Model{
    public function __construct() {
		parent::__construct(); 
    }
    
    public function header_jadwal_pelatihan(){
      return $this->db->query("SELECT tb_pelatihan.pelatihan, tb_metode_belajar.metode, tb_header_batch.batch, tb_header_jadwal_pelatihan.tahun, tb_header_jadwal_pelatihan.id_jadwal FROM tb_header_jadwal_pelatihan INNER JOIN tb_pelatihan ON tb_pelatihan.id_pelatihan=tb_header_jadwal_pelatihan.id_pelatihan INNER JOIN tb_metode_belajar ON tb_metode_belajar.id_metode=tb_header_jadwal_pelatihan.id_metode INNER JOIN tb_header_batch ON tb_header_batch.id=tb_header_jadwal_pelatihan.id_batch")->result_array();
    }

    public function allMetodeBelajar(){
      return $this->db->query("SELECT * FROM tb_metode_belajar")->result_array();
    }

    public function selectBatch($id_pelatihan, $tahun){
      return $this->db->query("SELECT * FROM tb_header_batch WHERE NOT EXISTS (SELECT * FROM tb_header_jadwal_pelatihan WHERE tb_header_batch.id = tb_header_jadwal_pelatihan.id_batch) AND tb_header_batch.tahun = '$tahun' AND tb_header_batch.id_pelatihan = '$id_pelatihan'")->result_array();
    }

    public function addJadwalPelatihan(){
      $data_jadwal = [
        "id_metode"       => $this->input->post('jadwal-metode-belajar', true),
        "id_pelatihan"    => $this->input->post('jadwal-pelatihan', true),
        "tahun"           => $this->input->post('jadwal-tahun', true),
        "id_batch"        => $this->input->post('jadwal-batch', true)
      ];
      $this->db->insert('tb_header_jadwal_pelatihan', $data_jadwal);
    }

    public function deleteJadwalPelatihan($id_jadwal){
      $this->db->where('id_jadwal', $id_jadwal);
      $this->db->delete('tb_header_jadwal_pelatihan');
    }


    public function jadwal_tanggal($id_jadwal){
      return $this->db->query("SELECT * FROM tb_header_jadwal_tanggal WHERE id_jadwal = '$id_jadwal'")->result_array();
    }
}