<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Blog extends MY_Controller
{

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->loggedin() == TRUE || redirect('admin/panel/login');
	}

	public function article_list()
	{
		$data['blog'] = $this->admin_model->get('blog', FALSE, FALSE, 'date', 'asc');
		$this->load->view('admin/blog/article_list', $data);
	}

	public function create()
	{
		if(!empty($_POST))
		{
			$config = array(
				'required' => 'Pole %s jest wymagane',
				'is_unique' => 'Inna strona ma już taki alias',
			);

			$this->form_validation->set_message($config);

			if ( $this->input->post('alias') == '' )
			{
				$_POST['alias'] = alias($this->input->post('title'));
			}

			if ($this->form_validation->run('blog_create') == TRUE)
			{

				$data = array(
					'title' => $this->input->post('title'),
					'alias' => alias($this->input->post('alias')),
					'date' => $this->input->post('date'),
					'content' => $this->input->post('content'),
				);

				$this->admin_model->create('blog', $data);

				redirect('admin/blog/article_list');
			}

		}
		$this->load->view('admin/blog/article_create');
	}
	public function edit()
	{
		$id = $this->uri->segment(4);
		$where = array('id' => $id);
		$data['article'] = $this->admin_model->get('blog', $where, TRUE);
		$id = $data['article']->id;

		if(!empty($_POST))
		{
			$config = array(
				'required' => 'Pole %s jest wymagane',
			);

			$this->form_validation->set_message($config);

			if ( $this->input->post('alias') == '' )
			{
				$_POST['alias'] = alias($this->input->post('title'));
			}

			if ($this->form_validation->run('blog_edit') == TRUE)
			{

				$data = array(
					'title' => $this->input->post('title'),
					'alias' => alias($this->input->post('alias')),
					'date' => $this->input->post('date'),
					'content' => $this->input->post('content'),
				);

				$where = array('id' => $id);
				$this->admin_model->update('blog', $where, $data);

				redirect('admin/blog/article_list');
			}

		}
		$this->load->view('admin/blog/article_edit', $data);
	}
	public function delete()
	{
		$id = $this->uri->segment(4);
		$where = array('id' => $id);
		$this->admin_model->delete('blog', $where);
		redirect('admin/blog/article_list');
	}

	function _unique_alias()
	{
		$id = $this->uri->segment(4);
		$alias = $this->input->post('alias');

		$where = array('alias' => $alias);
		$this->admin_model->unique($id, $where);

		if( $this->admin_model->get('blog') )
		{
			$this->form_validation->set_message('_unique_alias', 'Alias jest już w użyciu');
			return FALSE;
		}

		return TRUE;
	}

}