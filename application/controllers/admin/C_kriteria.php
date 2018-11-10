<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_kriteria extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('admin/M_kode');
		$this->load->model('admin/M_kriteria');

		if ($this->session->userdata("LEVEL")!='Admin') {
			redirect("C_login");
		}
	}

	public function index() {
		/* Ambil Data */
		$data ["daftar_kriteria"] = $this->M_kriteria->get_data();

		/* Load View */
		$this->load->view('admin/data_master/kriteria/v_kriteria', $data);
	}
	
	public function tambah_data_kriteria()
	{
		$table = 'kriteria';
        $id = "ID_KRITERIA";
        $kode = "1";
        $karakter = "kri-";

        
        $data['kodeunik'] = $this->M_kode->m_kodeunik($id, $table, $kode, $karakter);
		$this->load->view('admin/data_master/kriteria/v_tambah_kriteria', $data);
	}
	
	public function proses_tambah_data_kriteria()
	{
		/* Tangkap Post */
		$data_post['ID_KRITERIA']= $this->input->post('id_kriteria');
		$data_post['NAMA_KRITERIA']= $this->input->post('nama_kriteria');
		$data_post['BOBOT_KRITERIA']= $this->input->post('bobot_kriteria');
		$data_post['TIPE_KRITERIA']= $this->input->post('tipe_kriteria');
		$data_post['KETERANGAN_KRITERIA']= $this->input->post('keterangan_kriteria');
		
		/* Masukkan Database */
		$this->M_kriteria->input_data($data_post);

		/* Redirect */
		redirect('admin/C_kriteria/index');
	}

	public function edit_data_kriteria($ID_KRITERIA)
	{
		/* Setting where */
		$where["ID_KRITERIA"] = $ID_KRITERIA;

		$data['kriteria'] = $this->M_kriteria->get_by($ID_KRITERIA);

		$this->load->view('admin/data_master/kriteria/v_form_edit_kriteria', $data);
	}

	public function proses_edit_data_kriteria()
	{
		
		$data_post['NAMA_KRITERIA']= $this->input->post('nama_kriteria');
		$data_post['BOBOT_KRITERIA']= $this->input->post('bobot_kriteria');
		$data_post['TIPE_KRITERIA']= $this->input->post('tipe_kriteria');
		$data_post['KETERANGAN_KRITERIA']= $this->input->post('keterangan_kriteria');
		
		$where['ID_KRITERIA'] = $this->input->post('id_kriteria');

		$this->M_kriteria->update_data($where,$data_post);	

		redirect('admin/C_kriteria/index');
	}

	public function hapus_data_kriteria($ID_KRITERIA)
	{
		$this->M_kriteria->delete_data($ID_KRITERIA);
		
		redirect('admin/C_kriteria/index');
	}
}