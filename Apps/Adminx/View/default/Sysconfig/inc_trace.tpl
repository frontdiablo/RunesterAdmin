

<div class="TabTitle">
<ul>
<li class="hover">Trace配置</li>
</ul>
</div>

{/* Tab 1 */}
<div id="con_one_1" class="hover">
<!-- Tab 1 -->

<table class="listTable" id="listTable">
<tr>
<td class="titleTdLong">是否显示Trace信息：<tip text="SHOW_PAGE_TRACE：控制是否在页面底部显示Trace信息,开发是建议开启" /></td>
<td class="inputTd">
	<div id="iSHOW_PAGE_TRACE" class="dropdown" tabindex="0"><p>{:getBoolSelectValue()}</p><ul>{:getBoolSelect()}</ul></div>
	<input type="hidden" id="SHOW_PAGE_TRACE" name="SHOW_PAGE_TRACE" value="" />
</td>
</tr>
<tr>
<td class="titleTdLong">Trace信息模板<tip text="TMPL_TRACE_FILE：设置自定义的Trace信息模板的文件路径" /></td>
<td class="inputTd">
<input type="text" name="TMPL_TRACE_FILE" id="TMPL_TRACE_FILE" class="input" />
</td>
</tr>
<tr>
<td class="titleTdLong">显示运行时间<tip text="SHOW_RUN_TIME：开启后在模板底部会显示一行程序执行状态的信息" /></td>
<td class="inputTd">
	<div id="iSHOW_RUN_TIME" class="dropdown" tabindex="0"><p>false</p><ul>{:getBoolSelect()}</ul></div>
	<input type="hidden" id="SHOW_RUN_TIME" name="SHOW_RUN_TIME" value="" />
</td>
</tr>
<tr>
<td class="titleTdLong">显示详细的运行时间<tip text="SHOW_ADV_TIME：开启后将在运行状态信息中显示程序从加载到输出结束各个阶段的耗费时间,关闭后只显示总的时间" /></td>
<td class="inputTd">
	<div id="iSHOW_ADV_TIME" class="dropdown" tabindex="0"><p>false</p><ul>{:getBoolSelect()}</ul></div>
	<input type="hidden" id="SHOW_ADV_TIME" name="SHOW_ADV_TIME" value="" />
</td>
</tr>
<tr>
<td class="titleTdLong">显示数据库读写次数<tip text="SHOW_DB_TIMES：开启后将在运行状态信息中显示数据库读写操作的次数" /></td>
<td class="inputTd">
	<div id="iSHOW_DB_TIMES" class="dropdown" tabindex="0"><p>false</p><ul>{:getBoolSelect()}</ul></div>
	<input type="hidden" id="SHOW_DB_TIMES" name="SHOW_DB_TIMES" value="" />
</td>
</tr>
<tr>
<td class="titleTdLong">显示缓存操作次数<tip text="SHOW_CACHE_TIMES：开启后将在运行状态信息中显示缓存操作此时" /></td>
<td class="inputTd">
	<div id="iSHOW_CACHE_TIMES" class="dropdown" tabindex="0"><p>false</p><ul>{:getBoolSelect()}</ul></div>
	<input type="hidden" id="SHOW_CACHE_TIMES" name="SHOW_CACHE_TIMES" value="" />
</td>
</tr>
<tr>
<td class="titleTdLong">显示内存开销<tip text="SHOW_USE_MEM：开启后将在运行状态信息中显示页面执行的内存开销" /></td>
<td class="inputTd">
	<div id="iSHOW_USE_MEM" class="dropdown" tabindex="0"><p>false</p><ul>{:getBoolSelect()}</ul></div>
	<input type="hidden" id="SHOW_USE_MEM" name="SHOW_USE_MEM" value="" />
</td>
</tr>
<tr>
<td class="titleTdLong">显示文件加载数量<tip text="SHOW_LOAD_FILE：开启后将在运行状态信息中显示页面执行过程加载的文件总体数量" /></td>
<td class="inputTd">
	<div id="iSHOW_LOAD_FILE" class="dropdown" tabindex="0"><p>false</p><ul>{:getBoolSelect()}</ul></div>
	<input type="hidden" id="SHOW_LOAD_FILE" name="SHOW_LOAD_FILE" value="" />
</td>
</tr>
<tr>
<td class="titleTdLong">显示函数调用次数<tip text="SHOW_FUN_TIMES：显示执行过程自定义函数(逗号前)调用的次数和系统函数(逗号后)调用的次数" /></td>
<td class="inputTd">
	<div id="iSHOW_FUN_TIMES" class="dropdown" tabindex="0"><p>false</p><ul>{:getBoolSelect()}</ul></div>
	<input type="hidden" id="SHOW_FUN_TIMES" name="SHOW_FUN_TIMES" value="" />
</td>
</tr>
</table>
<div class="bottomLine"></div>
