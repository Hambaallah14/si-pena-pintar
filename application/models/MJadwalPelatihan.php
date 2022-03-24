<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MJadwalPelatihan extends CI_Model{
    public function __construct() {
		parent::__construct(); 
    }
    
    public function header_jadwal_pelatihan(){
      return $this->db->query("SELECT tb_pelatihan.pelatihan, tb_metode_belajar.metode, tb_header_batch.batch, tb_header_jadwal_pelatihan.tahun, tb_header_jadwal_pelatihan.id_jadwal, tb_header_jadwal_pelatihan.id_batch FROM tb_header_jadwal_pelatihan INNER JOIN tb_pelatihan ON tb_pelatihan.id_pelatihan=tb_header_jadwal_pelatihan.id_pelatihan INNER JOIN tb_metode_belajar ON tb_metode_belajar.id_metode=tb_header_jadwal_pelatihan.id_metode INNER JOIN tb_header_batch ON tb_header_batch.id=tb_header_jadwal_pelatihan.id_batch")->result_array();
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


    // JADWAL TANGGAL PELATIHAN
    public function jadwal_tanggal($id_jadwal){
      return $this->db->query("SELECT * FROM tb_header_jadwal_tanggal WHERE id_jadwal = '$id_jadwal'")->result_array();
    }

    public function addJadwalTanggal(){
      $data_jadwal = [
        "id_jadwal"     => $this->input->post('tanggal-id_jadwal', true),
        "tanggal"       => $this->input->post('tanggal', true)
      ];
      $this->db->insert('tb_header_jadwal_tanggal', $data_jadwal);
    }

    public function deleteJadwalTanggal($id_tanggal){
      $this->db->where('id_tanggal', $id_tanggal);
      $this->db->delete('tb_header_jadwal_tanggal');
    }



    // JADWAL MATERI
    public function jadwal_materi($id_tanggal){
      return $this->db->query("SELECT tb_header_jadwal_materi.id_j_m, tb_header_jadwal_materi.id_agenda, tb_header_agenda.agenda, tb_mapel.mapel FROM tb_header_agenda INNER JOIN tb_header_jadwal_materi ON tb_header_jadwal_materi.id_agenda=tb_header_agenda.id_agenda INNER JOIN tb_mapel ON tb_mapel.id_mapel=tb_header_jadwal_materi.id_materi WHERE tb_header_jadwal_materi.id_tanggal = '$id_tanggal'")->result_array();

      return $this->db->query("SELECT * FROM tb_header_jadwal_materi WHERE id_tanggal = '$id_tanggal'")->result_array();
    }
}
