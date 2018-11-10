<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home_user extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		//Do your magic here
		if ($this->session->userdata("LEVEL")!='User') {
			redirect("C_login");
		}
	}
	public function index() {
		$this->load->view('/public/v_home_user');

	}
}