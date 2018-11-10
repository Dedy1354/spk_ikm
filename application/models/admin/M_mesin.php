<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_mesin extends CI_Model {

	public function get_data() 
	{
		return $this->db->get('kondisi_mesin')->result();
	}
	public function m_kriteria()
	{
		$sql = "SELECT ID_KRITERIA,NAMA_KRITERIA FROM kriteria ORDER BY NAMA_KRITERIA asc";
		return $this->db->query($sql)->result();
	}
	public function input_data($data)
	{
		$this->db->insert('kondisi_mesin', $data);
	}
	
	public function get_by($where)
	{
		$this->db->where('ID_KONDISI_MESIN', $where);
		return $this->db->get('kondisi_mesin')->row();
	}

	public function update_data($where, $data)
	{
		$this->db->where($where);
		$this->db->update('kondisi_mesin', $data);
	}

	public function delete_data($where)
	{
		$this->db->where('ID_KONDISI_MESIN', $where);
		$this->db->delete('kondisi_mesin');
	}
	
}