<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>注册页面</title>
		<link rel = "stylesheet" type="text/css" href ="<?php echo base_url('style/admin/register/');?>css/style.css">
	</head>
	<body>
		
		<img src="<?php echo base_url('style/admin/register/'); ?>img/regist.jpg" width="100%" height="100%" >
	 
		<div class="regist" >
			<div class="registmain">
				<h4>用户注册</h4>
				<form action="<?php echo site_url('admin/register/reg') ?>" method="post">
				<ul>
					<li>
						<span>登陆账号：</span>
						<input type="text" id="username" name="username" value="">
						<p class = "msg"><i class = "err"></i>5-15个字符</p>
						<b id="count">0个字符</b>
						
					</li>
					<li>
						<span>登陆密码：</span>
						<input type="password" id="password1" name="password1" value="">
						<p class = "msg"><i class = "err"></i>5-15个字符</p>
					</li>
					<li>
						<span>确认密码：</span>
						<input type="password" name="password2" id="password2" value="">
						<p class = "msg"><i class = "ati"></i>请再输入一次</p>
					</li>
 
					
					<li>
						<div class="registbtn">
							<input type="submit" id="sub" value="注册">
						</div>
					</li>
				</ul>


				</form>
			</div>
		</div>

		<script type="text/javascript" src="<?php echo base_url('style/admin/register/');?>js/jquery-1.11.1.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url('style/admin/register/'); ?>js/script.js"></script>
	</body>
</html>