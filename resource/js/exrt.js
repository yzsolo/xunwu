// 百度分享
window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdMiniList":false,"bdPic":"","bdStyle":"1","bdSize":"24"},"share":{}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];
//搜狐畅言
(function(){
	var appid = 'cyr3uFE2C',
	conf = 'prod_aba49b6369ec3a9497c9c54696f6a3fd';
	var doc = document,
	s = doc.createElement('script'),
	h = doc.getElementsByTagName('head')[0] || doc.head || doc.documentElement;
	s.type = 'text/javascript';
	s.charset = 'utf-8';
	s.src =  'http://assets.changyan.sohu.com/upload/changyan.js?conf='+ conf +'&appid=' + appid;
	h.insertBefore(s,h.firstChild);
	window.SCS_NO_IFRAME = true;
})()
//去掉头像下面的金币
window.onload = function() {
	$(".head-gold-w").remove();
	$(".menu-box-bd-gold").remove();
	$(".i_respond_box").click(function(){
		$(".wrap-text-f").click();
		$(".textarea-fw").focus();
		$(".head-gold-w").remove();
	});
};