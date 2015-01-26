<include file="Public:pub_top" />
<link rel="stylesheet" href="__RESFUN__/editor/themes/default/default.css" />
<load href="__RESFUN__/editor/kindeditor-min.js" />
</head>
<body>
<include file="Public:pub_header" />

<table class="ContainerTable">
<tr>
<td class="ContainerLeft"><include file="Public:pub_sidebar" /></td>
<td class="ContainerRight">
<div id="pageTitle">
<h1>{$Think.lang.PAGETITLE_ARTICLE_ADD}</h1>
</div>
<div id="pageTitleBottom"></div>
<include file="Article:pub_funbut" />

<div id="basic-accordian" >

<form enctype="multipart/form-data" method="POST" name="myform"  action="__URL__/insert">
<div class="TabTitle">
<ul>
<li id="one1" onclick="setTab('one',1,3,'hover')" class="hover">{$Think.lang.TAB_BASIC}</li>
<li id="one2" onclick="setTab('one',2,3,'hover')" >{$Think.lang.TAB_SEO}</li>
<li id="one3" onclick="setTab('one',3,3,'hover')">{$Think.lang.TAB_OTHER}</li>
</ul>
</div>

<div id="con_one_1" class="hover">
<!-- Tab 1 -->

<table class="listTable" id="listTable">
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_TITLE}</td>
<td class="inputTd">
<input type="text" class="input" name="title" />
<if condition="C('HIDE_FIELD.ARTICLE_TITLE_COLOR') neq 'true'">
<colorpicker name="titleColor"/>
</if>
</td>
</tr>
<if condition="C('HIDE_FIELD.ARTICLE_ALIAS') neq 'true'">
<tr>
<td class="titleTd">{$Think.lang.FIELD_ALIAS}</td>
<td class="inputTd">
<input type="text" class="input" name="alias" />{$Think.config.HIDE_FIELD.ARTICLE_ALIAS}
</td>
</tr>
</if>

<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_CATE}</td>
<td class="inputTd">
<jselect name="pid" title="请选择所属分类" value="">{:getCate("Article")}</jselect>
</td>
</tr>
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_DATE}</td>
<td class="inputTd">
<input type="text" class="input dateInput" name="pubDate" value="{$cudate}" {$DateActive} />
</td>
</tr>
<tr>
<td class="titleTd">{$Think.lang.FIELD_INFO}</td>
<td class="inputTd">
{$Think.lang.FIELD_ARTICLE_SOURCE}<input type="text" class="input" name="source" value="" />
&#12288;&#12288;{$Think.lang.FIELD_AUTHOR}<input type="text" class="input dateInput" name="author" value="{$author}" />
<input type="hidden" name="author_id" value="{$Think.session.admin_id} " />
</td>
</tr>
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_STATE}</td>
<td class="inputTd">
{$Think.lang.FIELD_TARGET}
<jselect name="target" title='{:getTarget("_blank")}' value="_blank">{:getTarget()}</jselect>
&#12288;&#12288;
{$Think.lang.FIELD_TOP}
<jselect name="isTop" title='{:getIsTop("0")}' value="0">{:getIsTop()}</jselect>
&#12288;&#12288;
{$Think.lang.FIELD_HIDE}
<jselect name="isHide" title='{:getIsHide("0")}' value="0">{:getIsHide()}</jselect>
</td>
</tr>
<if condition="C('HIDE_FIELD.ARTICLE_DESCRIPTION') neq 'true'">
<tr>
<td class="titleTd">{$Think.lang.FIELD_DESCRIPTION}<tip text="{$Think.lang.TIP_DESCRIPTION}" /></td>
<td class="inputTd"><textarea name="description" class="noteTextarea resizenone" ></textarea></td>
</tr>
</if>
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_CONTENT}</td>
<td class="inputTd"><editor name="content"></editor>
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
<td class="inputTd"><input type="text" class="input" name="seoTitle" />
</td>
</tr>
<tr>
<td class="titleTd">{$Think.lang.FIELD_SEO_KEYWORDS}:</td>
<td class="inputTd">
<input type="text" class="input" name="seoKeywords" />
</td>
</tr>
<tr>
<td class="titleTd">{$Think.lang.FIELD_SEO_DESCRIPT}</td>
<td class="inputTd"><textarea name="seoDescript" class="noteTextarea"></textarea></td>
</tr>
</table>
</div>

<div id="con_one_3" style="display:none">
<!-- Tab 3 -->

<table class="listTable">
<tr>
<td class="titleTd">{$Think.lang.FIELD_LINK}<tip text="{$Think.lang.TIP_LINK}" /></td>
<td class="inputTd"><input type="text" class="input urlInput" name="url" /></td>
</tr>
<if condition="C('HIDE_FIELD.ARTICLE_SETBANNER') neq 'true'">
<tr>
<td class="titleTd">{$Think.lang.FIELD_BANNER}<tip text="{$Think.lang.TIP_BANNER}" /></td>
<td class="inputTd">
<kupload name="setBanner" value="" />
</td>
</tr>
</if>
<tr>
<td class="titleTd">{$Think.lang.FIELD_PROTECT}<tip text="{$Think.lang.TIP_PROTECT}" /></td>
<td class="inputTd">
<jselect name="isProtect" title='{:getIsProtect("0")}' value="0">{:getIsProtect()}</jselect>
</td>
</tr>
</table>
</div>

<div class="listTableBottom">
<input type='submit' class='btn btnBlue' value='{$Think.lang.BTN_ADD}' />
</div>
</form>
</div>

</td>
</tr>

</table>

</body>
</html>

<load href="__RESFUN__/DateActive/WdatePicker.js" />
<include file="Public:pub_bottom" />