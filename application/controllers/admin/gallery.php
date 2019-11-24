<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Gallery extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->loggedin() == TRUE || redirect('admin/panel/login');
	}

	public function index()
	{	
		if( $this->input->post('upload') )
		{
			$this->admin_model->do_upload();
		}

		$data['files'] = $this->admin_model->get_images();

		$this->load->view('admin/gallery', $data);
	}

	public function del_image()
	{	
		if($_POST)
		{
			$file = $this->input->post('file_name');
			unlink(BASEPATH . '../images/' . $file);
			unlink(BASEPATH . '../images/thumbs/' . $file);
			redirect('admin/gallery');
		}
	}

}