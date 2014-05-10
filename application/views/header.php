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
	<!-- 百度统计 -->
	<script>
		var _hmt = _hmt || [];
		(function() {
		var hm = document.createElement("script");
		hm.src = "//hm.baidu.com/hm.js?c9b5b46da4c6d65a93eef81ac431858b";
		var s = document.getElementsByTagName("script")[0]; 
		s.parentNode.insertBefore(hm, s);
		})();
	</script>
</head>
<body>
<div id="top">
	<img src="<?php echo base_url('/resource/img/logo.png') ?>" alt="">
	<div class="login_register"></div>
	<div class="search">
		<input type="text" name="search_input">
		<div class="search_btn"></div>

	</div>
</div>
<div id="nav_box">
	<div class="nav">
	<?php 
		$nav = isset($nav) ? $nav : '';
	 ?>
	<?php if ($nav == 'index'): ?>
		<a href="<?php echo base_url() ?>" class="nav_cur">首页</a>&nbsp;
		<a href="<?php echo base_url('/index.php/lost') ?>">失物信息</a>&nbsp;
		<a href="<?php echo base_url('index.php/find') ?>">招领信息</a>
	<?php elseif ($nav == 'lost'): ?>
		<a href="<?php echo base_url() ?>">首页</a>&nbsp;
		<a href="<?php echo base_url('/index.php/lost') ?>" class="nav_cur">失物信息</a>&nbsp;
		<a href="<?php echo base_url('index.php/find') ?>">招领信息</a>
	<?php elseif ($nav == 'find'): ?>
		<a href="<?php echo base_url() ?>">首页</a>&nbsp;
		<a href="<?php echo base_url('/index.php/lost') ?>">失物信息</a>&nbsp;
		<a href="<?php echo base_url('index.php/find') ?>" class="nav_cur">招领信息</a>
	<?php else: ?>
		<a href="<?php echo base_url() ?>">首页</a>&nbsp;
		<a href="<?php echo base_url('/index.php/lost') ?>">失物信息</a>&nbsp;
		<a href="<?php echo base_url('index.php/find') ?>">招领信息</a>		
	<?php endif ?>
    </div>
</div>