<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=7" />
<link href="__RESSTYLE__/reset.css" rel="stylesheet" type="text/css" />
<link href="__RESSTYLE__/style.css" rel="stylesheet" type="text/css" />
<script type="text/javascript" src="__RESFUN__/mycommon.js"></script>
<style type="text/css">
body{background: url("__RESIMG__/bg_1.png");width:100%;height: 100%;overflow: hidden;}
.webtools_wapper{overflow:auto;height:210px;}
.webtools_a{height: 40px;line-height:40px;width:50%;border: 1px solid #dfdfdf;border-left:0;background: url("__RESIMG__/table_td_shadow.gif") repeat-x ;background-color: #f7f7f7\9; text-align: center;color: #666;display:table;float:left;}
.webtools_a:hover{background:#fefefe}

</style>

</head>
<body>

<div class="TabTitle">
<ul>
<li id="one1" onclick="setTab('one',1,3,'hover')" class="hover">常用网站</li>
<li id="one2" onclick="setTab('one',2,3,'hover')" >站长工具</li>
<li id="one3" onclick="setTab('one',3,3,'hover')" >搜索引擎提交</li>
</ul>
</div>
<div class="webtools_wapper">
	<div id="con_one_1" class="hover">
		<volist name="vo0" id="vo0">
		<a class="webtools_a" href="http://{$vo0.url}/" target="_blank">{$vo0.name}</a>
		</volist>
		<div class="clear"></div>
	</div>
	
	<div id="con_one_2" style="display:none">
		<volist name="vo1" id="vo1">
		<a class="webtools_a" href="http://{$vo1.url}/" target="_blank">{$vo1.name}</a>
		</volist>
	</div>
	
	<div id="con_one_3" style="display:none">
		<volist name="vo2" id="vo2">
		<a class="webtools_a" href="http://{$vo2.url}/" target="_blank">{$vo2.name}</a>
		</volist>
	</div>
</div>
</body>
</html>