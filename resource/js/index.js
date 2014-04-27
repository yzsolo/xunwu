$(document).ready(function(){
 
 	$('input[name=search_input]').focus(function(){
 		$(this).keypress(function(){
 			if(event.keyCode == 13){
 				// $('.search_btn').on('click',function(){
				var search_input = $('input[name="search_input"]').val();
				console.log(search_input);
				$.ajax({
					type:"post",
					url:getRootPath()+"/index.php/defaults/search_result",
					data:{
						search_input:search_input
					},
					success:function(msg){
						console.log("success");
						$('#nav_box').next().html(msg);
						loadjs(getRootPath()+'/resource/js/hah.js');
						ul_style();
						page_effect();
				        
					}
				})
 			}
 		})
 	})
	
 	$('.search_btn').on('click',function(){
				var search_input = $('input[name="search_input"]').val();
				console.log(search_input);
				$.ajax({
					type:"post",
					url:getRootPath()+"/index.php/defaults/search_result",
					data:{
						search_input:search_input
					},
					success:function(msg){
						console.log("success");
						$('#nav_box').next().html(msg);
						loadjs(getRootPath()+'/resource/js/hah.js');
						ul_style();
						page_effect();
					}
				})
			});



	//test
	$('.send_msg').on('click',function(){
		var text_area = $('.write_msg textarea').val(),
		    response_name = $('.write_msg input[name="your_name"]').val(),
		    contact_imf = $('.write_msg input[name="contact_imf"]').val();
		console.log(text_area);
		$('<div class="response_div"><p class="response"><span class="response_span">'+response_name+" : </span><span>"+text_area+'</span></p></div>').insertBefore('.write_msg');
		return false;
	})


	$('.ind_tab_lost').mousedown(function(){
		$('.ind_tab_lost_con').css("display",'block');
		$('.ind_tab_find_con').css("display",'none');
		$(this).css({
			"background-color":'#eee',
			"background-image":'url(resource/img/tab_img_down.png)'
		});
		$(".ind_tab_find").css({
			"background-color":"#fff",
			"background-image":'url(resource/img/tab_img_up.png)'
		});
	});

	$(".i_find_btn,.i_respond,.send_msg,.i_lost,.i_find,.descri_fin_con .things_submit_f,.descri_fin_con .things_submit_l").mouseenter(function(){
		$(this).css("background-color","#e3170d");
	}).mouseleave(function(){
		$(this).css("background-color","#ff6766");
	})

	$('.ind_tab_find').mousedown(function(){
		$('.ind_tab_lost_con').css("display",'none');
		$('.ind_tab_find_con').css("display",'block');
		$(this).css({
			"background-color":'#eee',
			"background-image":"url(resource/img/tab_img_down.png)"
		   
		});
		$(".ind_tab_lost").css({
			"background-color":"#fff",
			"background-image":'url(resource/img/tab_img_up.png)'
		});
	});


	/*表单验证 start*/
	$(".things_style input[name=name_f]").blur(function(){
		flag_name = this.value==""?false:true,str = "input[name=name_f]+div";
		flag_style(flag_name,str);
	})

	$(".things_style input[name=locale_f]").blur(function(){
		flag_locale = this.value==""?false:true,str = "input[name=locale_f]+div";
		flag_style(flag_locale,str);
	})

	$(".things_style input[name=finder_f]").blur(function(){
		flag_finder = this.value==""?false:true,str = "input[name=finder_f]+div";
		flag_style(flag_finder,str);
	})

	$(".kind select[name=kind_f]").blur(function(){
		flag_kind = this.value=="选择类型"?false:true, str = "select[name=kind_f]+div";
		flag_style(flag_kind,str);
	})

	$(".things_style input[name=telnum_f]").blur(function(){
		var reg = new RegExp("^1[3|5|8]{1}[0-9]{9}$");
		 flag_telnum = reg.test(this.value), str = "input[name=telnum_f]+div";
		flag_style(flag_telnum,str);
	})

	$(".things_style input[name=email_f]").blur(function(){
		var reg = new RegExp("^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+((\.[a-zA-Z0-9_-]{2,3}){1,2})$");
		 flag_email = reg.test(this.value), str = "input[name=email_f]+div";
		flag_style(flag_email,str);
	})

	$(".things_style input[name=qq_f]").blur(function(){
		var reg = new RegExp("^[1-9]{1}[0-9]{4,10}$");
		 flag_qq = reg.test(this.value), str = "input[name=qq_f]+div";
		flag_style(flag_qq,str);
	})

	$('.things_submit_l').click(function(){
		var kind_f = $(".kind select[name=kind_f]").val(),
			name_f = $("input[name=name_f]").val(),
			locale_f = $("input[name=locale_f]").val(),
			finder_f = $("input[name=finder_f]").val(),
			telnum_f = $("input[name=telnum_f]").val(),
			email_f = $("input[name=email_f]").val(),
			qq_f = $("input[name=qq_f]").val(),
			descri_f = $("textarea[name=descri_f]").val()
		var flag = flag_kind&flag_name&flag_locale&flag_finder&flag_telnum&flag_email&flag_qq;
		if(flag){
			$.ajax({
				type:"POST",
				url:getRootPath()+"/index.php/descri_lost/imformation",
				data:{
					kind_f:kind_f,
					name_f:name_f,
					locale_f:locale_f,
					finder_f:finder_f,
					telnum_f:telnum_f,
					email_f:email_f,
					qq_f:qq_f,
					descri_f:descri_f
				},
				success:function(msg){
					alert("提交成功");
					window.location.href=getRootPath()+"/index.php";
			    }
			})
		}
	})

	$('.things_submit_f').click(function(){
		var kind_f = $(".kind select[name=kind_f]").val(),
			name_f = $("input[name=name_f]").val(),
			locale_f = $("input[name=locale_f]").val(),
			finder_f = $("input[name=finder_f]").val(),
			telnum_f = $("input[name=telnum_f]").val(),
			email_f = $("input[name=email_f]").val(),
			qq_f = $("input[name=qq_f]").val(),
			descri_f = $("textarea[name=descri_f]").val()
		var flag = flag_kind&flag_name&flag_locale&flag_finder&flag_telnum&flag_email&flag_qq;
		if(flag){
			$.ajax({
			type:"POST",
			url:getRootPath()+"/index.php/descri_find/imformation",
			data:{
				kind_f:kind_f,
				name_f:name_f,
				locale_f:locale_f,
				finder_f:finder_f,
				telnum_f:telnum_f,
				email_f:email_f,
				qq_f:qq_f,
				descri_f:descri_f
			},
			success:function(msg){
				alert("提交成功");
				window.location.href=getRootPath()+"/index.php";
		    }
			})
		}
	})

	var flag_style = function(flag,str){
		if(flag){
			$(str).removeClass("wrong_img").addClass("right_img");
			console.log("right");
		}else{
			$(str).removeClass("right_img").addClass("wrong_img");
			console.log("wrong");
		}
	}
	/*表单验证 end*/



	// nav_img_show();
	function nav_img_show(){
		$('.los_nav ul li').eq(i).css(
			"background",'#eee url(../../resource/img/tab_bgimg'+(i+1)+'.png) 10% 50% no-repeat'
		)
		$('.fin_nav ul li').eq(i).css(
			"background",'#eee url(../../resource/img/tab_bgimg'+(i+1)+'.png) 10% 50% no-repeat'
		)
	}
	var lost_nav = Array('110','140','140','140','140');
	for(var i=0;i<=4;i++){
		$('.los_nav ul li').eq(i).css("width",lost_nav[i]+"px");
		$('.fin_nav ul li').eq(i).css("width",lost_nav[i]+"px");
	}
	/*tab bg_img end*/


	$('.fin_tab_select').change(function(){
		 var kind = $(this).val();
		 var flag = 1;
		$.ajax({
			type:"POST",
			url:getRootPath()+"/index.php/find/page_find_kind",
			data:{
				fkind:kind,
				flag:flag
			},
			success:function(msg){
				// console.log("hah");
			   $(".fin_detail").html(msg);
			   $('.fin_detail>ul:even li').css('background',"#ddd");
			   ul_style();
			   page_effect();
		    }
		})
	})

	$('.los_tab_select').change(function(){
		 var kind = $(this).val();
		 var flag = 1;
		$.ajax({
			type:"POST",
			url:getRootPath()+"/index.php/lost/page_lost_kind",
			data:{
				lkind:kind,
				flag:flag
			},
			success:function(msg){
			   $(".los_detail").html(msg);
			   $('.los_detail>ul:even li').css('background',"#ddd");
			   ul_style();
			   page_effect();
			   // console.log(msg[cur_page]);
		    }
		})
	})
	function ul_style(){
		console.log('jaj');
		$('.fin_detail>ul:even>li,.los_detail>ul:even>li').css('background','#eee');
		// $('.los_detail>ul:even>li').css('background','#eee');

	}


/*页码样式*/
page_effect();
function page_effect(){

    $('.loc_span').css({'color':'#fff','background':'#ef4d4e'});
}    
/*end*/



function loadjs(path)
{
	var script = document.createElement("script");
	script.setAttribute('src',path);
	document.getElementsByTagName('head')[0].appendChild(script);
}

	function getRootPath() //得到网站的根目录
  { 
	var strFullPath=window.document.location.href; 
	var strPath=window.document.location.pathname; 
	var pos=strFullPath.indexOf(strPath); 
	var prePath=strFullPath.substring(0,pos); 
	var postPath=strPath.substring(0,strPath.substr(1).indexOf('/')+1); 
	return(prePath+postPath); 
  } 
})