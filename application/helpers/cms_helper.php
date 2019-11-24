<?php

function hash_salt($string)
{
	return hash('sha512', $string . config_item('encryption_key'));
}

function alias($string)
{
	$string = convert_accented_characters($string);
	$string = url_title($string, '-', TRUE);
	return $string;
}

function excerpt($string, $q)
{	
	$pattern = '#<[^>]+>#';
	$string = preg_replace($pattern, ' ', $string);
	$string = word_limiter($string, $q);
	return $string;
}


function config($where)
{
	$Blog =& get_instance();
	$Blog->load->model('site_model');
	$where = array('option' => $where);
	$query = $Blog->site_model->get('config', $where, TRUE);
	return $query->value;
}
