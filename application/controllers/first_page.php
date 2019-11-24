<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class First_Page extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('site/first_page');
	}


}