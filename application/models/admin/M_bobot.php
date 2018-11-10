<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_bobot extends CI_Model {

	public function get_data() 
	{
		return $this->db->get('nilai_bobot_ternormalisasi')->result();
	}
	public function m_pendaftar()
	{
		$sql = "SELECT ID_PENDAFTAR,NAMA_PERUSAHAAN FROM pendaftaran_ikm ORDER BY NAMA_PERUSAHAAN asc";
		return $this->db->query($sql)->result();
	}
	public function input_data($data)
	{
		$this->db->insert('nilai_bobot_ternormalisasi', $data);
	}
	
	public function get_by($where)
	{
		$this->db->where('ID_NBT', $where);
		return $this->db->get('nilai_bobot_ternormalisasi')->row();
	}

	public function update_data($where, $data)
	{
		$this->db->where($where);
		$this->db->update('nilai_bobot_ternormalisasi', $data);
	}

	public function delete_data($where)
	{
		$this->db->where('ID_NBT', $where);
		$this->db->delete('nilai_bobot_ternormalisasi');
	}
}