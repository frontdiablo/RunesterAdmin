<include file="Public:pub_top" />
<link rel="stylesheet" href="__RESFUN__/editor/themes/default/default.css" />
<load href="__RESFUN__/editor/kindeditor-min.js" />
</head>
<body>
<include file="Public:pub_header" />
<table class="ContainerTable">
<tr>
<td class="ContainerLeft"><include file="Public:pub_sidebar" /></td>
<td class="ContainerInline"><include file="Config:pub_sidebar" /></td>

<td class="ContainerRight">
<div id="pageTitle">
<h1>{$Think.lang.PAGETITLE_CONFIG_WEB}</h1>
</div>
<div id="pageTitleBottom"></div>
<br /><br />

<div id="basic-accordian" >

<form enctype="multipart/form-data" method="POST" name="myform"  action="{:U(CONTROLLER_NAME.'/update_web')}">
<div class="TabTitle">
<ul>
<li id="one1" onclick="setTab('one',1,3,'hover')" class="hover">{$Think.lang.TAB_BASIC}</li>
<li id="one2" onclick="setTab('one',2,3,'hover')" >{$Think.lang.TAB_SEO}</li>
<li id="one3" onclick="setTab('one',3,3,'hover')">{$Think.lang.TAB_PAGING}</li>
</ul>
</div>

<div id="con_one_1" class="hover">
<!-- Tab 1 -->

<table class="listTable" id="listTable">
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_WEB_NAME}</td>
<td class="inputTd">
<input type="text" class="input" name="web_title" value="{$vo.web_title}" />
</td>
</tr>
<tr>
<td class="titleTd">{$Think.lang.FIELD_URL}</td>
<td class="inputTd">
<input type="text" class="input" name="web_url" value="{$vo.web_url}" />
</td>
</tr>
<if condition="C('HIDE_FIELD.CONFIG_WEB_LOGO') neq 'true'">
<tr>
<td class="titleTd">{$Think.lang.FIELD_LOGO}<tip text="{$Think.lang.TIP_DEF}" /></td>
<td class="inputTd">
<kupload name="web_logo" value="{$vo.web_logo}" />
</td>
</tr>
</if>

<if condition="C('HIDE_FIELD.CONFIG_WEB_STATISTICS') neq 'true'">
<tr>
<td class="titleTd">{$Think.lang.FIELD_STATISTICS}</td>
<td class="inputTd"><textarea name="web_statistics" class="configTextarea resizenone" >{$vo.web_statistics}</textarea></td>
</tr>
</if>
<tr>
<td class="titleTd">{$Think.lang.FIELD_FOOTER}</td>
<td class="inputTd"><editor name="web_footer1" height="140">{$vo.web_footer1}</editor></td>
</tr>
<if condition="C('HIDE_FIELD.CONFIG_WEB_FOOTER2') neq 'true'">
<tr>
<td class="titleTd">{$Think.lang.FIELD_FOOTER_2}</td>
<td class="inputTd"><editor name="web_footer2" height="140">{$vo.web_footer2}</editor></td>
</tr>
</if>
</table>
</div>

<div id="con_one_2" style="display:none">
<!-- Tab 2 -->
<table class="listTable">
<tr>
<td class="titleTd">{$Think.lang.FIELD_SEO_TITLE_HOME}</td>
<td class="inputTd"><input type="text" class="input" name="web_seoTitle" value="{$vo.web_seoTitle}" />
</td>
</tr>
<tr>
<td class="titleTd">{$Think.lang.FIELD_SEO_KEYWORDS_HOME}</td>
<td class="inputTd">
<input type="text" class="input" name="web_seoKeywords" value="{$vo.web_seoKeywords}" />
</td>
</tr>
<tr>
<td class="titleTd">{$Think.lang.FIELD_SEO_DESCRIPT_HOME}</td>
<td class="inputTd"><textarea name="web_seoDescript" class="noteTextarea">{$vo.web_seoDescript}</textarea></td>
</tr>
</table>
</div>

<div id="con_one_3" style="display:none">
<!-- Tab 3 -->

<table class="listTable">
<if condition="C('HIDE_FIELD.CONFIG_PAGENUM_ARTICLE') neq 'true'">
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_PAGENUM_ARTICLE}</td>
<td class="inputTd"><input type="text" class="input numInput" name="pagenum_article" value="{$vo.pagenum_article}" /> 条 / 页</td>
</tr>
</if>
<if condition="C('HIDE_FIELD.CONFIG_PAGENUM_GUESTBOOK') neq 'true'">
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_PAGENUM_GUESTBOOK}</td>
<td class="inputTd"><input type="text" class="input numInput" name="pagenum_guestbook" value="{$vo.pagenum_guestbook}" /> 条 / 页</td>
</tr>
</if>
<if condition="C('HIDE_FIELD.CONFIG_PAGENUM_COMMENT') neq 'true'">
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_PAGENUM_COMMENT}</td>
<td class="inputTd"><input type="text" class="input numInput" name="pagenum_comment" value="{$vo.pagenum_comment}" /> 条 / 页</td>
</tr>
</if>
<if condition="C('HIDE_FIELD.CONFIG_PAGENUM_OTHER') neq 'true'">
<tr>
<td class="titleTd">{$must}{$Think.lang.FIELD_PAGENUM_OTHER}</td>
<td class="inputTd"><input type="text" class="input numInput" name="pagenum_other" value="{$vo.pagenum_other}" /> 条 / 页</td>
</tr>
</if>
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