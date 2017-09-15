<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register_model extends CI_model {
	
	//this function is for registering a user into database by checking the email enterd is already prasent or not
	function process($data)
	{
		$this->db->where('email',$data['email']);
		$query = $this->db->get('register_details');
		$results=$query->result_array();

		

		if(count($results)>0)
		{
			die( "There is already a user with that email!" ) ;
		}
		else
		{
			$this->db->insert('register_details',$data);

		}		
	}
	
	//this function is to get the information fromthe database for the user to login checking after the registration
	function get_details($data)
	{
		$this->db->where('email',$data['username']);
		$this->db->where('password',$data['password']);
		$query = $this->db->get('register_details');
		$result = $query->result_array();
		return $result;
	}

}



	
