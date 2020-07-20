<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');


class AvAuth_model extends CI_Model
{

	public function avchecking($username,$password)
	{
		if($username == 'androvideo' && $password == 'av1234'){
			return true;
		} else {
			return false;
		}
	}
}