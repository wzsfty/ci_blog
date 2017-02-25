<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>登陆页面</title>
		<link rel = "stylesheet" type="text/css" href ="<?php echo base_url().'style/admin/login/' ?>css/style.css">
	</head>
	<body>
	 	<img src="<?php echo base_url().'style/admin/login/' ?>img/main.jpg" width="100%" height="100%">
		<div class="login" >
			<div class="loginmain">
				<h4>登&nbsp&nbsp&nbsp&nbsp陆</h4>
				<form action="<?php  echo site_url('admin/login/login_in') ?>" method="post">
				<ul>
					<li>
						<span>登陆账号：</span>
						<input type="text" name="username" value="">
				
					</li>
					<li>
						<span>登陆密码：</span>
						<input type="password" name="password" value="">
						
					</li>
					<li>
						<span>验&nbsp&nbsp证&nbsp&nbsp码：</span>
						<input type="text1" name="captcha" value=""> 	<?php echo $captcha ?>
					</li>
					<li>
						<div class="loginbtn">
							<input class="button1" type="submit" name="user" value="用户登陆">
							<input class="button2" type="submit"  name="admin" value="管理员登陆">
						</div>
					</li>
				</ul>
				</form>
			</div>
		</div>

		<script type="text/javascript" src="<?php echo base_url().'style/admin/login/'?>js/jquery-1.11.1.min.js"></script>
		<script type="text/javascript" src="<?php echo base_url().'style/admin/login/'?>js/script.js"></script>
	</body>
</html>