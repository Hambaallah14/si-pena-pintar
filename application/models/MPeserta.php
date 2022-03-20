<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MPeserta extends CI_Model{
    public function __construct() {
		parent::__construct(); 
    }
    
    public function allPeserta(){
      return $this->db->query("SELECT tb_peserta.nip_peserta, tb_peserta.nama, tb_instansi.instansi, tb_peserta.unor, tb_login.status_user, tb_pelatihan.pelatihan FROM tb_peserta INNER JOIN tb_login ON tb_peserta.nip_peserta=tb_login.id_user INNER JOIN tb_pelatihan ON tb_pelatihan.id_pelatihan=tb_peserta.id_pelatihan INNER JOIN tb_instansi ON tb_instansi.id_instansi=tb_peserta.id_instansi")->result_array();
    }

    public function allAgama(){
      return $this->db->query("SELECT * FROM tb_agama")->result_array();
    }

    public function allGolongan(){
      return $this->db->query("SELECT * FROM tb_gol ORDER BY id_gol DESC")->result_array();
    }

    public function allInstansi(){
      return $this->db->query("SELECT * FROM tb_instansi")->result_array();
    }

    public function allPolaPenyelenggaraan(){
      return $this->db->query("SELECT * FROM tb_pola_penyelenggaraan")->result_array();
    }

    public function allPelatihan(){
      return $this->db->query("SELECT * FROM tb_pelatihan")->result_array();
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

      $data_dokumen = [
          "nip_peserta"   => $this->input->post('peserta-nip', true),
          "sk_cpns"       => "",
          "sk_jab"        => ""
      ];
      $this->db->insert('tb_dokumen', $data_dokumen);

    }

   
    public function upload_file_sk_cpns($nip){
          $nama_file               = $nip."BPSDM".time(); //membuat nama file baru
          $config['file_name']     = $nama_file; //mengubah nama file
          $config['upload_path']   = './assets/dokumen'; //lokasi file
          $config['allowed_types'] = 'pdf'; //format file PDF
          $config['max_size']	     = '10000000'; //Ukuran File 1 mb
          $config['remove_space']  = TRUE;
          $this->load->library('upload', $config);

          // INPUT TYPE FILES KE-1    
          if($this->upload->do_upload('peserta-upload_sk_cpns')){
            $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
              return $return;
          }
            else{
              $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
              return $return;
          }
    }

    public function upload_file_sk_jab($nip){
        $nama_file               = $nip."BPSDM".time(); //membuat nama file baru
        $config['file_name']     = $nama_file; //mengubah nama file
        $config['upload_path']   = './assets/dokumen'; //lokasi file
        $config['allowed_types'] = 'pdf'; //format file PDF
        $config['max_size']	     = '10000000'; //Ukuran File 1 mb
        $config['remove_space']  = TRUE;
        $this->load->library('upload', $config);

        // INPUT TYPE FILES KE-1    
        if($this->upload->do_upload('peserta-upload_sk_jabatan')){
          $return = array('result' => 'success', 'file' => $this->upload->data(), 'error' => '');
            return $return;
        }
          else{
            $return = array('result' => 'failed', 'file' => '', 'error' => $this->upload->display_errors());
            return $return;
        }
    }

    public function edit_form_registrasi($upload_sk, $upload_jab){
      $data_edit = [
        "nama"            => $this->input->post('peserta-nama', true),
        "alamat"          => $this->input->post('peserta-alamat', true),
        "jenis_kelamin"   => $this->input->post('peserta-jenis_kelamin', true),
        "id_agama"        => $this->input->post('peserta-agama', true),
        "tempat_lahir"    => $this->input->post('peserta-tempat_lhr', true),
        "tgl_lahir"       => $this->input->post('peserta-tgl_lhr', true),
        "email"           => $this->input->post('peserta-email', true),
        "no_telp"         => $this->input->post('peserta-no_telp', true),
        "id_pelatihan"    => $this->input->post('peserta-pelatihan', true),
        "id_gol"          => $this->input->post('peserta-gol', true),
        "jab_terakhir"    => $this->input->post('peserta-jabatan', true),
        "id_pola"         => $this->input->post('peserta-pola', true),
        "id_instansi"     => $this->input->post('peserta-instansi', true),
        "unor"            => $this->input->post('peserta-unor', true),
        "alamat_unor"     => $this->input->post('peserta-alamat_unor', true)
      ];
      $this->db->where("nip_peserta", $this->input->post('peserta-nip', true));
		  $this->db->update('tb_peserta', $data_edit);

      $data_login = [
        "status_kelengkapan_data" => "ya"
      ];
      $this->db->where("id_user", $this->input->post('peserta-nip', true));
		  $this->db->update('tb_login', $data_login);

      // mengupload nama file ke dalam DB
      $data_dokumen = [
        "sk_cpns"     =>  $upload_sk['file']['file_name'],
        "sk_jab"      =>  $upload_jab['file']['file_name']
      ];
      $this->db->where("nip_peserta", $this->input->post('peserta-nip', true));
      $this->db->update('tb_dokumen', $data_dokumen);
    }


    public function delete($nip_peserta){
      $this->db->where('nip_peserta', $nip_peserta);
      $this->db->delete('tb_peserta');

        $this->db->where('id_user', $nip_peserta);
        $this->db->delete('tb_login');
    }


}