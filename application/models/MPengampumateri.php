<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MPengampumateri extends CI_Model{
    public function __construct() {
		parent::__construct(); 
    }
    
    public function allAgenda(){
      return $this->db->query("SELECT * FROM tb_header_agenda")->result_array();
    }

    public function add(){
      $data_pengampu = [
        "agenda"       => $this->input->post('agenda', true)
      ];
      $this->db->insert('tb_header_agenda', $data_pengampu);
    }


    public function delete($id_agenda){
      // tb_pendamping
      $this->db->where('id_agenda', $id_agenda);
      $this->db->delete('tb_header_agenda');
    }



    // WIDYAISWARA
    public function allPengampu($id_agenda){
      return $this->db->query("SELECT tb_detail_agenda.id_agenda, tb_detail_agenda.nip_wi, tb_widyaiswara.nama FROM tb_detail_agenda INNER JOIN tb_widyaiswara ON tb_widyaiswara.nip_wi=tb_detail_agenda.nip_wi WHERE tb_detail_agenda.id_agenda = '$id_agenda'")->result_array();
    }

    public function add_widyaiswara(){
      $data_pengampu = [
        "id_agenda"    => $this->input->post('id_agenda', true),
        "nip_wi"       => $this->input->post('wi', true)
      ];
      $this->db->insert('tb_detail_agenda', $data_pengampu);
    }

    public function selectWidyaiswara(){
      return $this->db->query("SELECT * FROM tb_widyaiswara WHERE NOT EXISTS (SELECT * FROM tb_detail_agenda WHERE tb_widyaiswara.nip_wi = tb_detail_agenda.nip_wi)")->result_array();
    }

    public function delete_wi($nip_wi){
      // tb_pendamping
      $this->db->where('nip_wi', $nip_wi);
      $this->db->delete('tb_detail_agenda');
    }

    
}