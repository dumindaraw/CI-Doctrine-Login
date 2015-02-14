<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
		$this->load->view('login_view');
	}

	public function trigger()
	{
		$this->load->model('login_model');
		$isValidLogin = $this->login_model->checkLogin();

		echo $isValidLogin;

		if($isValidLogin == true)
		{
			header("Location: ".$this->config->base_url()."home");
		}
		else
		{
			header("Location: ".$this->config->base_url()."login");
		}
	}
}
