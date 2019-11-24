<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Panel extends MY_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admin_model');
		
	}

	public function index()
	{
		$this->loggedin() == TRUE || redirect('admin/panel/login');
		$data['loggedin'] = $this->loggedin();

		$this->load->view('admin/panel/index');
	}

	public function login()
	{
		$data['loggedin'] = $this->loggedin();
		$this->loggedin() == FALSE || redirect('admin/panel');

		if($_POST)
		{
			$config = array(
				'required' => 'Pole %s jest wymagane',
				'valid_email' => 'Niepoprawny email',
			);

			$this->form_validation->set_message($config);

			if ($this->form_validation->run('panel_login') == TRUE)
			{
				

				$data = array(
					'email' => $this->input->post('email'),
					'password' => $this->input->post('password'),
				);
				$data['password'] = hash_salt($data['password']);

				// Sprawdzenie czy użytkownik istnieje w bazie
				$user = $this->admin_model->get('users', $data, TRUE);
				if( !empty($user) )
				{
					$data = array(
						'id' => $user->id,
						'name' => $user->name,
						'email' => $user->email,
						'loggedin' => TRUE,
					);

					$this->session->set_userdata($data);

					redirect('admin/panel');
				}
				else
				{
					echo 'Brak zgodności maila do hasła';
				}
				// redirect('admin/users');
			}
		}

		$this->load->view('admin/panel/login');
	}

}