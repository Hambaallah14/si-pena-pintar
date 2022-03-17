<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MPeserta extends CI_Model{
    public function __construct() {
		parent::__construct(); 
    }
    
    public function allPeserta(){
      return $this->db->query("SELECT tb_peserta.nip_peserta, tb_peserta.nama, tb_peserta.instansi, tb_peserta.unit_organisasi, tb_login.status_user, tb_pelatihan.pelatihan FROM tb_peserta INNER JOIN tb_login ON tb_peserta.nip_peserta=tb_login.id_user INNER JOIN tb_pelatihan ON tb_pelatihan.id_pelatihan=tb_peserta.id_pelatihan")->result_array();
    }

    public function allAgama(){
      return $this->db->query("SELECT * FROM tb_agama")->result_array();
    }

    public function add(){
      $data_peserta = [
        "nip_peserta"             => $this->input->post('peserta-nip', true),
        "nama"                    => $this->input->post('peserta-nama', true),
        "email"                   => $this->input->post('peserta-email', true)
      ];
      $this->db->insert('tb_peserta', $data_peserta);

      $data_login = [
          "id_user"                 => $this->input->post('peserta-nip', true),
          "password"                => md5($this->input->post('peserta-password', true)),
          "akses_login"             => "peserta",
          "status_user"             => "aktif",
          "status_kelengkapan_data" => "tidak"
      ];
      $this->db->insert('tb_login', $data_login);
    }


    public function delete($nip_peserta){
      $this->db->where('nip_peserta', $nip_peserta);
      $this->db->delete('tb_peserta');

        $this->db->where('id_user', $nip_peserta);
        $this->db->delete('tb_login');
    }
}