<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller
{
	public function index()
	{
		
		$this->load->helper('captcha');// 1 载入验证码辅助函数
		$speed = 'dsjfierohfdsffs2595923015';
		$word ='';
		for($i=0;$i<4;$i++)
		{
			$word.=$speed[mt_rand(0,strlen($speed)-1)];
		}
		//echo $word;die;
		$vals = array( // 2 配置
				'img_path'  =>  './captcha/',
				'img_url'   => base_url().'captcha/',
				'img_width' => 100,
				'img_height' =>30,
				'expiration' =>30 //过期时间30s
			);

		$cap=create_captcha($vals);//3 创建
		if(!isset($_SESSION))
		{
			session_start();
		}
		$_SESSION['code'] = strtoupper($cap['word']);
		echo $_SESSION['code'];
		$data['captcha'] = $cap['image'];
		// print_r($data);
		$this->load->view('admin/login',$data);

	}

	public function login_in()
	{
		$code = $this->input->post('captcha');
		if(!isset($_SESSION))
		{
			session_start();
		}
		/*echo $_SESSION['code'];
		echo '</br>';
		echo $code;die;*/
		if(strtoupper($code)!= $_SESSION['code']) error('验证码错误');

		if(isset($_POST['admin']))
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->load->model('admin_model');
			$user_data=$this->admin_model->check($username);
			if(!$user_data||$user_data[0]['password']!=md5($password)) error('用户名不存在或者密码不正确');
			$session_data= array(
				'username' => $username,
				'uid' 	   => $user_data[0]['uid'],
				'login_time'=> time()
				);
			$this->session->set_userdata($session_data);//将数据存入session
			//$data=$this->session->userdata('username');//取出数据
					success('admin/admin/index','登录成功');
		}

		if(isset($_POST['user']))
		{
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$this->load->model('admin_model');
			$user_data=$this->admin_model->check_user($username);
			if(!$user_data||$user_data[0]['password']!=$password) error('用户名不存在或者密码不正确');
						$session_data= array(
				'username' => $username,
				'uid' 	   => $user_data[0]['uid'],
				'login_time'=> time()
				);
			$this->session->set_userdata($session_data);
		}

		success('index/admin/index','登录成功');

	}


	public function login_out()
	{
		$this->session->sess_destroy();
		success('admin/login/index','退出成功');
	}
	
}
?>