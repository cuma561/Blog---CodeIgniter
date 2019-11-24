<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class Blog extends My_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->load->model('site_model');
	}

	public function index()
	{
		$this->load->library('pagination');
		$config['base_url'] = base_url() . 'blog/index';
		$config['total_rows'] = $this->site_model->count_results('blog');
		$config['per_page'] = config('num_posts');

		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';

		$config['first_link'] = '&laquo;';
		$config['first_tag_open'] = '<li>';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = '&raquo;';
		$config['last_tag_open'] = '<li>';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = '&gt;';
		$config['next_tag_open'] = '<li>';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&lt;';
		$config['prev_tag_open'] = '<li>';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="active"><a href="#">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li>';
		$config['num_tag_close'] = '</li>';

		$this->pagination->initialize($config); 
		$data['pagination'] = $this->pagination->create_links();

		$this->site_model->limit_results($config['per_page'], $this->uri->segment(3));
		$data['blog'] = $this->site_model->get('blog', FALSE, FALSE, 'date', 'desc');

		$this->load->view('site/blog', $data);
	}
}