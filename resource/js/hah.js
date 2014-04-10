$('.los_detail>ul:even li').css('background',"#ddd");
$('.fin_detail>ul:even li').css('background',"#ddd");
for(var i = 0; i<=4; i++){
	$('.search_los_nav ul li').eq(i).css(
			"background",'#eee url('+getRootPath()+'/resource/img/tab_bgimg'+(i+1)+'.png) 10% 50% no-repeat'
		)
	$('.search_fin_nav ul li').eq(i).css(
			"background",'#eee url('+getRootPath()+'/resource/img/tab_bgimg'+(i+1)+'.png) 10% 50% no-repeat'
	)
}

$('#detail_span div').on('click',function(){
	  var search_page_kind = $(this).attr('name');
	  var search_page_num = $(this).children().text();
		var search_input = $('input[name="search_input"]').val();
		console.log(search_page_kind);
		//var search_thekind = $('.search_thekind').text();
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
				console.log("fin");
			}else if(search_page_kind=='l'){
				loadjs(getRootPath()+'/resource/js/hah.js');
				$('.los_detail').html(msg);
				console.log(msg);
				console.log("los");
			}

				console.log('success');
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
console.log('hello');

function page_effect(){
	var i = 0;
	// var cur_page = document.getElementById("cur_page").innerHTML;
 //  var detail_span = document.getElementById('detail_span');
 //  var span_length = detail_span.childNodes.length;

  var cur_page = $('#cur_page').html();
  var detail_span = $('#detail_span');
  var span_length = detail_span.children().length;
    for(var j=0;j<=span_length;j++)
    {
    	if(j==cur_page-1){
	        //detail_span.children[cur_page-1].onmouseover = function(){
	        	detail_span.children().eq(cur_page-1).mouseover(function(){
	            var a = this.children().eq(0);
	            paging_style(a,"#eee","#ef4d4e");    // console.log(this.nodeName);  this.nodeName 与this.tagName结果一样
	            this.mouseout(function()
	            {
	                paging_style(a,"#eee","#ef4d4e");
	            });
	        });
    	}else{
    		//detail_span.children[j].onmouseover = function(){
    			detail_span.children().eq(j).mouseover(function(){
	            var a = this.children().eq(0);
	            paging_style(a,"#eee","#ef4d4e");    // console.log(this.nodeName);  this.nodeName 与this.tagName结果一样
	            this.mouseout(function()
	            {
	                paging_style(a,"#ef4d4e","#eee");
	            });
	        });
    	}
    }
}    
 function paging_style( obj,scolor,sbgcolor){
        obj.style.color = scolor;
        obj.style.backgroundColor = sbgcolor;
    }
page_effect();
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