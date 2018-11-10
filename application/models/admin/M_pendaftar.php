<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_pendaftar extends CI_Model {

	public function get_data() 
	{
		return $this->db->get('pendaftaran_ikm')->result();
	}

	public function input_data($data)
	{
		$this->db->insert('pendaftaran_ikm', $data);
	}
	public function get_by($where)
	{
		$this->db->where('ID_PENDAFTAR', $where);
		return $this->db->get('pendaftaran_ikm')->row();
	}

	public function update_data($where, $data)
	{
		$this->db->where($where);
		$this->db->update('pendaftaran_ikm', $data);
	}

	public function delete_data($where)
	{
		$this->db->where('ID_PENDAFTAR', $where);
		$this->db->delete('pendaftaran_ikm');
	}
}