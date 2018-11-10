<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_user extends CI_Controller {   

	function __construct() {
		parent::__construct();
		$this->load->model('admin/M_user');

		if ($this->session->userdata("LEVEL")!='Admin') {
			redirect("C_login");
		}
	}

	public function index() { 
		/* Ambil Data */
		$data ["daftar_user"] = $this->M_user->get_data();

		/* Load View */
		$this->load->view('admin/data_master/user/v_user', $data);
	}

	public function tambah_data_user()
	{
        $this->load->view('admin/data_master/user/v_tambah_user' );
	}
	
	public function proses_tambah_data_user()
	{
		/* Tangkap Post */
		
		$data['ID_USER']= $this->input->post('id_user');
		$data['NAMA_USER']= $this->input->post('nama_user');
		$data['USER_NAME']= $this->input->post('user_name');
		$data['PASSWORD']= $this->input->post('password');
		$data['JENIS_KELAMIN']= $this->input->post('jenis_kelamin');
		$data['LEVEL']= $_POST['level'];
		
		/* Masukkan Database */
		$this->M_user->input_data($data);

		/* Redirect */
		redirect('admin/C_user/index');
	} 

	public function edit_data_user($USER_NAME)
	{
		
		/* Setting where */
		$where["USER_NAME"] = $USER_NAME;

		$data['user'] = $this->M_user->get_by($where)->row();

		$this->load->view('admin/data_master/user/v_form_edit_user', $data);
	}

	public function proses_edit_data_user()
	{
		
		$data['USER_NAME']= $this->input->post('user_name');
		$data['PASSWORD']= $this->input->post('password');
		$data['LEVEL']= $_POST['level'];

		/* Where Update */
		$where["USER_NAME"] = $this->input->post("user_name");


		$this->M_user->update_data($where,$data);

		redirect('admin/C_user/index');
	}

	public function hapus_data_user($USER_NAME)
	{
		$this->M_user->delete_data($USER_NAME);

		redirect('admin/C_user/index');
	}
}