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
<div class="Tabmenubox_cate"><?php echo (L("TAB_SIDE_CATE_FILTER")); ?></div>
</div>

<div class="separate"></div>


<div id="con_one_1" class="hover">
	<ul class="sideItemUl">
		<li><a href='<?php echo U($Think.CONTROLLER_NAME."/index");?>' <?php if(($read != '0') and ($hide != '1')): ?>class="click"<?php endif; ?>>全部留言</li></a>
		<li><a href='<?php echo U($Think.CONTROLLER_NAME."/index","read=0");?>' <?php if($read == '0'): ?>class="click"<?php endif; ?>>未读留言</li></a>
		<li><a href='<?php echo U($Think.CONTROLLER_NAME."/index","hide=1");?>' <?php if($hide == '1'): ?>class="click"<?php endif; ?>>未审核留言</li></a>
	</ul>
</div></td>
<td class="ContainerRight">
<div id="pageTitle"><h1><?php echo (L("PAGETITLE_PAGE_INDEX")); ?></h1></div>
<div id="pageTitleBottom"></div>
<ul class="navButton">
<li><a href='/index.php/Adminx/Guestbook/index' class='commentBtn navButton1'>留言管理</a></li>
<li><a href='<?php echo U('GuestbookShortcut/index');?>' class='commentBtn navButton2'>快捷留言管理</a></li>
<li><a href='<?php echo U('GuestbookHead/index');?>' class='commentBtn navButton3'>留言头像管理</a></li>
<div class="clear"></div>
</ul>
<div class="clear"></div>
<div id="basic-accordian" >
<div class="accordion_headings accordion_Nohover BorderTop">
<div class="headingsLeft"><?php echo (L("TABLETITLE_PAGE_INDEX")); ?></div>
</div>
<div class="clear"></div>
</div>

<form enctype="multipart/form-data" method="POST" name="myform" id="myform">
<div class="accordion_child" style="margin:0 25px;">
<?php echo W("Guestbook/bookTable");?>
<div class='listTableBottom'>
<div class='bottomLeft'></div>
<div class='bottomRight'>
<div class="pages"><?php echo ($page); ?></div>
</div>
<div class='clear'></div>
</div>
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