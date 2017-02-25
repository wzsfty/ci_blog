<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>文章列表</title>
		<link rel = "stylesheet" type="text/css" href ="<?php echo base_url().'style/index/index/'  ?>css/style.css">
	</head>
	<body style="background-image: url(<?php echo base_url().'style/index/show/'?>img/bgpicture.jpg); background-size: 100% auto; ">

	 	
		<div class = "mainView">
			<div class= "header">
				
				<form class= "search"  action="<?php  echo site_url('index/article/search') ?>"  method="post">
					<input type="text" class="search-text" name="key"/>
			<!-- 		<img class="search-button" onclick="search()"  type="submit"  src="<?php echo base_url().'style/index/index/'  ?>img/search.png" width:15px height:15px> -->

			<button type="submit"   class="search-button"   style="border:none ;background-color:#48525e;position:absolute;top:1px;right:3px"> <img class="search-button" onclick="search()" src="<?php echo base_url().'style/index/index/'  ?>img/search.png" width:15px height:15px></button>
				</form>









			
				<div class= "login_regist" action="#" target="_blank">
					<p class="login" onclick="login()" >登陆</p>
					<p>&nbsp|&nbsp<p>
					<p class= "regist" onclick="registr()" >注册</p>
				</div>
			</div>

			<div class="name_picture">
				<div class = "picture">
					<a href="/" target="_blank">
						<img class="header_picture" src="<?php echo base_url().'style/index/index/'  ?>img/header_picture.jpg" width='140px' height='140px'>
					</a>
				</div>
				<div class = "detail">
					<p class="name">博客名</p>
					<label>个性签名</label>
					<p>detail........</p>
				</div>
 
				<div class="varity">
					<p class="label1">文章分类</p>
					<div class="article_classification">
						<ul>
						<?php foreach ($category as $v):?>
							<li><p style="font-size:15px" onclick="/"><?php echo $v['cname'] ?></p></li>
						<?php endforeach?>
						</ul>
				
					</div>
					<p class="label2">标签归档</p>
					<div class="tag_archive">
					
					 <?php foreach ($all_tags as $t):?>
					 	 <a href="<?php echo site_url('index/article/show_tag/').$t['tag'];?>">
						<p style="font-size:15px" onclick="/"> <?php echo $t['tag'];?></p>

					<?php endforeach?>
					</div>
				</div>
				<div class="main_list">
				 <?php foreach($article as $v): ?>
            <ul class="list">
                 <li>    
                    <div class="list_content" onclick="/">
                        <a href="<?php echo site_url('index/article/show/').$v['aid'];?>">
                        	<p class="title" style="color:pink"><?php echo $v['title']?></p>
                        	<p class="list_describe" style="color:#cee9ee"><?php echo $v['a_describe']?></p>
                        	<p class="list_classify" style="color:#cee9ee"><?php echo $v['cname']?></p>
                        	<p class="list_tag" style="color:#cee9ee"> <?php  $tags=$this->art->get_tags($v['aid']);  $i=count($tags); for($j=0;$j<$i;$j++) echo $tags[$j]['tag'].",";?></p>
                        </a>   
                    </div>          
                </li>
                <hr class="level" width="860" / >

            </ul> <?php endforeach?>
                   <?php echo $links;?>
        </div>

        <script>
        	function login()
        	{
        		location.href="<?php  echo site_url('admin/login') ?>";
        	}
        	        	function register()
        	{
        		location.href="<?php  echo site_url('admin/register') ?>";
        	}
        </script>
	       
 

		<script type="text/javascript" src="<?php echo base_url().'style/index/index/'  ?>js/jquery-1.11.1.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url().'style/index/index/'  ?>js/script.js"></script>
	</body>
</html>