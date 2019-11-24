<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Config extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
	}

	public function index()
	{
		if($_POST)
		{
			$config = array(
				'required' => 'Pole %s jest wymagane',
				'integer' => 'Pole %s musi być liczbą',
			);

			$this->form_validation->set_message($config);

			if ($this->form_validation->run('update_config') == TRUE)
			{
				// Jeśli walidacja zadziałała

				$data = array(
					array(
						'option' => 'site_name',
						'value' => $this->input->post('site_name'),
					),
					array(
						'option' => 'front_theme',
						'value' => $this->input->post('front_theme'),
					),
					array(
						'option' => 'back_theme',
						'value' => $this->input->post('back_theme'),
					),
					array(
						'option' => 'num_posts',
						'value' => $this->input->post('num_posts'),
					),
					array(
						'option' => 'num_gal',
						'value' => $this->input->post('num_gal'),
					),
				);

				$this->admin_model->update_batch('config', $data, 'option');

				redirect('admin/config');
			}
		}

		$this->load->view('admin/config');
	}
}