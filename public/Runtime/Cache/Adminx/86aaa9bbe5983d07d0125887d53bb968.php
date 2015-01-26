<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=7" />
<title>RunesterAdmin</title>
<link href="/Apps/Adminx/resource/style/reset.css" rel="stylesheet" type="text/css" />
<link href="/Apps/Adminx/resource/style/style.css" rel="stylesheet" type="text/css" />
<link href="/Apps/Adminx/resource/style/btn.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="/Apps/Adminx/resource/function/jquery-1.7.2.min.js"></script>
<script type="text/javascript">
EDITROOT = "/Apps/Adminx/resource/function/editor"; //编辑器
</script>
<?php
$DateActive = "onfocus=\"WdatePicker({isShowClear:false,readOnly:false,dateFmt:'yyyy-MM-dd HH:mm:ss'})\""; $must = "<span class='must'>*&nbsp;</span>"; ?>
<link rel="stylesheet" href="/Apps/Adminx/resource/function/editor/themes/default/default.css" />
<script type="text/javascript" src="/Apps/Adminx/resource/function/editor/kindeditor-min.js"></script>
</head>
<body>
<div id="HeaderTop">
<img src="/Apps/Adminx/resource/images/logo.png" />
<div class="HeaderTopFunBtnNav">
<a href="/index.php" target="_blank" class="HeaderTopFunBtn HeaderTopFunBtnHome" title="<?php echo (L("HEADER_BTN_BROWSE")); ?>"></a>
<?php if(returnAuth($Thik.MODULE_NAME.'/Cache/clear_cache')): ?><a href="javascript:void(0)" onclick='popwindow_clear_cache("<?php echo U('Cache/index');?>","<?php echo (L("HEADER_BTN_CLEAR_CACHE")); ?>")' class="HeaderTopFunBtn HeaderTopFunBtnClear" title="<?php echo (L("HEADER_BTN_CLEAR_CACHE")); ?>"></a><?php endif; ?>



<a href="javascript:void(0)" onclick='popwindow_favorite("<?php echo U('Favorite/header_display');?>","<?php echo (L("HEADER_BTN_FAVORITE")); ?>")' class="HeaderTopFunBtn HeaderTopFunBtnFavorite" title="<?php echo (L("HEADER_BTN_FAVORITE")); ?>"></a>
<a href="javascript:void(0)" id="favorite" class="HeaderTopFunBtn HeaderTopFunBtnHelp" title="<?php echo (L("HEADER_BTN_HELP")); ?>"></a>


<a href="<?php echo U('Index/LoginOut');?>" class="HeaderTopFunBtn HeaderTopFunBtnExit" title="<?php echo (L("HEADER_BTN_QUIT")); ?>"></a>
</div>
<div class="clear"></div>
</div>

<table class="ContainerTable">
<tr>
<td class="ContainerLeft"><div class="logoContainer">
<a href="<?php echo U('Admin/edit');?>"><img src="/./public/image/head/<?php echo ($admin_head); ?>" class="sidebarLogo radius" /></a>
<a href="<?php echo U('Admin/edit');?>" class="nameLink">

<?php if($admin_nickname != ''): echo ($admin_nickname); ?>
<?php else: ?>
<?php echo ($admin_username); endif; ?>



</a>
</div>
<ul>

<?php if(returnAuth($Thik.MODULE_NAME.'/Page/index')): ?><li><a href="<?php echo U('Page/index');?>" class="sidebarBtn btnPage <?php echo ($sideactive["page"]); ?>"></a></li><?php endif; ?>

<?php if(returnAuth($Thik.MODULE_NAME.'/Article/index')): ?><li><a href="<?php echo U('Article/index');?>" class="sidebarBtn btnArticle <?php echo ($sideactive["article"]); ?>"></a></li><?php endif; ?>


<li><a href="<?php echo U('Guestbook/index');?>" class="sidebarBtn btnGuestbook"></a></li>

<?php if(returnAuth($Thik.MODULE_NAME.'/Admin/index')): ?><li><a href="<?php echo U('Admin/index');?>" class="sidebarBtn btnUser <?php echo ($sideactive["admin"]); ?>"></a></li><?php endif; ?>

