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
<h1><?php echo (L("PAGETITLE_PAGE_EDIT")); ?></h1>
</div>
<div id="pageTitleBottom"></div>
<ul class="navButton">
<li><a href='/index.php/Adminx/Page/add' class='pageBtn navButton1'><?php echo (L("NAVBTN_PAGE_ADD")); ?></a></li>
<li><a href='/index.php/Adminx/Page/index' class='pageBtn navButton2'><?php echo (L("NAVBTN_PAGE_INDEX")); ?></a></li>
<li><a href='/index.php/Adminx/Page/recyclebin' class='pageBtn navButton3'><?php echo (L("NAVBTN_PAGE_RECYCLE")); ?></a></li>
<div class="clear"></div>
</ul>
<div class="clear"></div>
<div id="basic-accordian" >
<form enctype="multipart/form-data" method="POST" name="myform"  action="/index.php/Adminx/Page/update">
<input type="hidden" name="id" value="<?php echo ($vo["id"]); ?>" />
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
<input type="text" class="input" name="title" value="<?php echo ($vo["title"]); ?>" />
</td>
</tr>
<?php if(C('HIDE_FIELD.PAGE_ALIAS') != 'true'): ?><tr>
<td class="titleTd"><?php echo (L("FIELD_ALIAS")); ?></td>
<td class="inputTd">
<input type="text" class="input" name="alias" value="<?php echo ($vo["alias"]); ?>" />
</td>
</tr><?php endif; ?>
<tr>
<td class="titleTd"><?php echo ($must); echo (L("FIELD_CATE")); ?></td>
<td class="inputTd">


<script>$(function(){ $.divselect("#ipid","#pid"); });</script>
        <div id="ipid" class="dropdown" tabindex="0" style="" ><p><?php echo getCateTitle($vo['pid']);?></p><ul  class="" style=""><?php echo getCate("Page");?></ul></div> 
        <input type="hidden" id="pid" name="pid" value="<?php echo ($vo['pid']); ?>" />

</td>
</tr>
<tr>
<td class="titleTd"><?php echo ($must); echo (L("FIELD_CONTENT")); ?></td>
<td class="inputTd">
        <textarea name='cotnent' class='noteTextarea'><?php echo ($vo["content"]); ?></textarea>
        <script type='text/javascript'>
		    KindEditor.ready(function(K) {
				var editor_cotnent = K.create('textarea[name="cotnent"]', {
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
		</script></td>
</tr>
</table>
</div>

<div id="con_one_2" style="display:none">
<!-- Tab 2 -->

<table class="listTable">
<tr><td colspan="2" class="promptTd"><?php echo ($must); echo (L("PROMPT_SEO")); ?></td></td></tr>
<tr>
<td class="titleTd"><?php echo (L("FIELD_SEO_TITLE")); ?></td>
<td class="inputTd"><input type="text" class="input" name="seoTitle" value="<?php echo ($vo["seoTitle"]); ?>" />
</td>
</tr>
<tr>
<td class="titleTd"><?php echo (L("FIELD_SEO_KEYWORDS")); ?></td>
<td class="inputTd">
<input type="text" class="input" name="seoKeywords" value="<?php echo ($vo["seoKeywords"]); ?>" />
</td>
</tr>
<tr>
<td class="titleTd"><?php echo (L("FIELD_SEO_DESCRIPT")); ?></td>
<td class="inputTd"><textarea name="seoDescript" class="noteTextarea"><?php echo ($vo["seoDescript"]); ?></textarea></td>
</tr>
</table>
</div>

<div id="con_one_3" style="display:none">
<!-- Tab 3 -->

<table class="listTable">
<?php if(C('HIDE_FIELD.PAGE_SETBANNER') != 'true'): ?><tr>
<td class="titleTd"><?php echo (L("FIELD_BANNER")); ?><a class='HelpIco' onmouseover=getTips(this,'<?php echo (L("TIP_BANNER")); ?>','','','','')></a></td>
<td class="inputTd">

		<input type='text' id='setBanner' value='<?php echo ($vo["setBanner"]); ?>' name='setBanner' class='input dateInput' /><input type='button' id='isetBanner' value='选择图片' class='btn btnWhite' />
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
        <div id="iisProtect" class="dropdown" tabindex="0" style="" ><p><?php echo getIsProtect($vo['isProtect']);?></p><ul  class="" style=""><?php echo getIsProtect();?></ul></div> 
        <input type="hidden" id="isProtect" name="isProtect" value="<?php echo ($vo['isProtect']); ?>" />
</td>
</tr>
</table>
</div>

<div class="listTableBottom">
<input type='submit' class='btn btnBlue' value='<?php echo (L("BTN_EDIT")); ?>' />
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