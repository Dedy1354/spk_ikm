<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_ketersediaan extends CI_Model {

	public function get_data() 
	{
		return $this->db->get('ketersediaan_mesin')->result();
	}
	public function m_kriteria()
	{
		$sql = "SELECT ID_KRITERIA,NAMA_KRITERIA FROM kriteria ORDER BY NAMA_KRITERIA asc";
		return $this->db->query($sql)->result();
	}
	public function input_data($data)
	{
		$this->db->insert('ketersediaan_mesin', $data);
	}
	
	public function get_by($where)
	{
		$this->db->where('ID_KETERSEDIAAN_MESIN', $where);
		return $this->db->get('ketersediaan_mesin')->row();
	}

	public function update_data($where, $data)
	{
		$this->db->where($where);
		$this->db->update('ketersediaan_mesin', $data);
	}

	public function delete_data($where)
	{
		$this->db->where('ID_KETERSEDIAAN_MESIN', $where);
		$this->db->delete('ketersediaan_mesin');
	}
	
}