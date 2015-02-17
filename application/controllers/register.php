<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->load->view('user_register_view');
	}

	public function create()
	{
		$this->form_validation->set_rules('uname', 'Username', 'required');
		$this->form_validation->set_rules('pw', 'Password', 'required');
		$this->form_validation->set_rules('repw', 'Password Confirmation', 'required');

		if($this->form_validation->run() == TRUE)
		{
			$data['uname'] = $this->input->post('uname');
			$data['pw'] = $this->input->post('pw');
			$this->load->model('user_register_model');
			$result = $this->user_register_model->createUser($data);

			redirect($this->config->base_url()."login");
		}
		else
		{
			$this->load->view('user_register_view');
		}
		
	}
}
