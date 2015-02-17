<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH."models/entities/TblUser.php");

class User_register_model extends CI_Model
{
	private $em;

	public function __construct()
	{
		parent::__construct();
		$this->em = $this->doctrine_orm->em;
	}

	public function createUser($data)
	{
		$user = new TblUser();

		$user->setUsername($data['uname']);
		$user->setPassword(md5($data['pw']));

		$this->em->persist($user);
		$status = $this->em->flush();

		return true;
	}
}