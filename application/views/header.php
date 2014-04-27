<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>
		<?php 
			if (isset($headTitle)) {
				echo $headTitle;
			} else {
				echo "寻物-民大失物招领平台|学生地带";
			}
			
		 ?>
	</title>
	<link rel="stylesheet" href="<?php echo base_url('/resource/css/basic.css') ?>">
	<link rel="stylesheet" href="<?php echo base_url('/resource/css/index.css') ?>">
	<meta name="description" content="<?php 
			if (isset($description)) {
				echo $description;
			} else {
				echo "";
			}
			
		 ?>">
</head>
<body>
<div id="shade"></div>
<div id="login">
	<div class="count"><input type="text"></div>
	<div class="password"><input type="password"></div>
</div>
<div id="top">
	<img src="<?php echo base_url('/resource/img/logo.jpg') ?>" alt="">
	<div class="login_register">
		<!-- <span><a href="#" name="login_btn">登陆</a></span>
		<span><a href="#" name="register_btn">注册</a></span> -->
	</div>
	<div class="search">
		<input type="text" name="search_input">
		<!--<a href="<?php echo base_url('/index.php/defaults/search_result') ?>"><div class="search_btn"></div></a>-->
		<div class="search_btn"></div>

	</div>
</div>
<div id="nav_box">
	<div class="nav">
	<a href="<?php echo base_url() ?>">首页</a>&nbsp;
	<a href="<?php echo base_url('/index.php/lost/page_lost') ?>">失物信息</a>&nbsp;
	<a href="<?php echo base_url('index.php/find/page_find') ?>">招领信息</a>
    </div>
</div>