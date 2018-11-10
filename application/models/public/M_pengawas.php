<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pengawas extends CI_Model {

	public function get_data() 
	{
		return $this->db->get('penilaian')->result();
	}

	public function input_data($data)
	{
		$this->db->insert('penilaian', $data);
	}
	public function m_keluarga()
	{
		$sql = "SELECT ID_KELUARGA, NAMA_KEPALAKELUARGA FROM keluarga ORDER BY NAMA_KEPALAKELUARGA DESC";
		return $this->db->query($sql)->result();
	}
	public function m_kriteria()
	{
		$sql = "SELECT ID_KRITERIA, NAMA_KRITERIA FROM kriteria ORDER BY NAMA_KRITERIA DESC";
		return $this->db->query($sql)->result();
	}
	public function m_subkriteria()
	{
		$sql = "SELECT ID_SUBKRITERIA, NAMA_SUBKRITERIA FROM subkriteria ORDER BY NAMA_SUBKRITERIA DESC";
		return $this->db->query($sql)->result();
	}
	public function pilih_kriteria($id_kriteria = null)
	{
		$sql = "SELECT ID_KRITERIA, BOBOT_KRITERIA FROM kriteria";
		return $this->db->query($sql)->result();
	}
	public function pilih_subkriteria($id_subkriteria )
	{
		$sql = "SELECT ID_SUBKRITERIA, NAMA_SUBKRITERIA FROM subkriteria";
		return $this->db->query($sql)->result();
	}
	public function get_by($where)
	{
		$this->db->where('ID_PENILAIAN', $where);
		return $this->db->get('penilaian')->row();
	}

	public function update_data($where, $data)
	{
		$this->db->where($where);
		$this->db->update('penilaian', $data);
	}

	public function delete_data($where)
	{
		$this->db->where('ID_PENILAIAN', $where);
		$this->db->delete('penilaian');
	}
}