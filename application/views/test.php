<div>
	<?php 
		// echo $image; 
		// echo $_SESSION['yanzhen'];

	?>
	<div class="verify">
		<form action="<?php echo base_url('index.php/test/verify') ?>" method="POST" id="myForm">
			<label for="verify-input">验证码：</label><input type="text" name="verify-input" id="verify-input" />
			<?php echo $image; ?>
			<input type="button" value="提交" id="send"/>
		</form>
	</div>
</div>