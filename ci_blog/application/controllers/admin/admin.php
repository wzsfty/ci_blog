<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller
{
	public function index()
	{
		$this->load->model('admin_model','admin');
		$data['user_data']=$this->admin->check($this->session->userdata('username'));
		//print_r($data);
		$this->load->view('admin/index',$data);
	}

	public function save_info()
	{
		$username=$this->input->post('username');
		//$username=$this->input->post('username');
		$admin_describe=$this->input->post('admin_describe');
		$signature=$this->input->post('signature');
		$uid=$this->session->userdata('uid');






	// 	//文件上传

	// //1 配置
	// //2 载入上传类
	// //3 执行上传动作
	// 		$config['upload_path'] = './uploads/';
	// 		$config['allowed_types'] = 'gif|jpg|png|jpeg';
	// 		$config['max_size'] = '10000';
	// 		$config['max_width'] = '2000';
	// 		$config['max_height'] = '2000';
	// 		$config['file_name']= time().mt_rand(1000,9999);//文件名设置

	// 		$this->load->library('upload',$config);

	// 		$status = $this->upload->do_upload('head_image');//head_image为表单名字

	// 		print_r($_POST);die;

	// 		if(!$status)  
	// 			error('必须上传图片');
	// 		$wrong=$this->upload->display_errors();
	// 		if($wrong) error($wrong);
	// //4返回信息
	// 		$info=$this->upload->data();
	// 		$head_image='uploads/'.$info['orig_name'];
	// 		// print_r($info);die;



				//文件上传

	//1 配置
	//2 载入上传类
	//3 执行上传动作
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = '10000';
			$config['max_width'] = '2000';
			$config['max_height'] = '2000';
			$config['file_name']= time().mt_rand(1000,9999);//文件名设置

			$this->load->library('upload',$config);

			$status = $this->upload->do_upload('head_image');//head_image为表单名字


			if(!$status) 
			{
				$data=array(
				'username'	=>	$username,
				'admin_describe'=>$admin_describe,
				'signature' 	=>$signature,
				);
			}
			else {
							$wrong=$this->upload->display_errors();
			if($wrong) error($wrong);
	//4返回信息
			$info=$this->upload->data();
			$head_image='uploads/'.$info['orig_name'];
					$data=array(
				'username'	=>	$username,
				'admin_describe'=>$admin_describe,
				'signature' 	=>$signature,
				'head_image'   =>$head_image
			);

			} 

			// print_r($info);die;

	



		$this->load->model('admin_model','admin');
		$this->admin->modify($uid,$data);
		success('admin/admin/index','保存成功');
	}
/*
	public function modify_head_image()
	{
		//文件上传

	//1 配置
	//2 载入上传类
	//3 执行上传动作
			$config['upload_path'] = './uploads/';
			$config['allowed_types'] = 'gif|jpg|png|jpeg';
			$config['max_size'] = '1000';
			$config['max_width'] = '1024';
			$config['max_height'] = '768';
			$config['file_name']= time().mt_rand(1000,9999);//文件名设置

			$this->load->library('uplod',$config);

			$status = $this->upload->do_upload('head_image');//head_image为表单名字
			if(!$status)  error('必须上传图片');
			$wrong=$this->upload->display_errors();
			if($wrong) error($wrong);
	//4返回信息
			$data=$this->upload->data();
			print_r($data);die;

	}

	*/
}



?>