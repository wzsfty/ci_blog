<?php

$config = array
(
	'article' =>array//article这套规则，用的时候在run里面传递参数'article'
	(
		
		array(
				'field'  => 'a_title',
				'label'  => '标题',
				'rules'  =>'required|max_length[10]'
			 ),
		array(
			'field'  => 'a_tag',
			'label'  => '标签',
			'rules'  =>'required'
		 	),
		array(
			'field'  => 'a_describe',
			'label'  => '文章描述',
			'rules'  =>'required|max_length[50]'
		 	),
		array(
			'field'  => 'a_content',
			'label'  => '文章内容',
			'rules'  =>'required|max_length[5000]'
		 	)
	)
	/*'category' => array
	(
	)*/
)

?>