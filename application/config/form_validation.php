<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$config = array(

	'update_config' => array(
	   	array(
			 'field'   => 'site_name', 
			 'label'   => 'Nazwa strony', 
			 'rules'   => 'trim|required'
		), 
	   	array(
			 'field'   => 'front_theme', 
			 'label'   => 'Szablon strony', 
			 'rules'   => 'trim|required'
		),
	   	array(
			 'field'   => 'back_theme', 
			 'label'   => 'Szablon panelu Admina', 
			 'rules'   => 'trim|required'
		),
	   	array(
			 'field'   => 'num_posts', 
			 'label'   => 'Ilość artykułów na stronie', 
			 'rules'   => 'trim|required|integer'
		),  
	   	array(
			 'field'   => 'num_gal', 
			 'label'   => 'Ilość kolumn w galerii', 
			 'rules'   => 'trim|required|integer'
		),
	),
	
	'users_create' => array(
	   	array(
			 'field'   => 'name', 
			 'label'   => 'Imię', 
			 'rules'   => 'trim|required'
		),
	   	array(
			 'field'   => 'email', 
			 'label'   => 'Email', 
			 'rules'   => 'trim|required|valid_email|is_unique[users.email]'
		),
	   	array(
			 'field'   => 'password', 
			 'label'   => 'Hasło', 
			 'rules'   => 'trim|required|matches[passconf]'
		),   
	   	array(
			 'field'   => 'passconf', 
			 'label'   => 'Potwierdzenie hasła', 
			 'rules'   => 'trim|required'
		),
	),

	'users_edit' => array(
	    array(
			 'field'   => 'name', 
			 'label'   => 'Imię', 
			 'rules'   => 'trim|required'
		),
	    array(
			 'field'   => 'email', 
			 'label'   => 'Email', 
			 'rules'   => 'trim|required|valid_email|callback__unique_email'
		),
	    array(
			 'field'   => 'password', 
			 'label'   => 'Hasło', 
			 'rules'   => 'trim|matches[passconf]'
		),   
	    array(
			 'field'   => 'passconf', 
			 'label'   => 'Potwierdzenie hasła', 
			 'rules'   => 'trim'
		),
	),

	'panel_login' => array(
	    array(
			 'field'   => 'email', 
			 'label'   => 'Email', 
			 'rules'   => 'trim|required|valid_email'
		),
	    array(
			 'field'   => 'password', 
			 'label'   => 'Hasło', 
			 'rules'   => 'trim|required'
		),   
	),

	'pages_create' => array(
	   	array(
			 'field'   => 'title', 
			 'label'   => 'Tytuł', 
			 'rules'   => 'trim|required'
		),
	   	array(
			 'field'   => 'alias', 
			 'label'   => 'Alias', 
			 'rules'   => 'trim|required|is_unique[pages.alias]'
		),
	   	array(
			 'field'   => 'content', 
			 'label'   => 'Treść', 
			 'rules'   => 'trim|required'
		),   
	),

	'pages_edit' => array(
	   	array(
			 'field'   => 'title', 
			 'label'   => 'Tytuł', 
			 'rules'   => 'trim|required'
		),
	   	array(
			 'field'   => 'alias', 
			 'label'   => 'Alias', 
			 'rules'   => 'trim|required|callback__unique_alias'
		),
	   	array(
			 'field'   => 'content', 
			 'label'   => 'Treść', 
			 'rules'   => 'trim|required'
		), 
	),

	'blog_create' => array(
	   	array(
			 'field'   => 'title', 
			 'label'   => 'Tytuł', 
			 'rules'   => 'trim|required'
		),
	   	array(
			 'field'   => 'alias', 
			 'label'   => 'Alias', 
			 'rules'   => 'trim|required|is_unique[blog.alias]'
		),
	   	array(
			 'field'   => 'date', 
			 'label'   => 'Data', 
			 'rules'   => 'trim|required'
		),
	   	array(
			 'field'   => 'content', 
			 'label'   => 'Treść', 
			 'rules'   => 'trim|required'
		),   
	),

	'blog_edit' => array(
	   	array(
			 'field'   => 'title', 
			 'label'   => 'Tytuł', 
			 'rules'   => 'trim|required'
		),
	   	array(
			 'field'   => 'alias', 
			 'label'   => 'Alias', 
			 'rules'   => '<trim></trim>'
		),
	   	array(
			 'field'   => 'date', 
			 'label'   => 'Data', 
			 'rules'   => 'trim|required'
		),
	   	array(
			 'field'   => 'content', 
			 'label'   => 'Treść', 
			 'rules'   => 'trim|required'
		),   
	),

	'comment_create' => array(
	   	array(
			 'field'   => 'name', 
			 'label'   => 'Imię', 
			 'rules'   => 'trim|required'
		),
	   	array(
			 'field'   => 'email', 
			 'label'   => 'Email', 
			 'rules'   => 'trim|required|valid_email'
		),
	   	array(
			 'field'   => 'content', 
			 'label'   => 'Treść', 
			 'rules'   => 'trim|required'
		),   
	),

	'comment_edit' => array(
	   	array(
			 'field'   => 'content', 
			 'label'   => 'Treść', 
			 'rules'   => 'trim|required'
		),   
	),
);