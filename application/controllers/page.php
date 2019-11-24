<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Page extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('site_model');
	}

	public function display_page($alias)
	{	
		$where = array('alias' => $alias);
		$data['page'] = $this->site_model->get('pages', $where, TRUE);

		$this->load->view('site/page', $data);
	}

}
/* End of file page.php */
/* Location: ./application/controllers/page.php */
