<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Pages extends My_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		$this->loggedin() == TRUE || redirect('admin/panel/login');
	}

	public function page_list()
	{
		$data['pages'] = $this->admin_model->get('pages', FALSE, FALSE, 'order', 'asc');
		$this->load->view('admin/pages/page_list', $data);
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

			if ($this->form_validation->run('pages_create') == TRUE)
			{
				

				$data = array(
					'title' => $this->input->post('title'),
					'alias' => alias($this->input->post('alias')),
					'content' => $this->input->post('content'),
				);

				$this->admin_model->create('pages', $data);

				redirect('admin/pages/page_list');
			}

		}

		$this->load->view('admin/pages/page_create');
	}

	public function edit()
	{
		$id = $this->uri->segment(4);
		$where = array('id' => $id);
		$data['page'] = $this->admin_model->get('pages', $where, TRUE);
		$id = $data['page']->id;

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

			if ($this->form_validation->run('pages_edit') == TRUE)
			{

				$data = array(
					'title' => $this->input->post('title'),
					'alias' => alias($this->input->post('alias')),
					'content' => $this->input->post('content'),
				);

				$where = array('id' => $id);
				$this->admin_model->update('pages', $where, $data);

				redirect('admin/pages/page_list');
			}


		}
		$this->load->view('admin/pages/page_edit', $data);
	}

	public function delete()
	{
		$id = $this->uri->segment(4);
		$where = array('id' => $id);
		$this->admin_model->delete('pages', $where);
		redirect('admin/pages/page_list');
	}

	public function ajax()
	{
		$items = $this->input->post('items');
		foreach($items as $order => $id)
		{
			echo $id . ' jest ' . $order . '<br>';

			$where = array('id' => $id);
			$data = array('order' => $order);
			$this->admin_model->update('pages', $where, $data);
		}
	}

	function _unique_alias()
	{
		$id = $this->uri->segment(4);
		$alias = $this->input->post('alias');

		$where = array('alias' => $alias);
		$this->admin_model->unique($id, $where);

		if( $this->admin_model->get('pages') )
		{
			$this->form_validation->set_message('_unique_alias', 'Alias jest już w użyciu');
			return FALSE;
		}

		return TRUE;
	}
}