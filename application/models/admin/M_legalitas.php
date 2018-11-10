<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_legalitas extends CI_Model {

	public function get_data() 
	{
		return $this->db->get('legalitas_usaha')->result();
	}
	public function m_kriteria()
	{
		$sql = "SELECT ID_KRITERIA,NAMA_KRITERIA FROM kriteria ORDER BY NAMA_KRITERIA asc";
		return $this->db->query($sql)->result();
	}
	public function input_data($data)
	{
		$this->db->insert('legalitas_usaha', $data);
	}
	
	public function get_by($where)
	{
		$this->db->where('ID_LEGALITAS_USAHA', $where);
		return $this->db->get('legalitas_usaha')->row();
	}

	public function update_data($where, $data)
	{
		$this->db->where($where);
		$this->db->update('legalitas_usaha', $data);
	}

	public function delete_data($where)
	{
		$this->db->where('ID_LEGALITAS_USAHA', $where);
		$this->db->delete('legalitas_usaha');
	}
}