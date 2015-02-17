<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

require_once(APPPATH."models/entities/TblUser.php");

class Home_model extends CI_Model
{
	private $em;

	public function __construct()
	{
		parent::__construct();
		$this->em = $this->doctrine_orm->em;
	}

	public function getAllData()
	{
		$user = $this->em->getRepository('TblUser');
		return $user->findAll();	
	}

	public function editUser($userDetails)
	{
		$qb = $this->em->createQueryBuilder();
		$q = $qb->update('TblUser', 'u')
		        ->set('u.username', $qb->expr()->literal($userDetails['newUsername']))
		        ->set('u.password', $qb->expr()->literal(md5($userDetails['newPassword'])))
		        ->where('u.id = ?1')
		        ->setParameter(1, $userDetails['id'])
		        ->getQuery();
		$p = $q->execute();

		return $p;
	}

	public function deleteUser($id)
	{
		$qb = $this->em->createQueryBuilder();
		$q = $qb->delete('TblUser', 'u')
		        ->where('u.id = ?1')
		        ->setParameter(1, $id)
		        ->getQuery();
		$p = $q->execute();

		return $p;
	}
}