<?php if(returnAuth($Thik.MODULE_NAME.'/AdminRule/index')): ?><li><a href="<?php echo U('AdminRule/index');?>" class="sidebarBtn btnRule <?php echo ($sideactive["rule"]); ?>"></a></li><?php endif; ?>

<?php if(returnAuth($Thik.MODULE_NAME.'/Nav/index')): ?><li><a href="<?php echo U('Nav/index');?>" class="sidebarBtn btnNav <?php echo ($sideactive["nav"]); ?>"></a></li><?php endif; ?>

<?php if(returnAuth($Thik.MODULE_NAME.'/Config/web')): ?><li><a href="<?php echo U('Config/web');?>" class="sidebarBtn btnSetting <?php echo ($sideactive["config"]); ?>"></a></li><?php endif; ?>

<li><a href="<?php echo U('Index/LoginOut');?>" class="sidebarBtn btnQuit "></a></li>

<!--

<li><a href="<?php echo U('Article/index');?>" class="sidebarBtn btnPlugin"></a></li>
-->
</ul>
</td>
<td class="ContainerRight">
<div id="pageTitle">
<h1><?php echo (L("PAGETITLE_ARTICLE_ADD")); ?></h1>
</div>
<div id="pageTitleBottom"></div>
<ul class="navButton">
<li><a href='/index.php/Adminx/Article/add' class='articleBtn navButton1'><?php echo (L("NAVBTN_ARTICLE_ADD")); ?></a></li>
<li><a href='/index.php/Adminx/Article/index' class='articleBtn navButton2'><?php echo (L("NAVBTN_ARTICLE_INDEX")); ?></a></li>
<li><a href='/index.php/Adminx/Article/recyclebin' class='articleBtn navButton3'><?php echo (L("NAVBTN_ARTICLE_RECYCLE")); ?></a></li>

<div class="clear"></div>
</ul>
<div class="clear"></div>

<div id="basic-accordian" >

<form enctype="multipart/form-data" method="POST" name="myform"  action="/index.php/Adminx/Article/insert">
<div class="TabTitle">
<ul>
<li id="one1" onclick="setTab('one',1,3,'hover')" class="hover"><?php echo (L("TAB_BASIC")); ?></li>
<li id="one2" onclick="setTab('one',2,3,'hover')" ><?php echo (L("TAB_SEO")); ?></li>
<li id="one3" onclick="setTab('one',3,3,'hover')"><?php echo (L("TAB_OTHER")); ?></li>
</ul>
</div>

<div id="con_one_1" class="hover">
<!-- Tab 1 -->

<table class="listTable" id="listTable">
<tr>
<td class="titleTd"><?php echo ($must); echo (L("FIELD_TITLE")); ?></td>
<td class="inputTd">
<input type="text" class="input" name="title" />
<?php if(C('HIDE_FIELD.ARTICLE_TITLE_COLOR') != 'true'): ?>
		<input type='text' id='ititleColor'  class='input colorInput' value='标题颜色' readonly='readonly' style=''  />
		<input type='hidden' id='titleColor' name='titleColor' value='' />
		<script type='text/javascript'>
			KindEditor.ready(function(K) {
			var colorpicker;
			K('#ititleColor').bind('click', function(e) {
				e.stopPropagation();
				if (colorpicker) {
					colorpicker.remove();
					colorpicker = null;
					return;
			}
			var colorpickerPos = K('#ititleColor').pos();
			colorpicker = K.colorpicker({
				x : colorpickerPos.x,
				y : colorpickerPos.y + K('#ititleColor').height(),
				z : 19811214,
				selectedColor : 'default',
				noColor : '默认颜色',
				click : function(color) {
					K('#titleColor').val(color);
					K('#ititleColor').attr("style", "background:"+color);
					colorpicker.remove();
					colorpicker = null;
				}
			});
			});
			K(document).click(function() {
						if (colorpicker) {
					colorpicker.remove();
					colorpicker = null;
				}
			});
		});
		</script><?php endif; ?>
</td>
</tr>
<?php if(C('HIDE_FIELD.ARTICLE_ALIAS') != 'true'): ?><tr>
<td class="titleTd"><?php echo (L("FIELD_ALIAS")); ?></td>
<td class="inputTd">
<input type="text" class="input" name="alias" /><?php echo (C("HIDE_FIELD.ARTICLE_ALIAS")); ?>
</td>
</tr><?php endif; ?>

