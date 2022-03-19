<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MPembagian_kelompok extends CI_Model{
    public function __construct() {
		parent::__construct(); 
    }
    
    public function allPembagian_batch(){
      return $this->db->query("SELECT * FROM tb_header_batch")->result_array();
    }

    public function allPembagian_batch_by_id($id){
      return $this->db->query("SELECT * FROM tb_header_batch WHERE id = '$id'")->result_array();
    }

    public function add(){
      $data_kel = [
        "tahun"          => $this->input->post('batch-tahun', true),
        "id_pelatihan"   => $this->input->post('id-pelatihan', true),
        "batch"          => $this->input->post('batch', true)
      ];
      $this->db->insert('tb_header_batch', $data_kel);
    }

    public function delete($id){
      // tb_header_batch
      $this->db->where('id', $id);
      $this->db->delete('tb_header_batch');
    }




    // PEMBAGIAN ANGKATAN
    public function allPembagian_angkatan($id){
      return $this->db->query("SELECT * FROM tb_detail_batch WHERE id_batch='$id'")->result_array();
    }

    public function allPembagian_angkatan_by_id($id){
      return $this->db->query("SELECT * FROM tb_detail_batch WHERE id_angkatan = '$id'")->result_array();
    }

    public function add_angkatan(){
      $data_angkatan = [
        "id_batch"   => $this->input->post('id_batch', true),
        "angkatan"   => $this->input->post('angkatan', true)
      ];
      $this->db->insert('tb_detail_batch', $data_angkatan);
    }

    public function delete_angkatan($id_angkatan){
      // tb_header_batch
      $this->db->where('id_angkatan', $id_angkatan);
      $this->db->delete('tb_detail_batch');
    }



    // PEMBAGIAN KELOMPOK
    public function allPembagian_kelompok($id_angkatan){
      return $this->db->query("SELECT * FROM tb_detail_angkatan WHERE id_angkatan='$id_angkatan'")->result_array();
    }

    public function add_kelompok(){
      $data_kelompok = [
        "id_angkatan" => $this->input->post('id_angkatan', true),
        "kelompok"    => $this->input->post('kelompok', true)
      ];
      $this->db->insert('tb_detail_angkatan', $data_kelompok);
    }

    public function delete_kelompok($id_kelompok){
      // tb_header_batch
      $this->db->where('id_kelompok', $id_kelompok);
      $this->db->delete('tb_detail_angkatan');
    }




    // PEMBAGIAN PESERTA
    public function allPembagian_peserta($id_kelompok){
      return $this->db->query("SELECT tb_detail_kelompok.id_kelompok, tb_peserta.nip_peserta, tb_peserta.nama, tb_peserta.unor, tb_instansi.instansi FROM tb_detail_kelompok INNER JOIN tb_peserta ON tb_peserta.nip_peserta=tb_detail_kelompok.nip_peserta INNER JOIN tb_instansi ON tb_instansi.id_instansi=tb_peserta.id_instansi WHERE tb_detail_kelompok.id_kelompok='$id_kelompok'")->result_array();
    }

    // MENAMPILKAN DATA YG BELUM TERSIMPAN DI TABEL DETAIL KELOMPOK
    public function selectPeserta($instansi, $golongan){
      return $this->db->query("SELECT * FROM tb_peserta WHERE NOT EXISTS (SELECT * FROM tb_detail_kelompok WHERE tb_peserta.nip_peserta = tb_detail_kelompok.nip_peserta) AND tb_peserta.id_instansi = '$instansi' AND tb_peserta.id_gol = '$golongan'")->result_array();
    }

    public function allPembagian_kelompok_by_id($id){
      return $this->db->query("SELECT * FROM tb_detail_angkatan WHERE id_kelompok = '$id'")->result_array();
    }

    public function add_peserta(){
      for($i=0; $i < count($this->input->post('kelompok-peserta-check', true)); $i++){
        $this->db->set('id_kelompok', $this->input->post('id_kelompok', true));
        $this->db->set('nip_peserta', $this->input->post('kelompok-peserta-check', true)[$i]);
        $this->db->insert('tb_detail_kelompok');
      }
    }

    public function delete_peserta($nip){
      // tb_header_batch
      $this->db->where('nip_peserta', $nip);
      $this->db->delete('tb_detail_kelompok');
    }
}