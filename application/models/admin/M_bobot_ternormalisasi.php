<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class M_bobot_ternormalisasi extends CI_Model {

	public function get_data() 
	{
		return $this->db->get('nilai_bobot_ternormalisasi')->result();
	}

	public function input_data($data)
	{
		$this->db->insert('nilai_bobot_ternormalisasi', $data);
	}

	public function update_data_D_V($id,$dPlus,$dMin,$v)
	{
		$this->db->set('D_PLUS',$dPlus);
		$this->db->set('D_MIN',$dMin);
		$this->db->set('V',$v);
		$this->db->where('ID_PENDAFTAR',$id);
		$this->db->update('nilai_bobot_ternormalisasi');	
	}
	public function delete_all(){
		$this->db->empty_table('nilai_bobot_ternormalisasi');
	}
	public function get_min_by_kolom($nama_kolom){
		$this->db->select_min($nama_kolom);
		return $this->db->get('nilai_bobot_ternormalisasi')->row();
	}
	public function get_max_by_kolom($nama_kolom){
		$this->db->select_max($nama_kolom);
		return $this->db->get('nilai_bobot_ternormalisasi')->row();
	}

}

	
	
