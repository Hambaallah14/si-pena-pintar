<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MPembagian_kelompok extends CI_Model{
    public function __construct() {
		parent::__construct(); 
    }
    
    public function allPembagian_kelompok(){
      return $this->db->query("SELECT * FROM tb_header_batch")->result_array();
    }

    public function add(){
      $data_kel = [
        "tahun"   => $this->input->post('batch-tahun', true),
        "batch"   => $this->input->post('batch', true)
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
}