<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>主页面</title>
		<link rel = "stylesheet" type="text/css" href ="<?php echo base_url().'style/index/show/'  ?>css/style.css">
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
					<p class="login">登陆</p>
					<p>&nbsp|&nbsp<p>
					<p class= "regist">注册</p>
				</div>
			</div>

			<div class="name_picture">
				<form>
					<div class = "picture">
						<a href="/" target="_blank">
							<img class="header_picture" src="<?php echo base_url().'style/index/show/'  ?>img/header_picture.jpg" width='140px' height='140px'>
						</a>
					</div>
				</form>
				<div class = "detail">
					<p class="name">博客名</p>
					<label>个性签名</label>
					<p>detail........</p>
				</div>
				

				<div class="varity">
					<p class="label1">文章分类</p>
					<div class="article_classification">
					                   <?php  foreach ($category as $v):?>
						<ul>
							<li><p style="font-size:15px" onclick="/"  value=" <?php echo $v['cid']?>"><?php echo $v['cname'] ?></p></li>

						</ul>
						                    <?php endforeach?>
				
					</div>
					<p class="label2">标签归档</p>
					<div class="tag_archive">
					
					 <?php foreach ($all_tags as $t):?>
					 	 <a href="<?php echo site_url('index/article/show_tag/').$t['tag'];?>">
						<p style="font-size:15px" onclick="/"> <?php echo $t['tag'];?></p>

	<?php endforeach?>
					</div>

				</div>
				    <?php  foreach ($article as $v):?>
				<div class="main_body">
					<div class="article_head" name="article_head"> <?php  echo $v['title']?>
						<div class="article_classify" name="article_classify"><span><?php echo $v['cname'] ?></span></div>
						<div class="article_tag" name="article_tag"><span><?php  $i=count($tags); for($j=0;$j<$i;$j++) echo $tags[$j]['tag'].",";?></span></div>
						<div class="article_describe" name="article_discribe"><span><?php  echo  $v['a_describe'];?></span></div>
						<hr class="line" size=83 width="0.2" color="#999999">
					</div>

					<div class="article_body"><?php  echo $v['content'];?></div>
				</div>                       
			         <?php endforeach?>
			</div>
		</div>

		
		<script type="text/javascript" src="<?php echo base_url().'style/index/show/'  ?>js/script.js"></script>
		<script type="text/javascript" src="<?php echo base_url().'style/index/show/'  ?>js/jquery-1.11.1.min.js"></script>
	</body>
</html>