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
<div class="Tabmenubox Tabmenubox_cate">
<ul id="menu1" class="Tabmenu">
<li id="one2" onclick="setTab('one',2,2,'hover2')"class="hover2"><?php echo (L("TAB_SIDE_CATE_FILTER")); ?></li>
<li id="one1" onclick="setTab('one',1,2,'hover1')"><?php echo (L("TAB_SIDE_CATE_SETTING")); ?></li>
</ul>
</div>
<div class="separate"></div>
<div id="con_one_1" style="display:none">
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
</div><!--con_one_1 End-->

<div id="con_one_2" class="hover">
<ul class="sideItemUl">
	<li><a href='<?php echo U($Think.CONTROLLER_NAME."/index");?>' <?php if($pid == 0): ?>class="click"<?php endif; ?>><?php echo (L("SIDE_LIST_ALL")); ?></a></li>
	<?php echo getSideCateTable("Im","display",0,$pid);?>
</ul>
<div class="separate"></div>

<form enctype="multipart/form-data" method="POST" name="sbGroupList"  action="<?php echo U('Category/update_multi');?>">
<table class='sbItemTable'>
<tr><td colspan="3" class="BtnTr"><?php echo (L("PROMPT_SIDE_CATE")); ?></td></tr>
<?php echo getSideCateTable("Im","edit");?>
<tr>
<td colspan="3" class="BtnTr">
<input type="submit" value="<?php echo (L("BTN_CATE_EDIT")); ?>" class="btn2 Btn2Red" />
</td>
</tr>
</table>
</form>
<div class="separate"></div>


<div class="sbAddContainer">
<form enctype="multipart/form-data" method="POST" name="sbCateAdd"  action="<?php echo U('Category/insert');?>">
<input type="hidden" name="cate_type" value="Im" />
<input type="text" class="input addinput"  name="cate_title" id="cate_title" value="<?php echo (L("PH_CATE_ADD")); ?>" onclick="this.select()" /><br />
<input type="submit" value="<?php echo (L("BTN_CATE_ADD")); ?>" class="btn3 Btn3Blue" />
</form>
</div>

</div><!--con_one_2 End--></td>
<td class="ContainerRight">
<div id="pageTitle"><h1><?php echo (L("PAGETITLE_IM_INDEX")); ?></h1></div>
<div id="pageTitleBottom"></div>
<ul class="navButton">
<li><a href='/index.php/Adminx/Im/add' class='imBtn navButton1'><?php echo (L("NAVBTN_IM_ADD")); ?></a></li>
<li><a href='/index.php/Adminx/Im/index' class='imBtn navButton2'><?php echo (L("NAVBTN_IM_INDEX")); ?></a></li>
<div class="clear"></div>
</ul>
<div class="clear"></div>

<form enctype="multipart/form-data" method="POST" name="myform" id="myform" action="" >
<div id="basic-accordian" >
<div class="accordion_headings accordion_Nohover BorderTop">
<div class="headingsLeft"><?php echo (L("TABLETITLE_IM_INDEX")); ?></div>
<div class="clear"></div>
</div>



<div class="accordion_child">
<table class="listTable">
<tr>
<th><?php echo (L("TH_CHECK")); ?></th>
<th><?php echo (L("TH_NAME")); ?></th>
<th><?php echo (L("TH_CATE")); ?></th>
<th><?php echo (L("TH_SORT")); ?></th>
<th><?php echo (L("TH_FUNCTION")); ?></th>
</tr>
<?php if(is_array($volist)): $i = 0; $__LIST__ = $volist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
<td class="listTableCheckTd"><input type="checkbox" value="<?php echo ($vo["id"]); ?>" name='artical_ID[]' id='artical_ID' /></td>
<td><?php echo ($vo["name"]); ?></td>
<td><a href="/index.php/Adminx/Im/index?type=<?php echo ($vo["type"]); ?>" title="<?php echo (L("TIP_TITLE_CATE")); ?>"><?php echo getCateTitle($vo['type']);?></a></td>
<td>
<input type="text" class="input SortInput" value="<?php echo ($vo["sort"]); ?>" onclick="this.select();" name="iSort[]" id="iSort" />
<input type="hidden" value="<?php echo ($vo["id"]); ?>" name="iId[]" id="iId" />
</td>
<td class='funTd'>
<?php echo btn("edit",$key);?>
<?php echo btn("delete",$key);?>
</td>
</tr><?php endforeach; endif; else: echo "" ;endif; ?>
</table>
<div class='listTableBottom'>

<div class='bottomLeft'>
<table>
<tr>
<td class="listTableCheckTd"><input id="select_all" name="select_all" type="checkbox" value="1"  onclick="check_all(this,'artical_ID[]')"/></td>
<td>
<script>$(function(){ $.divselect("#iifun","#ifun"); });</script>
        <div id="iifun" class="dropdown" tabindex="0" style="width:120px" ><p><?php echo (L("JSELECT_OPTION")); ?></p><ul  class="" style="width:120px"><?php echo getListBatchBtn("sort,delete");?></ul></div> 
        <input type="hidden" id="ifun" name="ifun" value="0" />
</td>
</tr>
</table>
</div>
<div class='clear'></div>
</div>

</div>
</div>
</form>


</td>
</tr>
</table>

</body>
</html>

<script type="text/javascript" src="/Apps/Adminx/resource/function/mycommon.js"></script>
<script type="text/javascript" src="/Apps/Adminx/resource/function/quickView.js"></script>
<script type="text/javascript" src="/Apps/Adminx/resource/function/layer/layer.min.js"></script>