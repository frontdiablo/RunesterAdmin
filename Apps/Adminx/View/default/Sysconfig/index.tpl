<include file="Public:pub_top" />
<script type="text/javascript">
$(function(){
	$.divselect("#iSHOW_PAGE_TRACE","#SHOW_PAGE_TRACE");
	$.divselect("#iSHOW_RUN_TIME","#SHOW_RUN_TIME");
	$.divselect("#iSHOW_ADV_TIME","#SHOW_ADV_TIME");
	$.divselect("#iSHOW_DB_TIMES","#SHOW_DB_TIMES");
	$.divselect("#iSHOW_CACHE_TIMES","#SHOW_CACHE_TIMES");
	$.divselect("#iSHOW_USE_MEM","#SHOW_USE_MEM");
	$.divselect("#iSHOW_LOAD_FILE","#SHOW_LOAD_FILE");
	$.divselect("#iSHOW_FUN_TIMES","#SHOW_FUN_TIMES");
	$.divselect("#iDATA_CACHE_TYPE","#DATA_CACHE_TYPE");
	$.divselect("#iDATA_CACHE_COMPRESS","#DATA_CACHE_COMPRESS");
	$.divselect("#iDATA_CACHE_CHECK","#DATA_CACHE_CHECK");
	$.divselect("#iDATA_CACHE_SUBDIR","#DATA_CACHE_SUBDIR");
	$.divselect("#iDB_DEPLOY_TYPE","#DB_DEPLOY_TYPE");
	$.divselect("#iDB_RW_SEPARATE","#DB_RW_SEPARATE");
	$.divselect("#iDB_SQL_BUILD_CACHE","#DB_SQL_BUILD_CACHE");
	$.divselect("#iDB_SQL_BUILD_QUEUE","#DB_SQL_BUILD_QUEUE");
	$.divselect("#iDB_SQL_LOG","#DB_SQL_LOG");
	$.divselect("#iDB_FIELDTYPE_CHECK","#DB_FIELDTYPE_CHECK");
	$.divselect("#iDB_FIELDS_CACHE","#DB_FIELDS_CACHE");
	$.divselect("#iSHOW_ERROR_MSG","#SHOW_ERROR_MSG");
	$.divselect("#iTRACE_EXCEPTION","#TRACE_EXCEPTION");
	$.divselect("#iLOG_RECORD","#LOG_RECORD");
	$.divselect("#iLOG_TYPE","#LOG_TYPE");
	$.divselect("#iLOG_EXCEPTION_RECORD","#LOG_EXCEPTION_RECORD");
	$.divselect("#iHTML_CACHE_ON","#HTML_CACHE_ON");
	$.divselect("#iDEFAULT_CHARSET","#DEFAULT_CHARSET");
	$.divselect("#iHTTP_CACHE_CONTROL","#HTTP_CACHE_CONTROL");
	$.divselect("#iOUTPUT_ENCODE","#OUTPUT_ENCODE");
	$.divselect("#iDEFAULT_AJAX_RETURN","#DEFAULT_AJAX_RETURN");
	$.divselect("#iREST_DEFAULT_METHOD","#REST_DEFAULT_METHOD");
	$.divselect("#iREST_DEFAULT_TYPE","#REST_DEFAULT_TYPE");
	$.divselect("#iSESSION_OPTIONS_cache_limiter","#SESSION_OPTIONS_cache_limiter");
	$.divselect("#iSESSION_OPTIONS_co","#SESSION_OPTIONS_co");
	$.divselect("#iSESSION_OPTIONS_sid","#SESSION_OPTIONS_sid");
	$.divselect("#iSESSION_AUTO_START","#SESSION_AUTO_START");
	$.divselect("#iSESSION_OPTIONS[use_cookies]","#SESSION_OPTIONS_co");
	$.divselect("#iTOKEN_ON","#TOKEN_ON");
	$.divselect("#iTOKEN_RESET","#TOKEN_RESET");
	$.divselect("#iTMPL_DETECT_THEME","#TMPL_DETECT_THEME");
	$.divselect("#iTMPL_FILE_DEPR","#TMPL_FILE_DEPR");
	$.divselect("#iTMPL_DENY_PHP","#TMPL_DENY_PHP");
	$.divselect("#iTMPL_VAR_IDENTIFY","#TMPL_VAR_IDENTIFY");
	$.divselect("#iTMPL_STRIP_SPACE","#TMPL_STRIP_SPACE");
	$.divselect("#iTMPL_CACHE_ON","#TMPL_CACHE_ON");
	$.divselect("#iLAYOUT_ON","#LAYOUT_ON");
	$.divselect("#iTAGLIB_LOAD","#TAGLIB_LOAD");
	$.divselect("#iURL_CASE_INSENSITIVE","#URL_CASE_INSENSITIVE");
	$.divselect("#iURL_PARAMS_BIND","#URL_PARAMS_BIND");
	$.divselect("#iURL_MODEL","#URL_MODEL");
	$.divselect("#iURL_PATHINFO_DEPR","#URL_PATHINFO_DEPR");
	$.divselect("#iURL_ROUTER_ON","#URL_ROUTER_ON");
});
</script>
</head>
<body>
<include file="Public:pub_header" />

<table class="ContainerTable">
<tr>
<td class="ContainerLeft"><include file="Public:pub_sidebar" /></td>
<td class="ContainerInline"><include file="Sysconfig:pub_sidebar" /></td>
<td class="ContainerRight">
<div id="pageTitle">
<h1>网站项目配置</h1>
</div>
<div id="pageTitleBottom"></div>
<br /><br />

<div id="basic-accordian" >

<form enctype="multipart/form-data" method="POST" name="myform"  action="{:U('Page/insert')}">

<include file="Sysconfig:inc_trace" />{/* Trace配置 */}

<br /><br /><br />
<include file="Sysconfig:inc_url" />{/* URL配置 */}

<br /><br /><br />
<include file="Sysconfig:inc_db" />{/* 数据库配置 */}

<br /><br /><br />
<include file="Sysconfig:inc_group" />{/* 分组配置 */}

<br /><br /><br />
<include file="Sysconfig:inc_think" />{/* THINK引擎配置 */}

<br /><br /><br />
<include file="Sysconfig:inc_cache" />{/* 缓存配置 */}

<br /><br /><br />
<include file="Sysconfig:inc_error_log" />{/* 错误和日志配置 */}

<br /><br /><br />
<include file="Sysconfig:inc_session" />{/* SESSION配置 */}

<br /><br /><br />
<include file="Sysconfig:inc_cookie" />{/* Cookie配置 */}

<br /><br /><br />
<include file="Sysconfig:inc_rest" />{/* REST配置 */}

<br /><br /><br />
<include file="Sysconfig:inc_htmlcache" />{/* 静态缓存配置 */}

<br /><br /><br />
<include file="Sysconfig:inc_token" />{/* 表单token */}

<br /><br /><br />
<include file="Sysconfig:inc_other" />{/* 其他配置 */}

<div class="listTableBottom">
<input type='submit' class='btn btnBlue' value='设置' />
</div>
</form>
</div>

</td>
</tr>

</table>

</body>
</html>
<load href="__RESFUN__/editor/kindeditor-min.js" />
<load href="__RESFUN__/editor/config-webconfig.js" />
<load href="__RESFUN__/DateActive/WdatePicker.js" />
<include file="Public:pub_bottom" />

