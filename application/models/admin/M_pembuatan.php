<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pembuatan extends CI_Model {

	public function get_data() 
	{
		return $this->db->get('tahun_pembuatan_mesin')->result();
	}
	public function m_kriteria()
	{
		$sql = "SELECT ID_KRITERIA,NAMA_KRITERIA FROM kriteria ORDER BY NAMA_KRITERIA asc";
		return $this->db->query($sql)->result();
	}
	public function input_data($data)
	{
		$this->db->insert('tahun_pembuatan_mesin', $data);
	}
	
	public function get_by($where)
	{
		$this->db->where('ID_TAHUN_PEMBUATAN_MESIN', $where);
		return $this->db->get('tahun_pembuatan_mesin')->row();
	}

	public function update_data($where, $data)
	{
		$this->db->where($where);
		$this->db->update('tahun_pembuatan_mesin', $data);
	}

	public function delete_data($where)
	{
		$this->db->where('ID_TAHUN_PEMBUATAN_MESIN', $where);
		$this->db->delete('tahun_pembuatan_mesin');
	}
	
}