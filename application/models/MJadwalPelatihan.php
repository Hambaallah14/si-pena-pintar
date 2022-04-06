<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MJadwalPelatihan extends CI_Model{
    public function __construct() {
		parent::__construct(); 
    }
    
    public function header_jadwal_pelatihan(){
      return $this->db->query("SELECT tb_pelatihan.pelatihan, tb_metode_belajar.metode, tb_header_batch.batch, tb_header_jadwal_pelatihan.tahun, tb_header_jadwal_pelatihan.id_jadwal, tb_header_jadwal_pelatihan.id_batch FROM tb_header_jadwal_pelatihan INNER JOIN tb_pelatihan ON tb_pelatihan.id_pelatihan=tb_header_jadwal_pelatihan.id_pelatihan INNER JOIN tb_metode_belajar ON tb_metode_belajar.id_metode=tb_header_jadwal_pelatihan.id_metode INNER JOIN tb_header_batch ON tb_header_batch.id=tb_header_jadwal_pelatihan.id_batch")->result_array();
    }

    public function jadwalPelatihan($nip){
      return $this->db->query("SELECT tb_header_jadwal_tanggal.tanggal, tb_detail_batch.angkatan, tb_header_jadwal_pengajar.waktu_mulai, tb_header_jadwal_pengajar.waktu_selesai, tb_mapel.mapel, tb_zoom.zoom, tb_sesi.sesi, tb_cara_belajar.cara_belajar, tb_pembelajaran.pembelajaran, tb_widyaiswara.nama_wi, tb_pendamping.nama FROM tb_header_jadwal_tanggal INNER JOIN tb_header_jadwal_materi ON tb_header_jadwal_tanggal.id_tanggal=tb_header_jadwal_materi.id_tanggal
      INNER JOIN tb_header_jadwal_pengajar ON tb_header_jadwal_pengajar.id_j_m=tb_header_jadwal_materi.id_j_m INNER JOIN tb_zoom ON tb_zoom.id=tb_header_jadwal_pengajar.id_room INNER JOIN tb_sesi ON tb_sesi.id_sesi=tb_header_jadwal_pengajar.id_sesi INNER JOIN tb_mapel ON
      tb_mapel.id_mapel=tb_header_jadwal_materi.id_materi INNER JOIN tb_detail_batch ON tb_detail_batch.id_angkatan=tb_header_jadwal_pengajar.id_angkatan INNER JOIN tb_detail_angkatan ON
      tb_detail_angkatan.id_angkatan=tb_header_jadwal_pengajar.id_angkatan INNER JOIN tb_detail_kelompok ON
      tb_detail_kelompok.id_kelompok=tb_detail_angkatan.id_kelompok INNER JOIN tb_cara_belajar ON tb_cara_belajar.id=tb_mapel.id_cara_belajar INNER JOIN tb_pembelajaran ON tb_pembelajaran.id=tb_mapel.id_pembelajaran INNER JOIN tb_widyaiswara ON tb_widyaiswara.nip_wi=tb_header_jadwal_pengajar.id_pembimbing INNER JOIN tb_pendamping ON tb_header_jadwal_pengajar.id_pendamping=tb_pendamping.nip WHERE tb_detail_kelompok.nip_peserta = '$nip' ORDER BY tb_header_jadwal_materi.id_j_m")->result_array();
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
      return $this->db->query("SELECT * FROM tb_header_jadwal_tanggal WHERE id_jadwal = '$id_jadwal' ORDER BY tanggal")->result_array();
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
      return $this->db->query("SELECT tb_header_jadwal_materi.id_j_m, tb_header_jadwal_materi.id_agenda, tb_header_agenda.agenda, tb_mapel.id_mapel, tb_mapel.mapel, tb_cara_belajar.cara_belajar FROM tb_header_agenda INNER JOIN tb_header_jadwal_materi ON tb_header_jadwal_materi.id_agenda=tb_header_agenda.id_agenda INNER JOIN tb_mapel ON tb_mapel.id_mapel=tb_header_jadwal_materi.id_materi INNER JOIN tb_cara_belajar ON tb_cara_belajar.id=tb_mapel.id_cara_belajar WHERE tb_header_jadwal_materi.id_tanggal = '$id_tanggal' ORDER BY tb_header_jadwal_materi.id_j_m")->result_array();
      // return $this->db->query("SELECT * FROM tb_header_jadwal_materi WHERE id_tanggal = '$id_tanggal'")->result_array();
    }

    public function selectMateri($id_agenda){
      return $this->db->query("SELECT * FROM tb_mapel WHERE id_agenda = '$id_agenda'")->result_array();
    }

    public function addJadwalMateri(){
      $data_materi = [
        "id_tanggal"   => $this->input->post('id_tanggal', true),
        "id_agenda"    => $this->input->post('jadwal-agenda-materi', true),
        "id_materi"    => $this->input->post('jadwal-materi', true)
      ];
      $this->db->insert('tb_header_jadwal_materi', $data_materi);
    }

    public function deleteJadwalMateri($id_j_m){
      $this->db->where('id_j_m', $id_j_m);
      $this->db->delete('tb_header_jadwal_materi');
    }



    // JADWAL MATERI
    public function jadwal_pengajar($id_j_m){
      return $this->db->query("SELECT tb_detail_batch.angkatan, tb_sesi.sesi, tb_zoom.zoom, tb_header_jadwal_pengajar.id_j_p, tb_header_jadwal_pengajar.id_j_m, tb_header_jadwal_pengajar.waktu_mulai, tb_header_jadwal_pengajar.waktu_selesai, tb_header_jadwal_pengajar.id_pembimbing, tb_header_jadwal_pengajar.id_pendamping, tb_widyaiswara.nama_wi, tb_pendamping.nama FROM tb_detail_batch INNER JOIN tb_header_jadwal_pengajar ON tb_header_jadwal_pengajar.id_angkatan=tb_detail_batch.id_angkatan INNER JOIN tb_sesi ON tb_sesi.id_sesi=tb_header_jadwal_pengajar.id_sesi INNER JOIN tb_widyaiswara ON tb_widyaiswara.nip_wi=tb_header_jadwal_pengajar.id_pembimbing INNER JOIN tb_pendamping ON tb_header_jadwal_pengajar.id_pendamping=tb_pendamping.nip INNER JOIN tb_zoom ON tb_zoom.id=tb_header_jadwal_pengajar.id_room WHERE tb_header_jadwal_pengajar.id_j_m ='$id_j_m'")->result_array();
    }

    public function sesi(){
      return $this->db->query("SELECT * FROM tb_sesi")->result_array();
    }

    public function zoom(){
      return $this->db->query("SELECT * FROM tb_zoom")->result_array();
    }

    public function selectPembimbing($id_tanggal, $materi, $mulai, $selesai){
      return $this->db->query("SELECT tb_widyaiswara.nip_wi, tb_widyaiswara.nama_wi FROM tb_widyaiswara INNER JOIN tb_detail_agenda ON tb_detail_agenda.nip_wi=tb_widyaiswara.nip_wi INNER JOIN tb_header_agenda ON tb_header_agenda.id_agenda=tb_detail_agenda.id_agenda INNER JOIN tb_mapel ON tb_mapel.id_agenda=tb_header_agenda.id_agenda WHERE NOT EXISTS(SELECT tb_header_jadwal_pengajar.id_j_m, tb_header_jadwal_pengajar.id_angkatan, tb_header_jadwal_tanggal.id_tanggal FROM tb_header_jadwal_pengajar INNER JOIN tb_header_jadwal_materi ON tb_header_jadwal_pengajar.id_j_m=tb_header_jadwal_materi.id_j_m INNER JOIN tb_header_jadwal_tanggal ON tb_header_jadwal_materi.id_tanggal=tb_header_jadwal_tanggal.id_tanggal WHERE tb_header_jadwal_pengajar.id_pembimbing=tb_widyaiswara.nip_wi AND tb_header_jadwal_pengajar.waktu_mulai >= '$mulai' AND tb_header_jadwal_pengajar.waktu_selesai <= '$selesai' AND tb_header_jadwal_tanggal.id_tanggal = '$id_tanggal') AND tb_mapel.id_mapel = '$materi'")->result_array();
    }

    public function selectPendamping($id_tanggal, $mulai, $selesai){
      return $this->db->query("SELECT * FROM tb_pendamping WHERE NOT EXISTS(SELECT tb_header_jadwal_pengajar.id_j_m, tb_header_jadwal_pengajar.id_angkatan, tb_header_jadwal_tanggal.id_tanggal FROM tb_header_jadwal_pengajar INNER JOIN tb_header_jadwal_materi ON tb_header_jadwal_pengajar.id_j_m=tb_header_jadwal_materi.id_j_m INNER JOIN tb_header_jadwal_tanggal ON tb_header_jadwal_materi.id_tanggal=tb_header_jadwal_tanggal.id_tanggal WHERE tb_header_jadwal_pengajar.id_pendamping=tb_pendamping.nip AND tb_header_jadwal_pengajar.waktu_mulai >= '$mulai' AND tb_header_jadwal_pengajar.waktu_selesai <= '$selesai' AND tb_header_jadwal_tanggal.id_tanggal = '$id_tanggal')")->result_array();
    }

    public function addJadwalPengajar(){
      $data_pengajar = [
        "id_j_m"           => $this->input->post('id_j_m', true),
        "id_angkatan"      => $this->input->post('jadwal-pengajar-angkatan', true),
        "id_sesi"          => $this->input->post('jadwal-pengajar-sesi', true),
        "id_room"          => $this->input->post('jadwal-pengajar-room', true),
        "waktu_mulai"      => $this->input->post('jadwal-pengajar-waktu-mulai', true),
        "waktu_selesai"    => $this->input->post('jadwal-pengajar-waktu-selesai', true),
        "id_pembimbing"    => $this->input->post('jadwal-pengajar-pembimbing', true),
        "id_pendamping"    => $this->input->post('jadwal-pengajar-pendamping', true)
      ];
      $this->db->insert('tb_header_jadwal_pengajar', $data_pengajar);
    }

    public function deleteJadwalPengajar($id_j_p){
      $this->db->where('id_j_p', $id_j_p);
      $this->db->delete('tb_header_jadwal_pengajar');
    }

}
