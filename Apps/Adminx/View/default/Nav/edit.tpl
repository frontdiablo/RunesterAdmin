<include file="Public:pub_top" />
</head>
<body>
<include file="Public:pub_header" />

<table class="ContainerTable">
<tr>
<td class="ContainerLeft"><include file="Public:pub_sidebar" /></td>
<td class="ContainerRight">
<div id="pageTitle">
<h1>{$Think.lang.PAGETITLE_NAV_EDIT}</h1>
</div>
<div id="pageTitleBottom"></div>
<include file="Nav:pub_funbut" />

<div id="basic-accordian" >

<form enctype="multipart/form-data" method="POST" name="myform"  action="__URL__/update">
<input type="hidden" value="{$vo.id}" name="id" />

<div class="TabTitle">
<ul>
<li id="one1" onclick="setTab('one',1,3,'hover')" class="hover">{$Think.lang.TAB_BASIC}</li>
<if condition="$vo.type neq 'url' ">
<li id="one2" onclick="setTab('one',2,3,'hover')" >{$Think.lang.TAB_SEO}</li>
<li id="one3" onclick="setTab('one',3,3,'hover')">{$Think.lang.TAB_OTHER}</li>
</if>

</ul>
</div>

<div id="con_one_1" class="hover">
<!-- Tab 1 -->

<table class="listTable" id="listTable">
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_TITLE}</td>
<td class="inputTd">
<input type="text" class="input" name="title" value="{$vo.title}" />
</td>
</tr>

<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_CATE}</td>
<td class="inputTd">

<jselect name="pid" title="{:getNavCateTitle($vo['pid'])}" value="{$vo.pid}">
<li><a href='javascript:void(0)' rel='0_1' name='根分类'>根分类</a></li>
{:getNavCate(1)}
</jselect>
</td>
</tr>

<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_TYPE}<tip text="{$Think.lang.TIP_DIS_EDIT}" style="red" /></td>
<td class="inputTd">
{:getCategoryTypeName($vo['type'])}

</td>
</tr>

<tr>
<td class="titleTd">{$Think.lang.FIELD_LINK}<tip text="{$Think.lang.TIP_LINK_CATE}" /></td>
<td class="inputTd"><input type="text" class="input urlInput" name="url" id="url" value="{$vo.url}" /></td>
</tr>

<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_STATE}</td>
<td class="inputTd">
{$Think.lang.FIELD_TARGET}
<jselect name="target" title="{:getTarget($vo['target'])}" value="{$vo.target}">{:getTarget()}</jselect>
&#12288;&#12288;
{$Think.lang.FIELD_HIDE}
<jselect name="isHide" title="{:getIsHide($vo['isHide'])}" value="{$vo.isHide}">{:getIsHide()}</jselect>
</td>
</tr>


</table>
</div>

<div id="con_one_2" style="display:none">
<!-- Tab 2 -->

<table class="listTable">
<tr><td colspan="2" class="promptTd">{$must}{$Think.lang.PROMPT_SEO}</td></td></tr>
<tr>
<td class="titleTd">{$Think.lang.FIELD_SEO_TITLE}</td>
<td class="inputTd"><input type="text" class="input" name="seoTitle" value="{$vo.seoTitle}" />
</td>
</tr>
<tr>
<td class="titleTd">{$Think.lang.FIELD_SEO_KEYWORDS}</td>
<td class="inputTd">
<input type="text" class="input" name="seoKeywords" value="{$vo.seoKeywords}" />
</td>
</tr>
<tr>
<td class="titleTd">{$Think.lang.FIELD_SEO_DESCRIPT}</td>
<td class="inputTd"><textarea name="seoDescript" class="noteTextarea">{$vo.seoDescript}</textarea></td>
</tr>
</table>
</div>

<div id="con_one_3" style="display:none">
<!-- Tab 3 -->

<table class="listTable">
<tr>
<td class="titleTd">{$Think.lang.FIELD_BANNER}<tip text="不填写则显示默认图片" /></td>
<td class="inputTd">
<input type="text" id="setBanner" value="{$vo.setBanner}" name="setBanner" />
<input type="button" id="iBanner" value="选择图片" />
</td>
</tr>
</table>
</div>
<div class="listTableBottom">
<input type='submit' class='btn btnBlue' value='{$Think.lang.BTN_EDIT}' />
</div>
</form>
</div>
</td>
</tr>
</table>
</body>
</html>
<include file="Public:pub_bottom" />