<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{	
		$this->load->model('admin_model');
		$data['files'] = $this->admin_model->get_images();
		$this->load->view('site/gallery', $data);
	}

}