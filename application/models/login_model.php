<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH."models/entities/TblUser.php");

class Login_model extends CI_Model
{
	private $em;

	public function __construct()
	{
		parent::__construct();
		$this->em = $this->doctrine_orm->em;
	}

	public function checkLogin()
	{

		$user = $this->em->getRepository('TblUser');
		
		$criteria = array('username' => $this->input->post("uname"), 'password' => md5($this->input->post("pw")));

	
		if (count($user->findBy($criteria)) > 0) 
		{
			return true;
		}

		return false;
	}
}