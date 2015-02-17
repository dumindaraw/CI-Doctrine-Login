<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('home_model');
	}

	public function index()
	{
		$userdata = $this->home_model->getAllData();
		$data['userdata'] = $userdata;
		$this->load->view('home_view', $data);
	}

	public function edit($id)
	{
		$data['id'] = $id;
		$this->load->view('user_edit_view', $data);	
	}

	public function editDone($id)
	{
		$newUsername = $this->input->post('uname');
		$newPassword = $this->input->post('pw');

		$userDetails = array('id' => $id, 'newUsername' => $newUsername,'newPassword' => $newPassword);
		$status = $this->home_model->editUser($userDetails);

		if($status == 1)
		{
			header("Location: ".$this->config->base_url()."home");
		}else
		{
			return false;
		}
	}

	public function delete($id)
	{
		$status = $this->home_model->deleteUser($id);

		if($status == 1)
		{
			header("Location: ".$this->config->base_url()."home");
		}else
		{
			return false;
		}
	}
}
