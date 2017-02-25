<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller
{
	public function index()//首页
	{
		//echo base_url().'style/index/';
	    echo site_url().'/home/add'; 
		$this->load->view('index/main');

	}

	public function categery()//分类
	{
		$this->load->view('index/categery.php');
	}

	public function add()
	{
		$this->load->view('index/add');
	}

	public function modify()
	{
		$this->load->view('index/modify');
	}
}


?>