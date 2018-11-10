<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_pembuatan extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('admin/M_kode');
		$this->load->model('admin/M_pembuatan');

		if ($this->session->userdata("LEVEL")!='Admin') {
			redirect("C_login");
		}
	}

	public function index() {

		$data ["daftar_pembuatan"] = $this->M_pembuatan->get_data();

		$this->load->view('admin/data_master/tahun_pembuatan/v_mesin', $data);
	}
	
	public function tambah_data_pembuatan()
	{
		$table = 'tahun_pembuatan_mesin';
        $id = "ID_TAHUN_PEMBUATAN_MESIN";
        $kode = "1";
        $karakter = "pem-";

        $data['tampil_kriteria'] = $this->M_pembuatan->m_kriteria();
        $data['kodeunik'] = $this->M_kode->m_kodeunik($id, $table, $kode, $karakter);
		$this->load->view('admin/data_master/tahun_pembuatan/v_tambah_mesin', $data);
	}
	
	public function proses_tambah_data_pembuatan()
	{
		$data_post['ID_TAHUN_PEMBUATAN_MESIN']= $this->input->post('id_tahun_pembuata_mesin');
		$data_post['ID_KRITERIA']= $this->input->post('id_kriteria');
		$data_post['JENJANG_TAHUN_PEMBUATAN_MESIN']= $this->input->post('jenjang_tahun_pembuatan_mesin');
		$data_post['BOBOT_TAHUN_PEMBUATAN_MESIN']= $this->input->post('bobot_tahun_pembuatan_mesin');
			
		$this->M_pembuatan->input_data($data_post);

		/* Redirect */
		redirect('admin/C_pembuatan/index');
	}
 
	public function edit_data_pembuatan($ID_TAHUN_PEMBUATAN_MESIN)
	{
		/* Setting where */
		$where["ID_TAHUN_PEMBUATAN_MESIN"] = $ID_TAHUN_PEMBUATAN_MESIN;

		$data['tahun_pembuatan_mesin'] = $this->M_pembuatan->get_by($ID_TAHUN_PEMBUATAN_MESIN);

		$this->load->view('admin/data_master/tahun_pembuatan/v_form_edit_mesin', $data);
	}

	public function proses_edit_data_pembuatan()
	{
		$data_post['ID_KRITERIA']= $this->input->post('id_kriteria');
		$data_post['JENJANG_TAHUN_PEMBUATAN_MESIN']= $this->input->post('jenjang_tahun_pembuatan_mesin');
		$data_post['BOBOT_TAHUN_PEMBUATAN_MESIN']= $this->input->post('bobot_tahun_pembuatan_mesin');
		
		$where['ID_TAHUN_PEMBUATAN_MESIN'] = $this->input->post('id_tahun_pembuatan_mesin');

		$this->M_pembuatan->update_data($where,$data_post);	

		redirect('admin/C_pembuatan/index');
	}

	public function hapus_data_pembuatan($ID_TAHUN_PEMBUATAN_MESIN)
	{
		$this->M_pembuatan->delete_data($ID_TAHUN_PEMBUATAN_MESIN);
		
		redirect('admin/C_pembuatan/index');
	}

}