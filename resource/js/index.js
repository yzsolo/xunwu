$(document).ready(function(){
 
	var event_bind = {

		eve_describe: {
			'input[name=search_input] focus': 'focus',
			'.search_btn click': 'search_btn',
			'.ind_tab_lost mousedown': 'ind_tab_lost',
			'.ind_tab_find mousedown': 'ind_tab_find',
			'input[name=name_f] blur': 'check_name_f',
			'input[name=locale_f] blur': 'check_local_f',
			'input[name=finder_f] blur': 'check_finder_f',
			'select[name=kind_f] blur': 'check_kind_f',
			'input[name=telnum_f] blur': 'check_telnum_f',
			'.things_submit_l click': 'things_submit_l',
			'.things_submit_f click': 'things_submit_f',
			'.fin_tab_select change': 'fin_tab_select_change',
			'.los_tab_select change': 'los_tab-select_change'
		},

		eve_bind: function(){
			for (var key in this.eve_describe) {

				if(this.eve_describe.hasOwnProperty(key)){
					var callback = this.eve_describe[key],
					ele_eve = key.split(' '),
					ele = ele_eve[0],
					eve = ele_eve[1];

					$(ele).on(eve,this.eve_detail[callback]);
				}
			}
		},

		eve_detail: {

			focus : function() {
				$(this).keypress(function(){
		 			if(event.keyCode == 13){
						var search_input = $('input[name="search_input"]').val();
						$.ajax({
							type:"post",
							url:getRootPath()+"/index.php/defaults/search_result",
							data:{
								search_input:search_input
							},
							success:function(msg){
								$('#nav_box').next().html(msg);
								loadjs(getRootPath()+'/resource/js/hah.js');
								ul_style();
								page_effect();
						        
							}
						})
		 			}
		 			$('#nav_box a').removeClass('nav_cur');
		 		})
			},
			search_btn : function() {
				var search_input = $('input[name="search_input"]').val();
				$.ajax({
					type:"post",
					url:getRootPath()+"/index.php/defaults/search_result",
					data:{
						search_input:search_input
					},
					success:function(msg){
						$('#nav_box').next().html(msg);
						loadjs(getRootPath()+'/resource/js/hah.js');
						ul_style();
						page_effect();
					}
				})
				$('#nav_box a').removeClass('nav_cur');
			},
			ind_tab_lost : function() {
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
			},
			ind_tab_find : function() {
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
			},
			check_name_f : function() {
				flag_name = this.value==""?false:true,str = "input[name=name_f]+div";
				flag_style(flag_name,str);
			},

			check_local_f : function() {
				flag_locale = this.value==""?false:true,str = "input[name=locale_f]+div";
				flag_style(flag_locale,str);
			},

			check_finder_f : function() {
				flag_finder = this.value==""?false:true,str = "input[name=finder_f]+div";
				flag_style(flag_finder,str);
			},

			check_kind_f : function() {
				flag_kind = this.value=="选择类型"?false:true, str = "select[name=kind_f]+div";
				flag_style(flag_kind,str);
			},

			check_telnum_f : function() {
				var reg = new RegExp("^1[3|5|8]{1}[0-9]{9}$");
				flag_telnum = reg.test(this.value), str = "input[name=telnum_f]+div";
				flag_style(flag_telnum,str);
			},

			things_submit_l : function() {
				editor.sync();
				var kind_f = $(".kind select[name=kind_f]").val(),
					name_f = $("input[name=name_f]").val(),
					locale_f = $("input[name=locale_f]").val(),
					finder_f = $("input[name=finder_f]").val(),
					telnum_f = $("input[name=telnum_f]").val(),
					descri_f = $("textarea[name=descri_f]").val();
				var flag = flag_kind&flag_name&flag_locale&flag_finder&flag_telnum;
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
							descri_f:descri_f
						},
						success:function(msg) {
							alert("提交成功");
							window.location.href=getRootPath()+"/index.php";
					    }
					})
				}
			},

			things_submit_f : function() {
				editor.sync();
				var kind_f = $(".kind select[name=kind_f]").val(),
					name_f = $("input[name=name_f]").val(),
					locale_f = $("input[name=locale_f]").val(),
					finder_f = $("input[name=finder_f]").val(),
					telnum_f = $("input[name=telnum_f]").val(),
					descri_f = $("textarea[name=descri_f]").val();
				var flag = flag_kind&flag_name&flag_locale&flag_finder&flag_telnum;
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
						descri_f:descri_f
					},
					success:function(msg) {
						alert("提交成功");
						window.location.href=getRootPath()+"/index.php";
				    }
					})
				}
			},

			fin_tab_select_change : function() {
				var kind = $(this).val();
				var flag = 1;
				$.ajax({
					type:"POST",
					url:getRootPath()+"/index.php/find/page_find_kind",
					data:{
						fkind:kind,
						flag:flag
					},
					success:function(msg) {
					   $(".fin_detail").html(msg);
					   $('.fin_detail>ul:even li').css('background',"#ddd");
					   ul_style();
					   page_effect();
				    }
				})
			},

			los_tab_select_change : function() {
				var kind = $(this).val();
				var flag = 1;
				$.ajax({
					type:"POST",
					url:getRootPath()+"/index.php/lost/page_lost_kind",
					data:{
						lkind:kind,
						flag:flag
					},
					success:function(msg) {
					   $(".los_detail").html(msg);
					   $('.los_detail>ul:even li').css('background',"#ddd");
					   ul_style();
					   page_effect();
				    }
				})
			}
		}

	}

	event_bind.eve_bind();



	$(".i_find_btn,.i_respond,.send_msg,.i_lost,.i_find,.descri_fin_con .things_submit_f,.descri_fin_con .things_submit_l").mouseenter(function(){
		$(this).css("background-color","#e3170d");
	}).mouseleave(function() {
		$(this).css("background-color","#ff6766");
	})

	

	var flag_style = function(flag,str){
		if(flag) {
			$(str).removeClass("wrong_img").addClass("right_img");
			console.log("right");
		} else {
			$(str).removeClass("right_img").addClass("wrong_img");
			console.log("wrong");
		}
	}
	/*表单验证 end*/



	// nav_img_show();
	function nav_img_show() {
		$('.los_nav ul li').eq(i).css(
			"background",'#eee url(../../resource/img/tab_bgimg'+(i+1)+'.png) 10% 50% no-repeat'
		)
		$('.fin_nav ul li').eq(i).css(
			"background",'#eee url(../../resource/img/tab_bgimg'+(i+1)+'.png) 10% 50% no-repeat'
		)
	}
	var lost_nav = ['110','140','140','140','140'];
	for(var i=0;i<=4;i++) {
		$('.los_nav ul li').eq(i).css("width",lost_nav[i]+"px");
		$('.fin_nav ul li').eq(i).css("width",lost_nav[i]+"px");
	}
	
	function ul_style() {
		$('.fin_detail>ul:even>li,.los_detail>ul:even>li').css('background','#eee');
	}


	/*页码样式*/
	page_effect();
	function page_effect() {
		$('.loc_span').css({'color':'#fff','background':'#ef4d4e'});
	}    
	/*end*/


	function loadjs(path) {
		var script = document.createElement("script");
		script.setAttribute('src',path);
		document.getElementsByTagName('head')[0].appendChild(script);
	}

	function getRootPath() { //得到网站的根目录 
		var strFullPath = window.document.location.href,
		    strPath = window.document.location.pathname, 
		    pos = strFullPath.indexOf(strPath),
		    prePath = strFullPath.substring(0,pos), 
		    postPath = strPath.substring(0,strPath.substr(1).indexOf('/') + 1);
		return(prePath + postPath); 
	} 
})