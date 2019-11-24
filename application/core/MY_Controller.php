<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class MY_Controller extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('site_model');
		$data['loggedin'] = $this->loggedin();
		$data['pages'] = $this->site_model->get('pages', FALSE, FALSE, 'order', 'asc');
		$this->load->vars($data);
	}

	public function loggedin()
	{
		return $this->session->userdata('loggedin');
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect('admin/panel/login');
	}
}