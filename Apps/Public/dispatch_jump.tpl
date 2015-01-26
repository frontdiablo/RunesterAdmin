<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv='Refresh' content='{($waitSecond)};URL={($jumpUrl)}' />
<title>Loading...</title>
<style>
html,body{font-size:12px;margin:0;height:100%;width:100%;overflow:hidden}
#back{position:absolute;top:0;left:0;background:#666;width:100%;height:100%;z-index:-1}
.Nav{width:500px;height:100px;position:relative;top:50%;left:50%}
.mesWindow{width:500px;height:100px;background:#fff;border:#666 1px solid;position:absolute;top:-50px;left:-250px}
.mesWindowTop{border-bottom:#eee 1px solid;margin-left:4px;margin-right:4px;padding:3px;text-align:left;height:20px;line-height:20px;font-weight:700}
.mesWindowContent{margin:4px;padding-top:5px;text-align:center;line-height:25px;}
.mesWindowContent a{font-weight:bold;text-decoration: none;color:#00f;}
.mesWindowContent a:hover{text-decoration: underline;color:#000;}
.infoTitle{font-size:14px;color:#f00;}
</style>
</head>
<body onload="testMessageBox(event);" >
<div id="Nav" class="Nav">
<div class='mesWindow'>
<div class='mesWindowTop'>
<present name="message" >
{($msgTitle)}
<else/>
{($msgTitle)}

</present>
</div>


<div class='mesWindowContent'>
<span class="infoTitle">
<present name="message" >
{($message)}<br />
<else/>
{($error)}<br />
</present>
</span>
页面将在 {($waitSecond)} 秒后自动跳转，如果不想等待请点击 <a href="{($jumpUrl)}">这里</a> 跳转
</div>
<div class='mesWindowBottom'></div></div>
</div>
</body>
</html>
<script>var isIe=(document.all)?true:false;function setSelectState(state){}function showMessageBox(wTitle,content,pos,wWidth){var bWidth=parseInt(document.documentElement.scrollWidth);var bHeight=parseInt(document.documentElement.scrollHeight);if(isIe){setSelectState('hidden')}var back=document.createElement("div");back.id="back";var styleStr="";styleStr+=(isIe)?"filter:alpha(opacity=0);":"opacity:0;";back.style.cssText=styleStr;document.body.appendChild(back);showBackground(back,50)}function showBackground(obj,endInt){if(isIe){obj.filters.alpha.opacity+=8;if(obj.filters.alpha.opacity<endInt){setTimeout(function(){showBackground(obj,endInt)},5)}}else{var al=parseFloat(obj.style.opacity);al+=0.01;obj.style.opacity=al;if(al<(endInt/200)){setTimeout(function(){showBackground(obj,endInt)},5)}}}function testMessageBox(ev){showMessageBox("","","",500)}</script>