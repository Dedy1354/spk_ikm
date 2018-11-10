<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_kriteria extends CI_Model {

	public function get_data() 
	{
		return $this->db->get('kriteria')->result();
	}
	public function get_data_id_kriteria() 
	{
		$this->db->select('ID_KRITERIA,TIPE_KRITERIA');
		return $this->db->get('kriteria')->result();
	}

	public function input_data($data)
	{
		$this->db->insert('kriteria', $data);
	}
	
	public function get_by($where)
	{
		$this->db->where('ID_KRITERIA', $where);
		return $this->db->get('kriteria')->row();
	}

	public function update_data($where, $data)
	{
		$this->db->where($where);
		$this->db->update('kriteria', $data);
	}

	public function delete_data($where)
	{
		$this->db->where('ID_KRITERIA', $where);
		$this->db->delete('kriteria');
	}

	public function get_bobot_by_id($id){
		$this->db->where('ID_KRITERIA', $id);
		return $this->db->get('kriteria')->row();
	}
	

}