<div class="TabTitle">
<ul>
<li id="think1" onclick="setTab('think',1,5,'hover')" class="hover">常规配置</li>
<li id="think2" onclick="setTab('think',2,5,'hover')">模板内容替换</li>
<li id="think3" onclick="setTab('think',3,5,'hover')">模板编译行为</li>
<li id="think4" onclick="setTab('think',4,5,'hover')">布局配置</li>
<li id="think5" onclick="setTab('think',5,5,'hover')">标签配置</li>
</ul>
</div>
<div id="con_think_1" class="hover">
<table class="listTable" id="listTable">
<tr>
<td class="titleTdLong">模板文件后缀<tip text="TMPL_TEMPLATE_SUFFIX：默认为：.html" /></td>
<td class="inputTd">
<input type="text" name="TMPL_TEMPLATE_SUFFIX" id="TMPL_TEMPLATE_SUFFIX" class="input" />
</td>
</tr>
<tr>
<td class="titleTdLong">自动侦测模板主题<tip text="TMPL_DETECT_THEME：默认为：false" /></td>
<td class="inputTd">
	<div id="iTMPL_DETECT_THEME" class="dropdown" tabindex="0"><p>false</p><ul>{:getBoolSelect()}</ul></div>
	<input type="hidden" id="TMPL_DETECT_THEME" name="TMPL_DETECT_THEME" value="" />
</td>
</tr>
<tr>
<td class="titleTdLong">模板文件分隔符<tip text="TMPL_FILE_DEPR：只对分组模式有效，用来减少模板目录层级" /></td>
<td class="inputTd">
<select name="TMPL_FILE_DEPR" id="TMPL_FILE_DEPR">
			<option value="">/</option>
			<option value="-">-</option>
			<option value="_">_</option>
			<option value="~">~</option>
		</select>
</td>
</tr><tr>
<td class="titleTdLong">错误跳转页面模板<tip text="TMPL_ACTION_ERROR：Attion::error()的默认跳转页面的模板文件路径。默认值：THINK_PATH.‘Tpl/dispatch_jump.tpl’" /></td>
<td class="inputTd">
<input type="text" name="TMPL_ACTION_ERROR" id="TMPL_ACTION_ERROR" class="input" />
</td>
</tr>
<tr>
<td class="titleTdLong">成功跳转页面模板<tip text="TMPL_ACTION_SUCCESS：Action::success()的默认跳转页面的模板文件路径。默认值：THINK_PATH.‘Tpl/dispatch_jump.tpl’" /></td>
<td class="inputTd">
<input type="text" name="TMPL_ACTION_SUCCESS" id="TMPL_ACTION_SUCCESS" class="input" />
</td>
</tr>
<tr>
<td class="titleTdLong">禁用原生PHP代码<tip text="TMPL_DENY_PHP：禁止在模板中使用PHP代码。默认值：false,即不禁止使用PHP代码" /></td>
<td class="inputTd">
	<div id="iTMPL_DENY_PHP" class="dropdown" tabindex="0"><p>false</p><ul>{:getBoolSelect()}</ul></div>
	<input type="hidden" id="TMPL_DENY_PHP" name="TMPL_DENY_PHP" value="" />
</td>
</tr>
<tr>
<td class="titleTdLong">模板引擎禁用函数<tip text="TMPL_DENY_FUNC_LIST：默认值：echo,exit" /></td>
<td class="inputTd">
<input type="text" name="TMPL_DENY_FUNC_LIST"
				id="TMPL_DENY_FUNC_LIST" class="input" />
</td>
</tr>
<tr>
<td class="titleTdLong">模板标签左符号<tip text="TMPL_L_DELIM：默认为：｛" /></td>
<td class="inputTd">
<input type="text" name="TMPL_L_DELIM" id="TMPL_L_DELIM" class="input" />
</td>
</tr>
<tr>
<td class="titleTdLong">模板标签右符号<tip text="TMPL_R_DELIM：默认为：｝" /></td>
<td class="inputTd">
<input type="text" name="TMPL_R_DELIM" id="TMPL_R_DELIM" class="input" />
</td>
</tr>
<tr>
<td class="titleTdLong">模板变量点语法<tip text="TMPL_VAR_IDENTIFY：模板变量的点语法适用目标。默认为：array" /></td>
<td class="inputTd">
	<div id="iTMPL_VAR_IDENTIFY" class="dropdown" tabindex="0"><p>自动判断</p><ul>
	<li><a href='javascript:void(0)' rel='' name='自动判断'>自动判断</a></li>
	<li><a href='javascript:void(0)' rel='array' name='适用array'>适用array</a></li>
	<li><a href='javascript:void(0)' rel='obj' name='适用obj'>适用obj</a></li>
	</ul></div>
	<input type="hidden" id="TMPL_VAR_IDENTIFY" name="TMPL_VAR_IDENTIFY" value="" />
</td>
</tr>
</table>
</div>
<div id="con_think_2" style="display:none">
<table class="listTable" id="listTable">
<tr>
<td class="titleTdLong">模板内容替换<tip text="TMPL_PARSE_STRING：用来定义一段被多处引用的内容" /></td>
<td class="inputTd">
KEY
<input type="text" name="TMPL_PARSE_STRING[k1]" class="input" />
自动替换为
<input type="text" name="TMPL_PARSE_STRING[v1]" class="input" />

