<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>主页面</title>
		<link rel = "stylesheet" type="text/css" href ="<?php echo base_url().'style/index/'  ?>css/style.css">
	</head>
	<body style="background-image: url(<?php echo base_url().'style/index/'   ?>img/bgpicture.jpg); background-size: 100% auto; ">

	 	
		<div class = "mainView">
			<div class= "header">
				
				<from class= "search">
					<input type="text" class="search-text" name="q"/>
					<img class="search-button" onclick="search()" src="<?php echo base_url().'style/index/'   ?>img/search.png" width:15px height:15px>
				</from>
			
				<div class= "login_regist" action="#" target="_blank">
					<p class="login">登陆</p>
					<p>&nbsp|&nbsp<p>
					<p class= "regist">注册</p>
				</div>
			</div>

			<div class="name_picture">
				<div class = "picture">
					<a href="/" target="_blank">
						<img class="header_picture" src="<?php echo base_url().'style/index/'   ?>img/header_picture.jpg" width='140px' height='140px'>
					</a>
				</div>
				<div class = "detail">
					<p class="name">博客名</p>
					<label>个性签名</label>
					<p>detail........</p>
				</div>
				<div class="write_edit">
					<a href="/"	>
						<img class="write" src="<?php echo base_url().'style/index/'   ?>img/write.png"  height="50px" width="50px">
					</a>
					<a  href="/"	>
						<img class="edit" src="<?php echo base_url().'style/index/'   ?>img/edit.png" height="50px" width="50px">
					</a>
					<a href="<?php  echo site_url().'/home/add';  ?>"	>
						<p class="write_label">发布文章</p>
					</a>
					<a href="<?php  echo site_url().'/home/modify';  ?>"	>
						<p class="edit_label">修改文章</p>
					</a>
				</div>
				<div class="varity">
					<p class="label1">文章分类</p>
					<div class="article_classification">
						<p style="font-size:20px; color:#515151">文章分类内容模块大小可变</p>
					</div>
					<p class="label2">标签归档</p>
					<div class="tag_archive">
						<p style="font-size:20px; color:#515151">标签归档内容模块大小可变</p>
					</div>

				</div>
				<div class="main_body">
					<div class="article_head">这是文章标题</div><div class="article_body">这是文章内容</div>
				</div>
			</div>
		</div>

		<script type="text/javascript" src="js/jquery-1.11.1.min.js"></script>
		<script type="text/javascript" src="js/script.js"></script>
	</body>
</html>