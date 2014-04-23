/*验证码处理*/
$(document).ready(function() {
	$(".i_find_btn").click(function(){
		$(".verify").fadeIn();	// 点击按钮隐藏表单出现
		return false;
	});

	var action = $('#verifyForm').attr('action');	// 验证码处理的控制器页面

	$("#verifyForm").submit(function(e){	// ajax post
		$.post(action+'/verify',{
			'verify-input': $('#verify-input').val(),	// 验证码
			'verify-table': $('#verify-table').val(),	// 表
			'verify-id': $('#verify-id').val()	// 信息的id
		},function(data, textStatus){
			if (data.status === "1") {	// 验证码正确则显示联系方式
				$(".i_find_btn").text("联系方式");
				var phonehtml = "<p>手机："+data.phone+"</p>";
				$("#verifyForm").replaceWith(phonehtml);
			}
			else{	// 错误，给出提示
				$("#verifyForm span").text("验证码错误！");
			}
		}, "json");
		e.preventDefault();		// 阻止默认表单提交
	});

	$("#verifyForm img")	// 点击换一张验证码
	.attr('title', "换一张")
	.css('cursor', "pointer")
	.click(function(){
		$.get(action+'/refresh',{
		},function(data, textStatus){
			$("#verifyForm").find('img').attr('src', data);
		});
	});
});