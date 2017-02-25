<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Category_model extends CI_Model
{
	public function add()
	{
		$this->db->insert('表名/前缀',$data);
	}

	public function check()
	{
		$data = $this->db->get('category')->result_array();
		return $data;
	}

	public function del($cid)
	{
		$this->db->delete('category',array('cid'=>$cid));
	}

	public function modify($data)
	{
		$this->db->replace('category',$data);
	}


}
?>