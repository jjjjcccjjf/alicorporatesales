<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('users_model');
	}

	public function index()
	{
		if(check_login($this->session))
		{
			redirect(base_url("Emails/Inquiry"));
		}
		else
		{
			$this->load->view("login");
		}
	}

	public function validate_login()
	{
		$admin_user = $this->users_model->verifyLogin($this->input->post(), 1);
		if(is_object($admin_user))
		{
			$this->session->userdata['id'] = $admin_user->id;
			$this->session->userdata['email'] = $admin_user->email;
			$this->session->userdata['name'] = $admin_user->name;
			$this->session->userdata['alicorporate_logged_in'] = ALI_SESSION_KEY;
			redirect(base_url("Emails/Manage"));
		}
		else
		{
			$msg_data = array('alert_msg' => 'Invalid Username/Password', 'alert_color' => 'red');
			$this->session->set_flashdata($msg_data);
			redirect(base_url());
		}
	}

	public function logout()
	{
		$this->session->sess_destroy();
		redirect(base_url());
	}
}

?>
