<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_sertifikat extends CI_Model {

	public function get_data() 
	{
		return $this->db->get('sertifikat_sni')->result();
	}
	public function m_kriteria()
	{
		$sql = "SELECT ID_KRITERIA,NAMA_KRITERIA FROM kriteria ORDER BY NAMA_KRITERIA asc";
		return $this->db->query($sql)->result();
	}
	public function input_data($data)
	{
		$this->db->insert('sertifikat_sni', $data);
	}
	
	public function get_by($where)
	{
		$this->db->where('ID_SERTIFIKAT_SNI', $where);
		return $this->db->get('sertifikat_sni')->row();
	}

	public function update_data($where, $data)
	{
		$this->db->where($where);
		$this->db->update('sertifikat_sni', $data);
	}

	public function delete_data($where)
	{
		$this->db->where('ID_SERTIFIKAT_SNI', $where);
		$this->db->delete('sertifikat_sni');
	}
}