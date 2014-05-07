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
	<script src="<?php echo base_url('/resource/js/jquery.js') ?>"></script> 

	<script src="<?php echo base_url('/resource/js/index.js') ?>"></script>

	<meta name="description" content="<?php 
			if (isset($description)) {
				echo $description;
			} else {
				echo "";
			}
			
		 ?>">
</head>
<body>
<div id="top">
	<img src="<?php echo base_url('/resource/img/logo.png') ?>" alt="">
</div>
<div id="nav_box">
	<div class="nav">
		<a href="<?php echo base_url('/index.php/manage/manage_lost') ?>">失物信息</a>
		<a href="<?php echo base_url('index.php/manage/manage_find') ?>">招领信息</a>		
	</div>
</div>
