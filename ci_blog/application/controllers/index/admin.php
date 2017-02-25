<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends MY_Controller
{
	// public function index()
	// {
	// 	$this->load->view('index/index');
	// }


	public function index()
	{

//分页：
		$this->load->library('pagination');//载入类
		$per_page=5;

		$config['base_url']= site_url('index/admin/index');//配置
		$config['total_rows']= $this->db->count_all_results('article');
		$config['per_page']=$per_page;
		$config['uri_segment']=4;
		// $config['first_link']='第一页';

		$this->pagination->initialize($config);

		$data['links'] = $this->pagination->create_links();
		// print_r($data);die;
		$offset=$this->uri->segment(4);
		$this->db->limit($per_page,$offset);


		$this->load->model('article_model','art');
		$data['article']=$this->art->check();
						$data['all_tags']=$this->art->get_distinct_tags();
				$this->load->model('category_model','cate');
		$data['category']=$this->cate->check();
					// $data['tags']=$this->art->get_tags($aid);
						// $data['category']=$this->cate->check();
		// print_r($data);die;
		$this->load->helper('form');//view视图中才可以使用site_url等函数
		$this->load->view('index/index',$data);
	}
}