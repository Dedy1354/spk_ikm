<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class M_rangking extends CI_Model {

	public function get_data() 
	{
		$sql = "SELECT a.* , u.*  FROM `nilai_bobot_ternormalisasi` as a , pendaftaran_ikm as u  where a.ID_PENDAFTAR = u.ID_PENDAFTAR ORDER BY(a.V) DESC
";
		return $this->db->query($sql)->result();
	}
	
}