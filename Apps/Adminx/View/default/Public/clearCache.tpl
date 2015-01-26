<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=7" />
<link href="__RESSTYLE__/reset.css" rel="stylesheet" type="text/css" />
<link href="__RESSTYLE__/style.css" rel="stylesheet" type="text/css" />

<script type="text/javascript" src="__RESFUN__/jquery-1.7.2.min.js"></script>
<script type="text/javascript" src="__RESFUN__/ajax/ajax.js"></script>
<script type="text/javascript">var AjaxClearCacheUrl = "{:U('Cache/clear_cache')}";</script>
<style type="text/css">
body{background: url("__RESIMG__/bg_1.png");width:100%;height: 100%;overflow: hidden;}
</style>

</head>
<body>

<div class="clear_cache">
<a href="javascript:void(0)" class="clear_btn clear_page" onclick="ajax_clear_cache('Cache','Home')">清理前端页面缓存</a>
<a href="javascript:void(0)" class="clear_btn clear_page" onclick="ajax_clear_cache('Cache','Adminx')">清理后台页面缓存</a>
<a href="javascript:void(0)" class="clear_btn clear_data" onclick="ajax_clear_cache('Data')">清理数据缓存</a>
<a href="javascript:void(0)" class="clear_btn clear_log"  onclick="ajax_clear_cache('Logs')">清理日志缓存</a>
<a href="javascript:void(0)" class="clear_btn clear_all"  onclick="ajax_clear_cache('Temp')">清理临时数据缓存</a>
<a href="javascript:void(0)" class="clear_btn clear_all"  onclick="ajax_clear_cache('all')">清理所有缓存</a>
<div class="clear"></div>

</div>
</body>
</html>