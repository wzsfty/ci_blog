<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller
{
	public function index()
	{
		
		$this->load->view('admin/register');

	}

	public function reg()
	{
		$this->load->model('admin_model','admin');
		$username = $this->input->post('username');
		$password1 = $this->input->post('password1');
		//$password2 = $this->input->post('password2');
		// if($password1!=$password2)  erroe('两次密码输入不一致');
		$user_data = $this->admin->check($username);
		if($user_data) error('用户名已存在');
		$data =array(
				'username' => $username,
				'password' => md5($password1),
				'time' 	   => time()
			);
		$this->admin->register($data);
		$user_data=$this->admin->check($username);
		$session_data= array(
		'username' => $username,
		'uid' 	   => $user_data[0]['uid'],
		'login_time'=> time()
		);
		$this->session->set_userdata($session_data);//将数据存入session
		success('admin/admin/index','注册成功');
	}
}
?>