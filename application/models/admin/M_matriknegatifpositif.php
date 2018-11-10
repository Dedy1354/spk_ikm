<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_matriknegatifpositif extends CI_Model {

	public function get_data() 
	{
		return $this->db->get('matrix_positif_negatif')->result();
	}
	public function input_data($data){
		$this->db->insert('matrix_positif_negatif', $data);
	}

	public function get_data_by_id_kriteria($id_kriteria)
	{
		$this->db->where('ID_KRITERIA', $id_kriteria);
		return $this->db->get('matrix_positif_negatif')->row();
	}

	public function delete_all(){
		$this->db->empty_table('matrix_positif_negatif');
	}
	
}