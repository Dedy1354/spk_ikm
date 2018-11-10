<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_solusi_ideal_positif_negatif extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('admin/M_solusi_ideal_positif_negatif');

		if ($this->session->userdata("LEVEL")!='Admin') {
			redirect("C_login");
		}
	}

	public function index() {

		$data ["daftar_solusi"] = $this->M_solusi_ideal_positif_negatif->get_data();

		$this->load->view('admin/data_pendaftar/bobot_ternormalisasi/v_solusi_ideal_positif_negatif', $data);
	}
	
	
}