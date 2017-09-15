<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_success extends CI_Controller {

	function __construct() {
		parent::__construct();
		$this->load->model('Register_model');
	}

	public function index()
	{	
		$this->load->view('/register_success');
	}
	
	//this controller function is for login 
	function successfull()
	{
		$username=$this->input->post('email');
		$password=$this->input->post('password');
		$hash = md5($password);

		$sendata=array();
		$sendata['username']=$username;
		$sendata['password']=$hash;
		$userdetails = $this->Register_model->get_details($sendata);

		if(!empty($userdetails)){
			$userdetails=$userdetails[0];

			$sessionarray=array(
				'email'=>$userdetails['email'],
				'password'=>$userdetails['password']
			);
			$this->session->set_userdata($sessionarray);
			redirect('/login_success');
		}else{
			echo "You enter'd wrong username or password..pleace go back and try with correct username and password";
		}

	}

}

?>
