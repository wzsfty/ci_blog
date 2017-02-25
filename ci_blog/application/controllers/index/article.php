<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends MY_Controller
{
	public function show()
	{
				$this->load->model('article_model','art');
						$this->load->model('category_model','cate');
				$aid=$this->uri->segment(4);
			$data['article']=$this->art->get_article($aid);
			// $data['category']=$this->art->check();
			// print_r($data);die;
			$data['tags']=$this->art->get_tags($aid);
						// $data['category']=$this->cate->check();
						$data['category']=$this->cate->check();

				$data['all_tags']=$this->art->get_distinct_tags();
				$data['tags']=$this->art->get_tags($aid);

		// print_r($data);die;
		$this->load->helper('form');//view视图中才可以使用site_url等函数
		
		$this->load->view('index/show_article.php',$data);
	}

	public function show_tag()
	{

				$tag=$this->uri->segment(4);
		$this->load->model('article_model','art');
		$tag_query=$this->art->show_tag($tag);
		foreach ($tag_query->result_array() as $row){
      $article[]=$row;
  		}

  		$data['article']=$article;
  		$data['all_tags']=$this->art->get_distinct_tags();
  		$this->load->model('category_model','cate');
		$data['category']=$this->cate->check();
  		// print_r($article);die;

		// $this->load->library('pagination');//载入类
		// $per_page=2;

		// $config['base_url']= site_url('index/article/show_tag');//配置
		// $config['total_rows']= count($article);
		// $config['per_page']=$per_page;
		// $config['uri_segment']=4;
		// // $config['first_link']='第一页';

		// $this->pagination->initialize($config);

		// $data['links'] = $this->pagination->create_links();
		// // print_r($data);die;
		// // $offset=$this->uri->segment(4);
		// // $this->db->limit($per_page,$offset);







		// print_r($data);die;
		// $data['article']=$this->art->show_tag($tag);
					// $data['tags']=$this->art->get_tags($aid);
						// $data['category']=$this->cate->check();
		// print_r($data);die;
		$this->load->helper('form');//view视图中才可以使用site_url等函数
		$this->load->view('index/show_tag',$data);


	}



	public function search()
	{
		$title = $this->input->post('key');
		$this->load->model('article_model','art');
		$data['article']=$this->art->search($title);
		// print_r($data);die;
		// print_r($data['article']);
		foreach($data['article'] as $v)
		{
			// $
			$category[]=$this->art->get_cname($v['cid']);
			// $data['article'][]['cid']=$category;
		}
		// echo $data['article'][0]['title'];
		// print_r($category);
		for($i=0;$i<count($data['article']);$i++)
		{
			$data['article'][$i]['cname']=$category[$i][0]['cname'];
		}
		// print_r($category);
		// $data['category']=$category;
		// print_r($data);die;
		$this->load->model('category_model','cate');
		$data['category']=$this->cate->check();
		$data['all_tags']=$this->art->get_distinct_tags();
		$this->load->view('index/show_search',$data);
	}



}