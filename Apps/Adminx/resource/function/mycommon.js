
/* listTable 隔行换色 */
jQuery(document).ready(function(){
jQuery(".listTable tr:odd").addClass("singleTr");
jQuery(".listTable tr:even").addClass("doubleTr");
jQuery(".listTable tr").hover(function(){
jQuery(this).addClass("hoverTr")
 },function(){
jQuery(this).removeClass("hoverTr")
});
});


/* 点击侧边栏名称变色，提示修改 */
function sideModifyActive(tag){
   $name = document.getElementById(tag);
   $name.className = "NameInput NameActive";
}


/* 直接跳转确认框 */
function isConfirm(url,text){

if(confirm(text))
    window.location=url;
else 
    return false;
}
//表单提交确认框
function formConfirm(surl,stext){
	if(confirm(stext)){
		$("#myform").attr("action",surl);
		$("#myform").submit();
	}
	else {return false;}
}

//表单直接提交
function formSubmit(surl){
	$("#myform").attr("action",surl);
	$("#myform").submit();
}

//列表关键字查询为空验证
function searchFormValidate(surl){
	iKeyword = document.getElementById("keyword");
	if (iKeyword.value == "" || iKeyword.value == "搜索...") {
		alert("请输入关键字");
		return false;
	}
	else{
	document.searchform.action=surl;
	document.searchform.submit();
	}
}


/* checkbox全选 */
function check_all(obj,cName) {
var checkboxs = document.getElementsByName(cName);
for(var i=0;i<checkboxs.length;i++){checkboxs[i].checked = obj.checked;}
}

/**
 * 页面Tab 选项卡
 *
 * @name   setTab
 * @author frontLon
 * @example <li id="one2" onclick="setTab('one',2,3,'hover')" >
 * 
 * @param  char		name		[按钮组名称，如上例，id为one2，则组名称为one]
 * @param  integer	cursel		[按钮排位，如上例，id为one2，则填写2]
 * @param  integer	n			[按钮组中按钮的总数]
 * @param  char		dishover	[点击后的样式名]
 * @return void
 *
 */
 
function setTab(name,cursel,n,dishover){
for(i=1;i<=n;i++){
var menu=document.getElementById(name+i);
var con=document.getElementById("con_"+name+"_"+i);
menu.className=i==cursel?dishover:"";
con.style.display=i==cursel?"block":"none";
}
}



/* div 模拟 select */
jQuery.divselect = function(divselectid,inputselectid,customid,customtext) {
$(divselectid+" p").click(function(){
    var ul = $(divselectid+" ul");
    if(ul.css("display")=="none"){
        ul.slideDown("fast");
    }else{
        ul.slideUp("fast");
    }
});

$(divselectid).blur(function(){
	var ul = $(divselectid+" ul");
	ul.slideUp("fast");
});
    
$(divselectid+" ul li a").click(function(){
    var txt = $(this).attr("name");
    var value = $(this).attr("rel");
    $(inputselectid).val(value);
	$(divselectid+" p").html(txt);
    $(divselectid+" ul").hide();

    //判断连接类型为custom时显示对应文本框
    if(customid != ""){
        var mycustom = $(customid);
    	if(value == customtext) {
		mycustom.attr("style", "display:block");
		mycustom.focus();
		}
		else {mycustom.attr("style", "display:none");}
    } 
});
};


/** 
 * 菜单设置用根据选项显示特有功能。
 */
function cateHide(type){
	switch(type){
		case "page" :
			$("#itype_page").show();
			$("#itype_article").hide();
			$("#tr_title").hide();
			$("#tr_url").hide();
			break;
		case "article" :
			$("#itype_article").show();
			$("#itype_page").hide();
			$("#tr_title").hide();
			$("#tr_url").hide();
			break;
		case "dir" :
			$("#itype_article").hide();
			$("#itype_page").hide();
			$("#tr_title").show();
			$("#tr_url").hide();
			break;
		case "url" :
			$("#itype_article").hide();
			$("#itype_page").hide();
			$("#tr_title").hide();
			$("#tr_url").show();
			break;
	}

}

//文本Tip提示框
//getTips(this,"文字","top","blue",3,240)
function getTips(myid,text,myposition,mystyle,mytime,mywidth){
	var myid;var text; var myposition;var mytimes;var mywidth;var mystyle;
	var TipsGride;var styleBg; var styleColor;
	if(!arguments[5]) mytime = 2; //时间
	if(!arguments[6]) mywidth = 300; //最大宽度
	//位置
	switch(myposition){
		case "up":TipsGride=0;break;
		case "right":TipsGride=1;break;
		case "down":TipsGride=2;break;
		case "left":TipsGride=3;break;
		default:TipsGride=0;break;
	}
	//样式
	switch(mystyle){
		case "blue":styleBg="#0FA6D8";styleColor="#fff";break;
		case "orange":styleBg="#F26C4F";styleColor="#fff";break;
		case "red":styleBg="#c00";styleColor="#fff";break;
		default:styleBg="#0FA6D8";styleColor="#fff";break;
	}
	layer.tips(text, myid, {
	    style: ['background-color:'+styleBg+'; color:'+styleColor+'', styleBg],
	    maxWidth:mywidth,
	    guide:TipsGride,
	    time:mytime
	});
}

//缓存清理弹出框
function popwindow_clear_cache(url,rtitle){
	$.layer({
	    type: 2,
	    maxmin: false,
	    shadeClose: true,
	    title: rtitle,
	    shade: [0.5,'#fff'],
	    offset: ['25%',''],
	    area: ['440px', '250px'],
	    iframe: {src: url}
	});
};
//站长收藏弹出框
function popwindow_favorite(url,rtitle){
	$.layer({
	    type: 2,
	    maxmin: false,
	    shadeClose: true,
	    title: rtitle,
	    shade: [0.5,'#fff'],
	    offset: ['25%',''],
	    area: ['440px', '250px'],
	    iframe: {src: url}
	});
};
//留言回复弹出框
function popwindow_reply(url,rname){
	$.layer({
	    type: 2,
	    maxmin: false,
	    shadeClose: false,
	    title: "回复 "+ rname +" 的留言",
	    shade: [0,'#fff'],
	    offset: ['25%',''],
	    area: ['620px', '340px'],
	    iframe: {src: url}
	});
};
//用户组授权用多选功能。
$(function (){
	$('input[name=check_all]').click(function(){
		var t = $('.auth_rule').find(':checkbox').prop('checked');
		$('.auth_rule').find(':checkbox').prop('checked', t);
		
	});
	$('input[level=1]').click(function(){
		var t = $(this).parents().find(':checkbox').prop('checked');
		var el = $(this).parents('.level_1').next();
		while($(el).attr('name') == 'level_2') {
			el.find(':checkbox').prop('checked', t);
			el = el.next();
		}
	});
	$('input[level=2]').click(function(){
		var inputs = $(this).parents('.level_2').find('input');
		$(this).attr('checked') ? inputs.attr('checked','checked') : inputs.removeAttr('checked');
	});
});