<tr>
<td class="titleTd"><?php echo ($must); echo (L("FIELD_CATE")); ?></td>
<td class="inputTd">
<script>$(function(){ $.divselect("#ipid","#pid"); });</script>
        <div id="ipid" class="dropdown" tabindex="0" style="" ><p>请选择所属分类</p><ul  class="" style=""><?php echo getCate("Article");?></ul></div> 
        <input type="hidden" id="pid" name="pid" value="" />
</td>
</tr>
<tr>
<td class="titleTd"><?php echo ($must); echo (L("FIELD_DATE")); ?></td>
<td class="inputTd">
<input type="text" class="input dateInput" name="pubDate" value="<?php echo ($cudate); ?>" <?php echo ($DateActive); ?> />
</td>
</tr>
<tr>
<td class="titleTd"><?php echo (L("FIELD_INFO")); ?></td>
<td class="inputTd">
<?php echo (L("FIELD_ARTICLE_SOURCE")); ?><input type="text" class="input" name="source" value="" />
&#12288;&#12288;<?php echo (L("FIELD_AUTHOR")); ?><input type="text" class="input dateInput" name="author" value="<?php echo ($author); ?>" />
<input type="hidden" name="author_id" value="<?php echo (session('admin_id')); ?> " />
</td>
</tr>
<tr>
<td class="titleTd"><?php echo ($must); echo (L("FIELD_STATE")); ?></td>
<td class="inputTd">
<?php echo (L("FIELD_TARGET")); ?>
<script>$(function(){ $.divselect("#itarget","#target"); });</script>
        <div id="itarget" class="dropdown" tabindex="0" style="" ><p><?php echo getTarget("_blank");?></p><ul  class="" style=""><?php echo getTarget();?></ul></div> 
        <input type="hidden" id="target" name="target" value="_blank" />
&#12288;&#12288;
<?php echo (L("FIELD_TOP")); ?>
<script>$(function(){ $.divselect("#iisTop","#isTop"); });</script>
        <div id="iisTop" class="dropdown" tabindex="0" style="" ><p><?php echo getIsTop("0");?></p><ul  class="" style=""><?php echo getIsTop();?></ul></div> 
        <input type="hidden" id="isTop" name="isTop" value="0" />
&#12288;&#12288;
<?php echo (L("FIELD_HIDE")); ?>
<script>$(function(){ $.divselect("#iisHide","#isHide"); });</script>
        <div id="iisHide" class="dropdown" tabindex="0" style="" ><p><?php echo getIsHide("0");?></p><ul  class="" style=""><?php echo getIsHide();?></ul></div> 
        <input type="hidden" id="isHide" name="isHide" value="0" />
</td>
</tr>
<?php if(C('HIDE_FIELD.ARTICLE_DESCRIPTION') != 'true'): ?><tr>
<td class="titleTd"><?php echo (L("FIELD_DESCRIPTION")); ?><a class='HelpIco' onmouseover=getTips(this,'<?php echo (L("TIP_DESCRIPTION")); ?>','','','','')></a></td>
<td class="inputTd"><textarea name="description" class="noteTextarea resizenone" ></textarea></td>
</tr><?php endif; ?>
<tr>
<td class="titleTd"><?php echo ($must); echo (L("FIELD_CONTENT")); ?></td>
<td class="inputTd">
        <textarea name='content' class='noteTextarea'></textarea>
        <script type='text/javascript'>
		    KindEditor.ready(function(K) {
				var editor_content = K.create('textarea[name="content"]', {
					resizeType : 1,
					themeType : 'simple',
					uploadJson : EDITROOT+'/editor/php/upload_json.php',
					fileManagerJson : EDITROOT+'/editor/php/file_manager_json.php',
					allowFileManager : true,
					width : '100%',
					height : '500',
					filterMode : false,
					newlineTag : 'p',
					items : [
					    'source', 'fullscreen','|',
					    'undo', 'redo', '|',
					    'preview','selectall','cut', 'copy', 'paste','plainpaste', 'wordpaste', '|',
					    'clearhtml','removeformat', 'quickformat','|',
					    'insertorderedlist', 'insertunorderedlist', 'indent', 'outdent', 'lineheight','|',
					    'superscript', 'subscript',
					    '/',
					    'formatblock', 'fontname', 'fontsize', '|',
					    'forecolor', 'hilitecolor', 'bold',	'italic', 'underline', 'strikethrough','|',
					    'justifyleft', 'justifycenter', 'justifyright',	'justifyfull','|',
					    'image', 'multiimage','flash', 'media', 'insertfile', 'table','emoticons','link', 'unlink'
					    ]
				});
			});
		</script>
