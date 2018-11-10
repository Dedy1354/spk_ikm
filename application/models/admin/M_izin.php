<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_izin extends CI_Model {

	public function get_data() 
	{
		return $this->db->get('izin_industri')->result();
	}
	public function m_kriteria()
	{
		$sql = "SELECT ID_KRITERIA,NAMA_KRITERIA FROM kriteria ORDER BY NAMA_KRITERIA asc";
		return $this->db->query($sql)->result();
	}
	public function input_data($data)
	{
		$this->db->insert('izin_industri', $data);
	}
	
	public function get_by($where)
	{
		$this->db->where('ID_IZIN_INDUSTRI', $where);
		return $this->db->get('izin_industri')->row();
	}

	public function update_data($where, $data)
	{
		$this->db->where($where);
		$this->db->update('izin_industri', $data);
	}

	public function delete_data($where)
	{
		$this->db->where('ID_IZIN_INDUSTRI', $where);
		$this->db->delete('izin_industri');
	}
	public function ambil_izin($BOBOT_IZIN_INDUSTRI)
	{
		$sql = "SELECT JENJANG_IZIN_INDUSTRI FROM izin_industri ";
		return $this->db->query(sql)->row;
	}
}