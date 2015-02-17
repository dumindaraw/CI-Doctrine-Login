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
		$uname = $this->input->post("uname");
		
		$criteria = array('username' => $uname, 'password' => md5($this->input->post("pw")));

	
		if (count($user->findBy($criteria)) > 0) 
		{
			$newdata = array(
                   'username'  => $uname,
                   'logged_in' => TRUE
               );

			$this->session->set_userdata($newdata);

			return true;
		}

		return false;
	}
}