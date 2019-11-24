<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Article extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('site_model');
	}

	public function display_article($alias)
	{	
		$this->site_model->count_views($alias);

		$where = array('alias' => $alias);
		$data['article'] = $this->site_model->get('blog', $where, TRUE);

		$article_id = $data['article']->id;
		$where = array('article_id' => $article_id);
		$data['comments'] = $this->site_model->get('comments', $where);

		if($_POST)
		{
			$this->_add_comment($alias);
		}

		$this->load->view('site/article', $data);
	}

	function _add_comment($alias)
	{
		$config = array(
			'required' => 'Pole %s jest wymagane',
		);

		$this->form_validation->set_message($config);

		if ($this->form_validation->run('comment_create') == TRUE)
		{
			
			$data = array(
				'article_id' => $this->input->post('article_id'),
				'name' => $this->input->post('name'),
				'email' => $this->input->post('email'),
				'date' => $this->input->post('date'),
				'content' => $this->input->post('content'),
			);

			$this->site_model->create('comments', $data);

			redirect('article/' . $alias);
		}
	}
}