<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_ketersediaan extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('admin/M_kode');
		$this->load->model('admin/M_ketersediaan');

		if ($this->session->userdata("LEVEL")!='Admin') {
			redirect("C_login");
		}
	}

	public function index() {

		$data ["daftar_ketersediaan_mesin"] = $this->M_ketersediaan->get_data();

		$this->load->view('admin/data_master/ketersediaan_mesin/v_mesin', $data);
	}
	
	public function tambah_data_ketersediaan_mesin()
	{
		$table = 'ketersediaan_mesin';
        $id = "ID_KETERSEDIAAN_MESIN";
        $kode = "1";
        $karakter = "ket-";

        $data['tampil_kriteria'] = $this->M_ketersediaan->m_kriteria();
        $data['kodeunik'] = $this->M_kode->m_kodeunik($id, $table, $kode, $karakter);
		$this->load->view('admin/data_master/ketersediaan_mesin/v_tambah_mesin', $data);
	}
	
	public function proses_tambah_data_ketersediaan_mesin()
	{
		$data_post['ID_KETERSEDIAAN_MESIN']= $this->input->post('id_ketersediaan_mesin');
		$data_post['ID_KRITERIA']= $this->input->post('id_kriteria');
		$data_post['JENJANG_KETERSEDIAAN_MESIN']= $this->input->post('jenjang_ketersediaan_mesin');
		$data_post['BOBOT_KETERSEDIAAN_MESIN']= $this->input->post('bobot_ketersediaan_mesin');
			
		$this->M_ketersediaan->input_data($data_post);

		/* Redirect */
		redirect('admin/C_ketersediaan/index');
	}
 
	public function edit_data_ketersediaan_mesin($ID_KETERSEDIAAN_MESIN)
	{
		/* Setting where */
		$where["ID_KETERSEDIAAN_MESIN"] = $ID_KETERSEDIAAN_MESIN;

		$data['ketersediaan_mesin'] = $this->M_ketersediaan->get_by($ID_KETERSEDIAAN_MESIN);

		$this->load->view('admin/data_master/ketersediaan_mesin/v_form_edit_mesin', $data);
	}

	public function proses_edit_data_ketersediaan_mesin()
	{
		$data_post['ID_KRITERIA']= $this->input->post('id_kriteria');
		$data_post['JENJANG_KETERSEDIAAN_MESIN']= $this->input->post('jenjang_ketersediaan_mesin');
		$data_post['BOBOT_KETERSEDIAAN_MESIN']= $this->input->post('bobot_ketersediaan_mesin');
		
		$where['ID_KETERSEDIAAN_MESIN'] = $this->input->post('id_ketersediaan_mesin');

		$this->M_ketersediaan->update_data($where,$data_post);	

		redirect('admin/C_ketersediaan/index');
	}

	public function hapus_data_ketersediaan_mesin($ID_KETERSEDIAAN_MESIN)
	{
		$this->M_ketersediaan->delete_data($ID_KETERSEDIAAN_MESIN);
		
		redirect('admin/C_ketersediaan/index');
	}

}