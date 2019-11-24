<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');

		//$this->loggedin() == TRUE || redirect('admin/panel/login');
	}

	public function user_list()
	{
		$data['users'] = $this->admin_model->get('users');
		$this->load->view('admin/users/user_list', $data);
	}

	public function create()
	{
		if(!empty($_POST))
		{
			$config = array(
				'required' => 'Pole %s jest wymagane',
				'valid_email' => 'Niepoprawny email',
				'matches' => 'Hasła nie są identyczne',
				'is_unique' => 'Użytkownik z takim adresem e-mail już istnieje',
			);

			$this->form_validation->set_message($config);

			if ($this->form_validation->run('users_create') == TRUE)
			{

				$data = array(
					'name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'password' => $this->input->post('password'),
				);

				$data['password'] = hash_salt($data['password']);

				$this->admin_model->create('users', $data);

				redirect('admin/users/user_list');
			}

		}


		$this->load->view('admin/users/user_create');
	}

	public function edit()
	{
		$id = $this->uri->segment(4);
		$where = array('id' => $id);
		$data['user'] = $this->admin_model->get('users', $where, TRUE);
		$id = $data['user']->id;


		if(!empty($_POST))
		{
			$config = array(
				'required' => 'Pole %s jest wymagane',
				'valid_email' => 'Niepoprawny email',
				'matches' => 'Hasła nie są identyczne',
			);

			$this->form_validation->set_message($config);
			

			if ($this->form_validation->run('users_edit') == TRUE)
			{


				$data = array(
					'name' => $this->input->post('name'),
					'email' => $this->input->post('email'),
					'password' => $this->input->post('password'),
				);

				$data['password'] = hash_salt($data['password']);

				if ( $this->input->post('password') == '' )
				{
					$data['password'] = $data['user']->password;
				}

				$where = array('id' => $id);
				$this->admin_model->update('users', $where, $data);

				redirect('admin/users/user_list');
			}


		}
		$this->load->view('admin/users/user_edit', $data);

	}

	public function delete()
	{
		$id = $this->uri->segment(4);
		$where = array('id' => $id);
		$this->admin_model->delete('users', $where);
		redirect('admin/users/user_list');
	}

	function _unique_email()
	{
		$id = $this->uri->segment(4);
		$email = $this->input->post('email');

		$where = array('email' => $email);
		$this->admin_model->unique($id, $where);

		if( $this->admin_model->get('users') )
		{
			$this->form_validation->set_message('_unique_email', 'Inny użytkownik ma już taki adres e-mail');
			return FALSE;
		}

		return TRUE;
	}

}

/* End of file users.php */
/* Location: ./application/controllers/users.php */