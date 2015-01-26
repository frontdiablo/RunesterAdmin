//清理缓存
function ajax_clear_cache(dir,type){
	var dir;
	var type;
	$.post(AjaxClearCacheUrl,{
	'type' : type,
	'dir'  : dir,
	 },function (data){	//Ajax返回值
	 alert(data.msg);
	 }, 'json');
}

/*
//Ajax
$('#iSubmit').click(
	function (){
		var formData = new Array();
		formData["type"] = $('input[name=cateAdd_type]')
		$.post(AjaxGGUrl,{
		'type'	: formData["type"].val(),
		 },function (data){	//Ajax返回值

	 	if(data.status){ //提交成功

		 	alert("成功！");
		 }, 'json');
		 });

//模板
function setAjaxPrepend(data,container){
	var str;
	str  = '<div class="guestBook" id="newPub">';
	str += '<div class="Head"><img src="/home/resource/images/guest_sex_' + data.BookSex + '.png" /></div>';
	str += '<div class="Content">';
	str += '<div class="Title"><a href="javascript:void(0)" class="GBblue" onfocus="this.blur()">' + data.BookUsername + '</a> 发表于 <a href="javascript:void(0)" class="GBblue" onfocus="this.blur()">' + data.BookPublishDate + '</a></div>';
	str += data.BookContent; 
	str += '</div><div class="clear"></div></div>';
	$(container).prepend(str);
	jQuery('#newPub').fadeOut(500).fadeIn(500);
}
*/