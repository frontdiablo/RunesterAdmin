<include file="Public:pub_top" />
</head>
<body>
<include file="Public:pub_header" />
<table class="ContainerTable">
<tr>
<td class="ContainerLeft"><include file="Public:pub_sidebar" /></td>
<td class="ContainerInline"><include file="Admin:pub_sidebar" /></td>
<td class="ContainerRight">
<div id="pageTitle"><h1>{$Think.lang.PAGETITLE_ADMIN_INDEX}</h1></div>
<div id="pageTitleBottom"></div>
<include file="Admin:pub_funbut" />

<div id="basic-accordian" >

<div class="accordion_headings accordion_Nohover BorderTop">
<div class="headingsLeft">{$Think.lang.TABLETITLE_ADMIN_INDEX}</div>
<include file="Public:pub_searchform" />
<div class="clear"></div>
</div>

{/* 信息表 开始 */}
<form enctype="multipart/form-data" method="POST" name="myform" id="myform" action="" >
<div class="accordion_child">
<table class="listTable">
<tr>
<th>{$Think.lang.TH_CHECK}</th>
<th>{$Think.lang.TH_ID}</th>
<th>{$Think.lang.TH_HEAD}</th>
<th>{$Think.lang.TH_LOGIN_NAME}</th>
<th>{$Think.lang.TH_NICKNAME}</th>
<th>{$Think.lang.TH_TYPE}</th>
<th>{$Think.lang.TH_STATE}</th>
<th>{$Think.lang.TH_LOGIN_TIME}</th>
<th>{$Think.lang.TH_LOGIN_IP}</th>
<th>{$Think.lang.TH_FUNCTION}</th>
</tr>
<volist name="volist" id="vo">
<tr>
<td class="listTableCheckTd">
<input type="checkbox" value="{$vo.id}" name='artical_ID[]' id='artical_ID' />

</td>
<td>{$vo.id}</span></td>
<td class="thumbTd">
<img src="/__UPLOADIMG__/head/{$vo.head}" width="48px" height="48px" />
</td>
<td>{$vo.username}</span></td>
<td>{$vo.nickname}</td>
<td>{:getAdminGroup($vo['id'])}</td>
<td><a href="__URL__/index?status={$vo.status}" title="{$Think.lang.TIP_TITLE_STATE}">{:getState($vo['status'],"status")}</a></td>
<td>
<if condition="$vo.admin_loginTime eq ''">
未登录
<else />
{:forDate($vo['loginTime'])}
</if>
</td>
<td>
<if condition="$vo.loginIP eq ''">
未登录
<else />
{$vo.loginIP}
</if>
</td>
<td class='funTd'>
{:btn("status",$key)}
{:btn("edit",$key)}
{:btn("delete",$key)}
</td>
</tr>
</volist>
</table>
<div class='listTableBottom'>
<div class='bottomLeft'>
<table>
<tr>
<td class="listTableCheckTd"><input id="select_all"   name="select_all" type="checkbox" value="1"  onclick="check_all(this,'artical_ID[]')"/></td>
<td>
<jselect name="ifun" title='{$Think.lang.JSELECT_OPTION}' value="0" style="width:120px">{:getListBatchBtn("delete,status")}</jselect>
</td>
</tr>
</table>
</div>

<div class='bottomRight'>
<div class="pages">{$page}</div>
</div>
<div class='clear'></div>
</div>

</div>

</form>
{/* 信息表 结束 */}

</td>
</tr>
</table>
</body>
</html>

<include file="Public:pub_bottom" />