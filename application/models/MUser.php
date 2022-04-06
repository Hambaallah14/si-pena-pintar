<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MUser extends CI_Model{
    public function __construct() {
		parent::__construct(); 
    }
    
    public function user_by_iduser($id_user, $akses_login){
        if($akses_login == "admin" || $akses_login == "peserta"){
            return $this->db->query("SELECT tb_peserta.nip_peserta, tb_peserta.nama, tb_peserta.alamat, tb_peserta.jenis_kelamin, tb_peserta.tempat_lahir, tb_peserta.tgl_lahir, tb_peserta.email, tb_peserta.no_telp, tb_peserta.jab_terakhir, tb_peserta.unor, tb_peserta.alamat_unor, tb_pelatihan.pelatihan, tb_agama.agama, tb_instansi.instansi, tb_gol.gol, tb_pola_penyelenggaraan.pola FROM tb_peserta INNER JOIN tb_agama ON tb_peserta.id_agama=tb_agama.id_agama INNER JOIN tb_pelatihan ON tb_peserta.id_pelatihan=tb_pelatihan.id_pelatihan INNER JOIN tb_instansi ON tb_instansi.id_instansi=tb_peserta.id_instansi INNER JOIN tb_gol ON tb_peserta.id_gol=tb_gol.id_gol INNER JOIN tb_pola_penyelenggaraan ON tb_pola_penyelenggaraan.id_pola=tb_peserta.id_pola WHERE tb_peserta.nip_peserta = '$id_user'")->result_array();
        }
        else if($akses_login == "widyaiswara"){
            return $this->db->query("SELECT * FROM tb_widyaiswara WHERE nip_wi = '$id_user'")->result_array();
        }  
    }

    public function select_registrasi_user($nip){
        return $this->db->query("SELECT * FROM tb_peserta WHERE nip_peserta='$nip'")->result_array();
    }
}