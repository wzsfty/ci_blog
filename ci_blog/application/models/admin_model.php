<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model{

	public function  check($username)
	{
		$data=$this->db->get_where('admin',array('username'=> $username))->result_array();
		return $data;
	}


	public function check_user($username)
	{
		$data=$this->db->get_where('user',array('username'=> $username))->result_array();
		return $data;
	}

	public function modify($uid,$data)
	{
		$this->db->update('admin',$data,array('uid'=>$uid));
	}

	public function register($data)
	{
		$this->db->insert('admin',$data);
	}


}