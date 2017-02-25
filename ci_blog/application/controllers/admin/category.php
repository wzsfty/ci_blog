<?php

defined('BASEPATH') OR exit('No direct script access allowed');
class Category extends MY_Controller
{
	public function add_category()
	{
		$this->load->helper('form');
		$this->load->view('admin/add_category');
	}
	public function add()
	{
		$this->load->library('form_validation');
		$status=$this->form_validation->run('category');
		if($status)
		{
			//数据库操作
			$this->load->model('category_model');//$this->load->model('category_model','cate');$this->cate->add();第二个参数相当于起个别名
			$this->category_model->add();
			success('admin/category/index','添加成功');
		}else
		{

		}
	}
	public function edit_category()
	{
		$this->load->helper('form');
		$this->load->model('category_model','cate');
		$data['category']=$this->cate->check();
		$this->load->view('admin/edit_cate',$data);
	}
	public function edit()
	{
		// $this->load->library('form_validation');
		// $status=$this->form_validation->run('category');
		// if(isset($_POST))
		// {
		// 	//数据库操作
		// }else
		// {

		// }	
	 // print_r($_POST);	die;
		// echo $this->

		$this->load->model('category_model','cate');

		if(isset($_POST['modify']))
		{
			$data = array(
				'cid' => $this->input->post('cid'),
				'cname' => $this->input->post('cname')
				);
			
			$this->cate->modify($data);
			show_notice('修改成功');

		}
		if(isset($_POST['delete']))
		{
			$cid=$this->input->post('cid');
			// echo $cid;die;
			$this->cate->del($cid);

			// echo $this->input->post['cid'];die;
			success('admin/category/edit_category','删除成功');
		}


	}
}

?>