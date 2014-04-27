for (var i = 0; i<=4; i++){
	$('.search_los_nav ul li').eq(i).css(
			"background",'#eee url('+getRootPath()+'/resource/img/tab_bgimg'+(i+1)+'.png) 10% 50% no-repeat'
		)
	$('.search_fin_nav ul li').eq(i).css(
			"background",'#eee url('+getRootPath()+'/resource/img/tab_bgimg'+(i+1)+'.png) 10% 50% no-repeat'
	)
}

$('.paging_box span').on('click',function(){
		var search_page_kind = $(this).attr('name');
		var search_page_num = $(this).text();

		if (search_page_num =='上一页'){
			search_page_num = $('.loc_span').prev().text();
		}

		if (search_page_num =='下一页'){
			search_page_num = $('.loc_span').next().text();
		}
		var search_input = $('input[name="search_input"]').val();

		$.ajax({
			type:"post",
			url:getRootPath()+"/index.php/defaults/search_paging",
			data:{
				search_page_num:search_page_num,
				search_page_kind:search_page_kind,
				search_input:search_input
			},
			success:function(msg){
			if(search_page_kind=='f'){
				loadjs(getRootPath()+'/resource/js/hah.js');
				$('.fin_detail').html(msg);
			}else if(search_page_kind=='l'){
				loadjs(getRootPath()+'/resource/js/hah.js');
				$('.los_detail').html(msg);
			}
				page_effect();
			}
		})
	});

$('.search_f').on('click',function(){
		// $('.search_thekind').text('f');
		$(this).css({
			'background-image':'url('+getRootPath()+'/resource/img/tab_img_down.png)',
			'background-color':'#eee'
	  });
		$('.search_l').css({
		  'background-image':'url('+getRootPath()+'/resource/img/tab_img_up.png)',
		  'background-color':'#fff'
		})
		$('.search_find_con').show().next().hide();
	});

	$('.search_l').on('click',function(){
				// $('.search_thekind').text('l');
		$(this).css({
			'background-image':'url('+getRootPath()+'/resource/img/tab_img_down.png)',
			'background-color':'#eee'
	  });
		$('.search_f').css({
		  'background-image':'url('+getRootPath()+'/resource/img/tab_img_up.png)',
		  'background-color':'#fff'
		})
		$('.search_lost_con').show().prev().hide();
	});

$('#search_box').next().remove();

/*页码样式*/
page_effect();
function page_effect(){
    $('.loc_span').css({'color':'#fff','background':'#ef4d4e'});    
}    

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