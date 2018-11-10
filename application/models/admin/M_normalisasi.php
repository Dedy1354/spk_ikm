<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_normalisasi extends CI_Model {

	public function get_data() 
	{
		return $this->db->get('nilai_normalisasi')->result();
	}

	
	public function m_pendaftar()
	{
		$sql = "SELECT ID_PENDAFTAR,NAMA_PERUSAHAAN FROM pendaftaran_ikm ORDER BY NAMA_PERUSAHAAN asc";
		return $this->db->query($sql)->result();
	}
	public function input_data($data)
	{
		$this->db->insert('nilai_normalisasi', $data);
	}
	
	public function get_by($where)
	{
		$this->db->where('ID_NMT', $where);
		return $this->db->get('nilai_normalisasi')->row();
	}

	public function update_data($where, $data)
	{
		$this->db->where('ID_PENDAFTAR',$where);
		$this->db->update('nilai_normalisasi',$data);
	}

	

	public function delete_data($where)
	{
		$this->db->where('ID_NMT', $where);
		$this->db->delete('nilai_normalisasi');
	}

	
	public function delete_all(){
		$this->db->empty_table('nilai_normalisasi');
	}
}