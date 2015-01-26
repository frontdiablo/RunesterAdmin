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
<td class="ContainerInline"><div id="pageTitle"></div>
<div class="Tabmenubox TabmenuboxBorder">
<div class="Tabmenubox_cate"><?php echo (L("TAB_SIDE_CATE_SETTING")); ?></div>
</div>
<div class="separate"></div>
<div class="Tabmain">
<div class="Tabmain">
<div class="block" id="main1">
<ul class="sideItemUl">
<li><a href="<?php echo U('Config/web');?>"><?php echo (L("SIDE_LIST_WEBSITE")); ?></a></li>
<li><a href="<?php echo U('Config/home');?>"><?php echo (L("SIDE_LIST_HOME")); ?></a></li>

<?php if(returnAuth($Thik.MODULE_NAME.'/Adv/index')): ?><li><a href="<?php echo U('Adv/index');?>"><?php echo (L("SIDE_LIST_ADV")); ?></a></li><?php endif; ?>
</ul>

<div class="separate"></div>

<ul class="sideItemUl">
<?php if(returnAuth($Thik.MODULE_NAME.'/Im/index')): ?><li><a href="<?php echo U('Im/index');?>"><?php echo (L("SIDE_LIST_IM")); ?></a></li><?php endif; ?>
<?php if(returnAuth($Thik.MODULE_NAME.'/Config/mail')): ?><li><a href="<?php echo U('Config/mail');?>"><?php echo (L("SIDE_LIST_MAIL")); ?></a></li><?php endif; ?>
<?php if(returnAuth($Thik.MODULE_NAME.'/Webtools/index')): ?><li><a href="<?php echo U('Favorite/index');?>"><?php echo (L("SIDE_LIST_FAVORITE")); ?></a></li><?php endif; ?>

<li><a href="<?php echo U('Config/advance');?>">网站高级配置</a></li>

<?php if(returnAuth($Thik.MODULE_NAME.'/Sysconfig/index')): ?><li><a href="<?php echo U('Sysconfig/index');?>">网站项目配置</a></li><?php endif; ?>
</ul>
</div>
</div></div>
</td>

<td class="ContainerRight">
<div id="pageTitle">
<h1><?php echo (L("PAGETITLE_CONFIG_WEB")); ?></h1>
</div>
<div id="pageTitleBottom"></div>
<br /><br />

<div id="basic-accordian" >

<form enctype="multipart/form-data" method="POST" name="myform"  action="<?php echo U(CONTROLLER_NAME.'/update_home');?>">
<div class="TabTitle">
<ul>
<li id="one1" class="hover"><?php echo (L("TAB_BASIC")); ?></li>
</ul>
</div>

<div id="con_one_1" class="hover">
<!-- Tab 1 -->

<table class="listTable" id="listTable">
<?php if(is_array($vo)): $i = 0; $__LIST__ = $vo;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
<td class="titleTd"><?php echo ($vo["name"]); ?></td>
<td class="inputTd">
<input type="text" class="input" value="<?php echo ($vo["name"]); ?>" name="name[]" />
<input type="text" class="input" value="<?php echo ($vo["alias"]); ?>" name="alias_<?php echo ($key); ?>" /><br /><br />

        <textarea name='content_<?php echo ($key); ?>' class='noteTextarea'><?php echo ($vo["content"]); ?></textarea>
        <script type='text/javascript'>
		    KindEditor.ready(function(K) {
				var editor_content_<?php echo ($key); ?> = K.create('textarea[name="content_<?php echo ($key); ?>"]', {
					resizeType : 1,
					themeType : 'simple',
					uploadJson : EDITROOT+'/editor/php/upload_json.php',
					fileManagerJson : EDITROOT+'/editor/php/file_manager_json.php',
					allowFileManager : true,
					width : '100%',
					height : '140',
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
</tr><?php endforeach; endif; else: echo "" ;endif; ?>
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
<script type="text/javascript" src="/Apps/Adminx/resource/function/mycommon.js"></script>
<script type="text/javascript" src="/Apps/Adminx/resource/function/quickView.js"></script>
<script type="text/javascript" src="/Apps/Adminx/resource/function/layer/layer.min.js"></script>