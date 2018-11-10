<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_rangking extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('admin/M_rangking');

		if ($this->session->userdata("LEVEL")!='Admin') {
			redirect("C_login");
		}	}

	public function index() {

		$data ["daftar_rangking"] = $this->M_rangking->get_data();

		$this->load->view('admin/data_pendaftar/rangking/v_rangking', $data);
	}
	function export_excel_nilai_akhir() {
        $data ["daftar_rangking"] = $this->M_rangking->get_data();
		$this->load->view('admin/data_pendaftar/rangking/export_excel_nilai_akhir', $data);
    }
}