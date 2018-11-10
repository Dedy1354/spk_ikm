<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_public extends CI_Controller {

	
	public function index()
	{
		$this->load->view('public/v_public');
	}
}