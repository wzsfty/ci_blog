<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Article extends MY_Controller
{
	public function index()
	{
		$this->load->view('admin/view_article');
	}


	public function add_article()
	{
		$this->load->model('category_model','cate');
		$data['category']=$this->cate->check();
		$this->load->helper('form');//view视图中才可以使用site_url等函数
		$this->load->view('admin/add_article',$data);

	}

	public function add()
	{
		$this->load->library('form_validation');
		//载入表单验证类
		//$this->form_validation->set_rules('a_title','文章标题','required|min_length[5]');
		//设置规则
		$status=$this->form_validation->run('article');
		//执行验证
		// print_r($status);die;
		if($status)
		{
			$this->load->model('article_model','art');
			$data = array(
					'title'  => $this->input->post('a_title'),
					'cid'  => $this->input->post('cid'),
					'a_describe'  => $this->input->post('a_describe'),
					'content'  => $this->input->post('a_content'),
					'time'   => time()
				);
			//var_dump($data);
			//die;


			$aid=$this->art->add($data);
			$tags=explode(",",$this->input->post('a_tag'));
			foreach ($tags as $v)
			{
				$temp = array(
						'aid' => $aid,
						'tag' => $v
					);
				$this->art->add_tag($temp);
			}



			success('admin/admin/index','发布成功');
		}else
		{
			$this->load->model('category_model','cate');
			$data['category']=$this->cate->check();
			$this->load->helper('form');
			$this->load->view('admin/add_article',$data);//不成功载入模板

		}
		//var_dump($status);
	}

	public function edit_article()
	{

//分页：
		$this->load->library('pagination');//载入类
		$per_page=5;

		$config['base_url']= site_url('admin/article/edit_article');//配置
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
		// print_r($data);die;
		$this->load->helper('form');//view视图中才可以使用site_url等函数
		$this->load->view('admin/article_edit_list',$data);
	}

	public function edit()
	{
		$this->load->library('form_validation');
		$this->load->model('article_model','art');
		$this->load->model('category_model','cate');

		$aid=$this->uri->segment(4);
		// echo $aid;die;
		// $status=$this->form_validation->run('article');
		// print_r($_POST);
		if(isset($_POST['modify']))
		{
			$data['article']=$this->art->get_article($aid);
			// $data['category']=$this->art->check();
			// print_r($data);die;
			$data['tags']=$this->art->get_tags($aid);
						$data['category']=$this->cate->check();
			// print_r($data['tags']);die;
			$this->load->view('admin/edit_article',$data);

		}

		if(isset($_POST['delete']))
		{
			$this->art->delete_article($aid);
			show_notice('删除成功');
		}

	}
	public function modify()
	{
				$aid=$this->uri->segment(4);
					$this->load->model('article_model','art');
					$temp1 = array(
					'aid'  => $aid,
					'title'  => $this->input->post('a_title'),
					'cid'  => $this->input->post('cid'),
					'a_describe'  => $this->input->post('a_describe'),
					'content'  => $this->input->post('a_content'),
					'time'   => time()
				);
			$this->art->update_article($temp1);
			$tag_id=$this->art->get_tag_id($aid);

			$tags=explode(",",$this->input->post('a_tag'));


			// 			foreach ($tags as $v)
			// {
			// 	$temp = array(
			// 			'tag' => $v
			// 		);
			// 	$this->art->modify_tag($temp,$aid);
			// }

			// $i=count($tag_id)>count($tags)?count($tag_id):count($tags);
			$n1=count($tag_id);
			$n2=count($tags);

			if($n1>=$n2)
			{
					for($i=0;$i<$n2;$i++)
					{
						$t=array(
								'tags_id'=> $tag_id[$i]['tags_id'],
								'aid' 	 => $aid,
								'tag'	=>$tags[$i]
							);
						$this->art->update_tag($t);
					}
					for(;$i<$n1;$i++)
					{
						$this->art->delete_tag1($tag_id[$i]['tags_id']);
					}
			}
			else{
									for($i=0;$i<$n1;$i++)
					{
						$t=array(
								'tags_id'=> $tag_id[$i]['tags_id'],
								'aid' 	 => $aid,
								'tag'	=>$tags[$i]
							);
						$this->art->update_tag($t);
					}
					for(;$i<$n2;$i++)
					{
						$t=array(
								// 'tags_id'=> $tag_id[$i]['tags_id'],
								'aid' 	 => $aid,
								'tag'	=>$tags[$i]
							);
				$this->art->add_tag($t);
					}
			}

			success('admin/admin/index','修改成功');
	}
}

?>