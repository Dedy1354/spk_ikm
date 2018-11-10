<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_partisipasi extends CI_Model {

	public function get_data() 
	{
		return $this->db->get('partisipasi')->result();
	}
	public function m_kriteria()
	{
		$sql = "SELECT ID_KRITERIA,NAMA_KRITERIA FROM kriteria ORDER BY NAMA_KRITERIA asc";
		return $this->db->query($sql)->result();
	}
	public function input_data($data)
	{
		$this->db->insert('partisipasi', $data);
	}
	
	public function get_by($where)
	{
		$this->db->where('ID_PARTISIPASI', $where);
		return $this->db->get('partisipasi')->row();
	}

	public function update_data($where, $data)
	{
		$this->db->where($where);
		$this->db->update('partisipasi', $data);
	}

	public function delete_data($where)
	{
		$this->db->where('ID_PARTISIPASI', $where);
		$this->db->delete('partisipasi');
	}
}