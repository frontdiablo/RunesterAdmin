<div class="TabTitle">
<ul>
<li class="hover">错误和日志配置</li>
</ul>
</div>


<table class="listTable" id="listTable">
<tr>
<td class="titleTdLong">异常页面模板<tip text="TMPL_EXCEPTION_FILE：发生异常时渲染的模板。默认值THINK_PATH.‘Tpl/think_exception.tpl’" /></td>
<td class="inputTd">
<input type="text" name="TMPL_EXCEPTION_FILE" id="TMPL_EXCEPTION_FILE" class="input" />
</td>
</tr>
<tr>
<td class="titleTdLong">显示错误信息<tip text="SHOW_ERROR_MSG：可以设置false关闭错误信息的显示并设置统一的错误提示信息。默认为：false（调试模式默认为：true）" /></td>
<td class="inputTd">
	<div id="iSHOW_ERROR_MSG" class="dropdown" tabindex="0"><p>false</p><ul>{:getBoolSelect()}</ul></div>
	<input type="hidden" id="SHOW_ERROR_MSG" name="SHOW_ERROR_MSG" value="" />
</td>
</tr>
<tr>
<td class="titleTdLong">默认错误信息<tip text="ERROR_MESSAGE：默认值为：页面错误！请稍后再试～" /></td>
<td class="inputTd">
<input type="text" name="ERROR_MESSAGE" id="ERROR_MESSAGE" class="input" />
</td>
</tr>
<tr>
<td class="titleTdLong">错误重定向页面<tip text="ERROR_PAGE：应该是一个可以在浏览器直接访问的页面文件的url。" /></td>
<td class="inputTd">
<input type="text" name="ERROR_PAGE" id="ERROR_PAGE" class="input" />
</td>
</tr>
<tr>
<td class="titleTdLong">trace信息抛出异常<tip text="TRACE_EXCEPTION：对trace函数有效。当trace函数发生错误是是否抛出异常" /></td>
<td class="inputTd">
	<div id="iTRACE_EXCEPTION" class="dropdown" tabindex="0"><p>false</p><ul>{:getBoolSelect()}</ul></div>
	<input type="hidden" id="TRACE_EXCEPTION" name="TRACE_EXCEPTION" value="" />
</td>
</tr>
<tr>
<td class="titleTdLong">是否开启日志记录<tip text="LOG_RECORD：默认为:false（调试模式默认为true）" /></td>
<td class="inputTd">
	<div id="iLOG_RECORD" class="dropdown" tabindex="0"><p>false</p><ul>{:getBoolSelect()}</ul></div>
	<input type="hidden" id="LOG_RECORD" name="LOG_RECORD" value="" />
</td>
</tr>
<tr>
<td class="titleTdLong">日志记录类型<tip text="LOG_TYPE：日志记录方式" /></td>
<td class="inputTd">
	<div id="iLOG_TYPE" class="dropdown" tabindex="0"><p>文件</p><ul>
	<li><a href='javascript:void(0)' rel='' name='文件'>文件</a></li>
	<li><a href='javascript:void(0)' rel='0' name='系统'>系统</a></li>
	<li><a href='javascript:void(0)' rel='1' name='邮件'>邮件</a></li>
	<li><a href='javascript:void(0)' rel='4' name='SAPI'>SAPI</a></li>
	</ul></div>
	<input type="hidden" id="LOG_TYPE" name="LOG_TYPE" value="" />
</td>
</tr>
<tr>
<td class="titleTdLong">日志记录目标<tip text="LOG_DEST：即error_log()函数的第三个参数" /></td>
<td class="inputTd">
<input type="text" name="LOG_DEST" id="LOG_DEST" class="input" />
</td>
</tr>
<tr>
<td class="titleTdLong">日记记录额外信息<tip text="LOG_EXTRA：即error_log()函数的第4个参数" /></td>
<td class="inputTd">
<input type="text" name="LOG_EXTRA" id="LOG_EXTRA" class="input" />
</td>
</tr>
<tr>
<td class="titleTdLong">日志记录级别<tip text="LOG_LEVEL：多个级别用逗号隔开。EMERG-严重错误，导致系统崩溃无法使用；ALERT-警戒性错误，必须被立即修改的错误；CRIT-临界值错误，超过临界值的错误；ERR-一般性错误；WARN-警告性错误，需要发出警告的错误；NOTICE-通知，程序可以运行但是还不够完美的错误；INFO-信息，程序输出信息；DEBUG-调试，用于调试信息；SQL-SQL语句，该级别只在调试模式开启时有效；" /></td>
<td class="inputTd">
<input type="text" name="LOG_LEVEL" id="LOG_LEVEL" class="input" />
</td>
</tr>
<tr>
<td class="titleTdLong">日志文件最大值<tip text="LOG_FILE_SIZE：单位：字节。如果当天的日志文件超过了该大小，会自动分割." /></td>
<td class="inputTd">
<input type="text" name="LOG_FILE_SIZE" id="LOG_FILE_SIZE" class="input" />
</td>
</tr>
<tr>
<td class="titleTdLong">是否记录异常信息日志<tip text="LOG_EXCEPTION_RECORD：默认为：false（调试模式默认为true）" /></td>
<td class="inputTd">
	<div id="iLOG_EXCEPTION_RECORD" class="dropdown" tabindex="0"><p>false</p><ul>{:getBoolSelect()}</ul></div>
	<input type="hidden" id="LOG_EXCEPTION_RECORD" name="LOG_EXCEPTION_RECORD" value="" />
</td>
</tr>
<tr>
<td class="titleTdLong">调试状态<tip text="APP_STATUS：在调试模式下，载入的配置文件名，默认为:debug，即在调试模式下ThinkHP/Conf/debug.php中的配置将覆盖项目config.php中的同名配置,你可以在项目目录下创建debug.php来覆盖ThinkPHP/Conf/debug.php的配置，也可以创建其他专用的状态配置" /></td>
<td class="inputTd">
<input type="text" name="APP_STATUS" id="APP_STATUS" class="input" />
</td>
</tr>
</table>
<div class="bottomLine"></div>