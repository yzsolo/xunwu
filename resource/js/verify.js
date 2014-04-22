$(document).ready(function() {
	$(".i_find_btn").click(function(){
		//$(".i_find_btn_box").hide();
		$(".verify").fadeIn();
		return false;
	});

	var action = $('#verifyForm').attr('action');	// 验证码提交的页面

	$("#verifyForm").submit(function(e){	// ajax post
		$.post(action+'/verify',{
			'verify-input' : $('#verify-input').val()
		},function(data, textStatus){
			alert(data);
		});	
		e.preventDefault();		// 阻止默认表单提交
	});

	$("#verifyForm img")
	.attr('title', "换一张")
	.css('cursor', "pointer")
	.click(function(){
		$.post(action+'/refresh',{
			'verify-input' : $('#verify-input').val()
		},function(data, textStatus){
			$("#verifyForm").find('img').attr('src', data);
		});
	});
});