</td>
</tr>
</table>
</div>

<div id="con_one_2" style="display:none">
<!-- Tab 2 -->

<table class="listTable">
<tr><td colspan="2" class="promptTd"><?php echo ($must); echo (L("PROMPT_SEO")); ?></td></td></tr>
<tr>
<td class="titleTd"><?php echo (L("FIELD_SEO_TITLE")); ?></td>
<td class="inputTd"><input type="text" class="input" name="seoTitle" />
</td>
</tr>
<tr>
<td class="titleTd"><?php echo (L("FIELD_SEO_KEYWORDS")); ?>:</td>
<td class="inputTd">
<input type="text" class="input" name="seoKeywords" />
</td>
</tr>
<tr>
<td class="titleTd"><?php echo (L("FIELD_SEO_DESCRIPT")); ?></td>
<td class="inputTd"><textarea name="seoDescript" class="noteTextarea"></textarea></td>
</tr>
</table>
</div>

<div id="con_one_3" style="display:none">
<!-- Tab 3 -->

<table class="listTable">
<tr>
<td class="titleTd"><?php echo (L("FIELD_LINK")); ?><a class='HelpIco' onmouseover=getTips(this,'<?php echo (L("TIP_LINK")); ?>','','','','')></a></td>
<td class="inputTd"><input type="text" class="input urlInput" name="url" /></td>
</tr>
<?php if(C('HIDE_FIELD.ARTICLE_SETBANNER') != 'true'): ?><tr>
<td class="titleTd"><?php echo (L("FIELD_BANNER")); ?><a class='HelpIco' onmouseover=getTips(this,'<?php echo (L("TIP_BANNER")); ?>','','','','')></a></td>
<td class="inputTd">

		<input type='text' id='setBanner' value='' name='setBanner' class='input dateInput' /><input type='button' id='isetBanner' value='选择图片' class='btn btnWhite' />
				<script>
				KindEditor.ready(function(K) {
				var editor_setBanner = K.editor({
				allowFileManager : true});
				K('#isetBanner').click(function() {
				editor_setBanner.loadPlugin('image', function() {
				editor_setBanner.plugin.imageDialog({
				imageUrl : K('#setBanner').val(),
				clickFn : function(url, title, width, height, border, float) {
				K('#setBanner').val(url);
				editor_setBanner.hideDialog();}});});});});
				</script>
</td>
</tr><?php endif; ?>
<tr>
<td class="titleTd"><?php echo (L("FIELD_PROTECT")); ?><a class='HelpIco' onmouseover=getTips(this,'<?php echo (L("TIP_PROTECT")); ?>','','','','')></a></td>
<td class="inputTd">
<script>$(function(){ $.divselect("#iisProtect","#isProtect"); });</script>
        <div id="iisProtect" class="dropdown" tabindex="0" style="" ><p><?php echo getIsProtect("0");?></p><ul  class="" style=""><?php echo getIsProtect();?></ul></div> 
        <input type="hidden" id="isProtect" name="isProtect" value="0" />
</td>
</tr>
</table>
</div>

<div class="listTableBottom">
<input type='submit' class='btn btnBlue' value='<?php echo (L("BTN_ADD")); ?>' />
</div>
</form>
</div>

</td>
</tr>

</table>

</body>
</html>

<script type="text/javascript" src="/Apps/Adminx/resource/function/DateActive/WdatePicker.js"></script>
<script type="text/javascript" src="/Apps/Adminx/resource/function/mycommon.js"></script>
<script type="text/javascript" src="/Apps/Adminx/resource/function/quickView.js"></script>
<script type="text/javascript" src="/Apps/Adminx/resource/function/layer/layer.min.js"></script>