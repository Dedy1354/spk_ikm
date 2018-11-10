<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_solusi_ideal_positif_negatif extends CI_Model {

	public function get_data() 
	{
		return $this->db->get('matrix_positif_negatif')->result();
	}
	
}