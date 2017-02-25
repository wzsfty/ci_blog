<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Article_model extends CI_Model
{

	public function add($data)
	{
		$this->db->insert('article',$data);
		return $this->db->insert_id();
	}


	public function add_tag($data)
	{
		$this->db->insert('tags',$data);
	}
	// public function modify_tag($data,$aid)
	// {
	// 	$this->db->where('aid',$aid);
	// 	$this->db->update('tags',$data);
	// }

	public function check()
	{
		$data = $this->db->select('aid,title,a_describe,cname,time')->from('article')->join('category', 'article.cid=category.cid')->order_by('aid', 'desc')->get()->result_array();
		return $data;
	}


	public function get_cname($cid)
	{
		$data=$this->db->get_where('category',array('cid'=>$cid))->result_array();
		return $data;
	}

	public function get_article($aid)
	{
		// $sql=("SELECT FROM `article`,`tags` where `article`.'aid'='$aid' and `tags`.'aid'='$aid' ");
		// $this->db->query($sql);
		// $data = $this->db->select('aid,title,a_describe,cname,time')->from('article')->join('category', 'article.cid=category.cid')->order_by('aid', 'desc')->get()->result_array();
	

		// $data = $this->db->select('article.aid,title,a_describe,content,tag')->from('article')->join('tags', 'article.cid=tags.aid') -> order_by('aid', 'desc')->group_start()
		// ->where(array('article.aid'=>$aid))->where(array('tags.aid'=>$aid))->group_end()->get()->result_array();
		$data = $this->db->select('aid,title,a_describe,cname,content,time')->from('article')->join('category', 'article.cid=category.cid')->order_by('aid', 'desc')->where(array('aid'=>$aid))->get()->result_array();
		// $data['tags']=$this->db->get_where('tags',array('aid'=>$aid))->result_array();
			return $data;
	}


	public function update_article($data)
	{
		$this->db->replace('article',$data);
	}
	public function update_tag($data)
	{
		$this->db->replace('tags',$data);
	}
	public function get_tags($aid)
	{
			$data=$this->db->get_where('tags',array('aid'=>$aid))->result_array();
			return $data;
	}

	public function get_tag_id($aid)
	{
		$data=$this->db->get_where('tags',array('aid'=>$aid))->result_array();
		return $data;
	}

	public  function delete_tag1($tid)
	{
		$this->db->delete('tags',array('tags_id'=>$tid));
	}



	public function delete_article($aid)
	{
		$this->db->delete('article',array('aid'=>$aid));
		$this->db->delete('tags',array('aid'=>$aid));
	}


	public function get_distinct_tags()

	{
		$this->db->select('tag');
		$this->db->distinct('tag');
		$data=$this->db->get('tags')->result_array();
		return  $data;
	} 


	public function show_tag($t)
	{
		// $data = $this->db->select('article.aid,title,a_describe,cname,time')->from('article')->group_start()->join('category', 'article.cid=category.cid')->join('tags', 'article.aid=tags.aid')->group_end()->order_by('aid', 'desc')->get_where('tags',array('tag'=>$t))->result_array();
		$sql=("SELECT `article`.`aid`,`title`,`a_describe`,`cname`,`time` FROM `article`,`tags`,`category` where `article`.`cid`=`category`.`cid` and `article`.`aid`=`tags`.`aid` and `tags`.`tag`='$t' order by `article`.`aid`   ");

		$query=$this->db->query($sql);
		return $query;
	}


	public function search($key)
	{
		$this->db->like('title',$key);
		$data=$this->db->get('article')->result_array();
		return $data;
	}



}




?>