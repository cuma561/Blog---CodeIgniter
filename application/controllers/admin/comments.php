<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Comments extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->loggedin() == TRUE || redirect('admin/panel/login');
	}

	public function comments_list()
	{
		$data['comments'] = $this->admin_model->get('comments', FALSE, FALSE, 'date', 'asc');
		$this->load->view('admin/comments/comments_list', $data);
	}

	public function edit()
	{
		$id = $this->uri->segment(4);
		$where = array('id' => $id);
		$data['comment'] = $this->admin_model->get('comments', $where, TRUE);

		if(!empty($_POST))
		{
			$config = array(
				'required' => 'Pole %s jest wymagane',
			);

			$this->form_validation->set_message($config);

			if ($this->form_validation->run('comment_edit') == TRUE)
			{
				$data = array(
					'content' => $this->input->post('content'),
				);

				$where = array('id' => $id);
				$this->admin_model->update('comments', $where, $data);

				redirect('admin/comments/comments_list');
			}
		}
		
		$this->load->view('admin/comments/comments_edit', $data);
	}

	public function delete()
	{
		$id = $this->uri->segment(4);
		$where = array('id' => $id);
		$this->admin_model->delete('comments', $where);
		redirect('admin/comments/comments_list');
	}
}