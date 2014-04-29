KindEditor.ready(function(K) {
	var options = {
		themeType: 'simple',
		height: '200px',
		width: '420px',
		filterMode: true,
		items: ['fontsize', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline', 'strikethrough',
				'link', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
				'insertunorderedlist', 'emoticons', 'image', 'removeformat']
	};
	window.editor = K.create('#editor', options);
});