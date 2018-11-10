<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_nilaidata extends CI_Model {

	public function get_data() 
	{
		return $this->db->get('nilai_data')->result();
	}
	public function joinData(){
		$this->db->select('*');
		$this->db->from('nilai_data');
		$this->db->join('pendaftaran_ikm', 'nilai_data.ID_PENDAFTAR=pendaftaran_ikm.ID_PENDAFTAR','right');
		return $this->db->get()->result();
	}
	public function update_status($id_pendaftar, $status){
		$this->db->set('STATUS', $status);
		$this->db->where('ID_PENDAFTAR', $id_pendaftar);
		$this->db->update('nilai_data');
	}
	public function get_data_by_status($where) 
	{	
		$this->db->where('STATUS',$where);
		return $this->db->get('nilai_data')->result();
	}
	public function m_pendaftar()
	{
		$sql = "SELECT ID_PENDAFTAR,NAMA_PERUSAHAAN FROM pendaftaran_ikm ORDER BY NAMA_PERUSAHAAN asc";
		return $this->db->query($sql)->result();
	}
	public function input_data($data)
	{
		$this->db->insert('nilai_data', $data);
	}
	public function ambil_nilai_investasi($id_pendaftar)
	{
		$sql = "SELECT NILAI_INVESTASI FROM pendaftaran_ikm where ID_PENDAFTAR='$id_pendaftar'";
		return $this->db->query($sql)->row();
	}
	public function ambil_nilai_sdm($id_pendaftar)
	{
		$sql = "SELECT JUMLAH_TENAGA_KERJA FROM pendaftaran_ikm where ID_PENDAFTAR='$id_pendaftar'";
		return $this->db->query($sql)->row();
	}
	public function ambil_nilai_badanusaha($id_pendaftar)
	{
		$sql = "SELECT JENIZ_BADAN_USAHA FROM pendaftaran_ikm where ID_PENDAFTAR='$id_pendaftar'";
		return $this->db->query($sql)->row();
	}
	public function ambil_nilai_izin($id_pendaftar)
	{
		$sql = "SELECT IJIN_USAHA_INDUSTRI FROM pendaftaran_ikm where ID_PENDAFTAR='$id_pendaftar'";
		return $this->db->query($sql)->row();
	}
	public function ambil_nilai_sertifikat($id_pendaftar)
	{
		$sql = "SELECT NOMOR_SNI FROM pendaftaran_ikm where ID_PENDAFTAR='$id_pendaftar'";
		return $this->db->query($sql)->row();
	}
	public function ambil_nilai_partisipasi($id_pendaftar)
	{
		$sql = "SELECT JUMLAH_KEIKUTSERTAAN_DALAM_PROGRAM FROM pendaftaran_ikm where ID_PENDAFTAR='$id_pendaftar'";
		return $this->db->query($sql)->row();
	}
	public function ambil_nilai_ketersediaan($id_pendaftar)
	{
		$sql = "SELECT ADANYA_MESIN FROM pendaftaran_ikm where ID_PENDAFTAR='$id_pendaftar'";
		return $this->db->query($sql)->row();
	}
	public function ambil_nilai_kondisi($id_pendaftar)
	{
		$sql = "SELECT KEADAAN_MESIN FROM pendaftaran_ikm where ID_PENDAFTAR='$id_pendaftar'";
		return $this->db->query($sql)->row();
	}
	public function ambil_nilai_pembuatan($id_pendaftar)
	{
		$sql = "SELECT TAUN_PEMBUATAN_MESIN FROM pendaftaran_ikm where ID_PENDAFTAR='$id_pendaftar'";
		return $this->db->query($sql)->row();
	}

	public function get_by($where)
	{
		$this->db->where('ID_ND', $where);
		return $this->db->get('nilai_data')->row();
	}

	public function update_data($where, $data)
	{
		$this->db->where('ID_PENDAFTAR',$where);
		$this->db->update('nilai_data', $data);
	}

	public function delete_data($where)
	{
		$this->db->where('ID_ND', $where);
		$this->db->delete('nilai_data');
	}

	public function delete_all(){
		$this->db->delete('nilai_data');
	}
}