<input type="button" value="新增一行" class="TMPL_PARSE_STRING btn btn-small btn-primary" onclick="addRow(this)">
</td>
</tr>
</table>
</div>
<div id="con_think_3" style="display:none">
<table class="listTable" id="listTable">
<tr>
<td class="titleTdLong">移除空白和换行<tip text="TMPL_STRIP_SPACE：在模板解析时是否自动移除模板中多余的空格和换行，默认为True。（调试模式默认为false）" /></td>
<td class="inputTd">
	<div id="iTMPL_STRIP_SPACE" class="dropdown" tabindex="0"><p>false</p><ul>{:getBoolSelect()}</ul></div>
	<input type="hidden" id="TMPL_STRIP_SPACE" name="TMPL_STRIP_SPACE" value="" />
</td>
</tr>
<tr>
<td class="titleTdLong">开启模板编译缓存<tip text="TMPL_CACHE_ON：设为false会每次都重新编译模板，默认为true.(调试模式默认为false)" /></td>
<td class="inputTd">
	<div id="iTMPL_CACHE_ON" class="dropdown" tabindex="0"><p>false</p><ul>{:getBoolSelect()}</ul></div>
	<input type="hidden" id="TMPL_CACHE_ON" name="TMPL_CACHE_ON" value="" />
</td>
</tr>
<tr>
<td class="titleTdLong">模板缓存文件扩展名<tip text="TMPL_CACHFILE_SUFFIX：默认为:.php" /></td>
<td class="inputTd">
<input type="text" name="TMPL_CACHFILE_SUFFIX" id="TMPL_CACHFILE_SUFFIX" class="input" />
</td>
</tr>
<tr>
<td class="titleTdLong">模板缓存前缀<tip text="TMPL_CACHE_PREFIX：默认为空" /></td>
<td class="inputTd">
<input type="text" name="TMPL_CACHE_PREFIX" id="TMPL_CACHE_PREFIX" class="input" />
</td>
</tr>
<tr>
<td class="titleTdLong">模板缓存有效期<tip text="TMPL_CACHE_TIME：单位为秒。默认为:0，表示永久有效" /></td>
<td class="inputTd">
<input type="text" name="TMPL_CACHE_TIME" id="TMPL_CACHE_TIME" class="input" />
</td>
</tr>
</table>
</div>
<div id="con_think_4" style="display:none">
<table class="listTable" id="listTable">
<tr>
<td class="titleTdLong">开启模板布局<tip text="LAYOUT_ON：默认为：false" /></td>
<td class="inputTd">
	<div id="iLAYOUT_ON" class="dropdown" tabindex="0"><p>false</p><ul>{:getBoolSelect()}</ul></div>
	<input type="hidden" id="LAYOUT_ON" name="LAYOUT_ON" value="" />
</td>
</tr>
<tr>
<td class="titleTdLong">默认布局名称<tip text="LAYOUT_NAME：默认为：layout" /></td>
<td class="inputTd">
<input type="text" name="LAYOUT_NAME" id="LAYOUT_NAME" class="input" />
</td>
</tr>
<tr>
<td class="titleTdLong">布局模板内容标识<tip text="TMPL_LAYOUT_ITEM：默认为：__CONTENT__｝" /></td>
<td class="inputTd">
<input type="text" name="TMPL_LAYOUT_ITEM" id="TMPL_LAYOUT_ITEM" class="input" />
</td>
</tr>
</table>
</div>
<div id="con_think_5" style="display:none">
<table class="listTable" id="listTable">
<tr>
<td class="titleTdLong">内置标签库列表<tip text="TAGLIB_BUILD_IN：（设为内置标签后在模板中使用时可以不指定标签库名称，但不同标签库中不能有重名标签），多个标签库以逗号分隔。默认为：cx" /></td>
<td class="inputTd">
<input type="text" name="TAGLIB_BUILD_IN" id="TAGLIB_BUILD_IN" class="input" />
</td>
</tr>
<tr>
<td class="titleTdLong">其他标签库<tip text="TAGLIB_PRE_LOAD：(标签在模板中使用时需要指定标签库名称）" /></td>
<td class="inputTd">
<input type="text" name="TAGLIB_PRE_LOAD" id="TAGLIB_PRE_LOAD" class="input" />
</td>
</tr>
<tr>
<td class="titleTdLong">标签起始符<tip text="TAGLIB_BEGIN：默认为：&lt;" /></td>
<td class="inputTd">
<input type="text" name="TAGLIB_BEGIN" id="TAGLIB_BEGIN" class="input" />
</td>
</tr>
<tr>
<td class="titleTdLong">标签结束符<tip text="TAGLIB_END：默认为：&gt;" /></td>
<td class="inputTd">
<input type="text" name="TAGLIB_END" id="TAGLIB_END" class="input" />
</td>
</tr>
<tr>
<td class="titleTdLong">是否使用扩展标签库<tip text="TAGLIB_LOAD：是否使用内置标签库之外的其它标签库，默认自动检测" /></td>
<td class="inputTd">
	<div id="iTAGLIB_LOAD" class="dropdown" tabindex="0"><p>false</p><ul>{:getBoolSelect()}</ul></div>
	<input type="hidden" id="TAGLIB_LOAD" name="TAGLIB_LOAD" value="" />
</td>
</tr>
</table>
</div>
<div class="bottomLine"></div>