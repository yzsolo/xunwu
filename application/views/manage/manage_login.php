<html>
	<head></head>
	<body background="<?php echo base_url('/resource/img/1.jpg') ?>">
		<form method='post' action="<?php echo base_url('index.php/manage/manage_imf') ?>">
			<label for='name'>账号:</label>
			<input type='text' name='user'>
			<label for="password">密码:</label>
			<input type='password' name='pass'>
			<input type='submit' value='login'>
		</form>	
	</body>
</html>
