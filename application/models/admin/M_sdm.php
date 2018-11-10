<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_sdm extends CI_Model {

	public function get_data() 
	{
		return $this->db->get('sdm')->result();
	}
	public function m_kriteria()
	{
		$sql = "SELECT ID_KRITERIA,NAMA_KRITERIA FROM kriteria ORDER BY NAMA_KRITERIA asc";
		return $this->db->query($sql)->result();
	}
	public function input_data($data)
	{
		$this->db->insert('sdm', $data);
	}
	
	public function get_by($where)
	{
		$this->db->where('ID_SDM', $where);
		return $this->db->get('sdm')->row();
	}

	public function update_data($where, $data)
	{
		$this->db->where($where);
		$this->db->update('sdm', $data);
	}

	public function delete_data($where)
	{
		$this->db->where('ID_SDM', $where);
		$this->db->delete('sdm');
	}
}