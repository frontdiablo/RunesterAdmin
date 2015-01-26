<div class="TabTitle">
<ul>
<li id="other1" onclick="setTab('other',1,3,'hover')" class="hover">输入输出</li>
<li id="other2" onclick="setTab('other',2,3,'hover')">函数和变量</li>
<li id="other3" onclick="setTab('other',3,3,'hover')">动态配置文件</li>
</ul>
</div>

<div id="con_other_1" class="hover">
<table class="listTable" id="listTable">
<tr>
<td class="titleTdLong">MIME输出类型<tip text="TMPL_CONTENT_TYPE：模板输出时发送的文档MIME类型，默认为：text/html" /></td>
<td class="inputTd">
<input type="text" name="TMPL_CONTENT_TYPE"	id="TMPL_CONTENT_TYPE" class="input" />
</td>
</tr>
<tr>
<td class="titleTdLong">默认输出编码<tip text="DEFAULT_CHARSET：响应头信息Content-Type中的字符集设置，默认为：utf-8" /></td>
<td class="inputTd">
	<div id="iDEFAULT_CHARSET" class="dropdown" tabindex="0"><p>utf-8</p><ul>
		<li><a href='javascript:void(0)' rel='' name='utf-8'>utf-8</a></li>
		<li><a href='javascript:void(0)' rel='gb2312' name='gb2312'>gb2312</a></li>
		<li><a href='javascript:void(0)' rel='gbk' name='gbk'>gbk</a></li>
		<li><a href='javascript:void(0)' rel='big5' name='big5'>big5</a></li>
		<li><a href='javascript:void(0)' rel='latin1' name='latin1'>latin1</a></li>
	</ul></div>
	<input type="hidden" id="DEFAULT_CHARSET" name="DEFAULT_CHARSET" value="" />
</td>
</tr>
<tr>
<td class="titleTdLong">HTTP缓存Header<tip text="HTTP_CACHE_CONTROL：响应头信息中的Cache-control设置" /></td>
<td class="inputTd">
	<div id="iHTTP_CACHE_CONTROL" class="dropdown" tabindex="0"><p>private</p><ul>
		<li><a href='javascript:void(0)' rel='' name='private'>private</a></li>
		<li><a href='javascript:void(0)' rel='no-cache' name='no-cache'>no-cache</a></li>
		<li><a href='javascript:void(0)' rel='must-revalidate' name='must-revalidate'>must-revalidate</a></li>
		<li><a href='javascript:void(0)' rel='max-age' name='max-age'>max-age</a></li>
		<li><a href='javascript:void(0)' rel='min-fresh' name='min-fresh'>min-fresh</a></li>
		<li><a href='javascript:void(0)' rel='max-stale' name='max-stale'>max-stale</a></li>
		<li><a href='javascript:void(0)' rel='no-store' name='no-store'>no-store</a></li>
	</ul></div>
	<input type="hidden" id="HTTP_CACHE_CONTROL" name="HTTP_CACHE_CONTROL" value="" />
</td>
</tr>
<tr>
<td class="titleTdLong">启用输出压缩<tip text="OUTPUT_ENCODE：输出时自动压缩数据" /></td>
<td class="inputTd">
	<div id="iOUTPUT_ENCODE" class="dropdown" tabindex="0"><p>false</p><ul>{:getBoolSelect()}</ul></div>
	<input type="hidden" id="OUTPUT_ENCODE" name="OUTPUT_ENCODE" value="" />
</td>
</tr>
<tr>
<td class="titleTdLong">默认时区<tip text="DEFAULT_TIMEZONE：默认为PRC" /></td>
<td class="inputTd">
<input type="text" name="DEFAULT_TIMEZONE" id="DEFAULT_TIMEZONE" class="input" />
</td>
</tr>
<tr>
<td class="titleTdLong">默认ajax返回类型<tip text="DEFAULT_AJAX_RETURN：Action::ajaxReturn()的默认返回类型" /></td>
<td class="inputTd">
	<div id="iDEFAULT_AJAX_RETURN" class="dropdown" tabindex="0"><p>JSON</p><ul>
		<li><a href='javascript:void(0)' rel='' name='JSON'>JSON</a></li>
		<li><a href='javascript:void(0)' rel='jsonp' name='jsonp'>jsonp</a></li>
		<li><a href='javascript:void(0)' rel='XML' name='XML'>XML</a></li>
		<li><a href='javascript:void(0)' rel='EVAL' name='EVAL'>EVAL</a></li>
	</ul></div>
	<input type="hidden" id="DEFAULT_AJAX_RETURN" name="DEFAULT_AJAX_RETURN" value="" />
</td>
</tr>
</table>
</div>

<div id="con_other_2" style="display:none">
<table class="listTable" id="listTable">
<tr>
<td class="titleTdLong">默认jsonp处理函数<tip text="DEFAULT_JSONP_HANDLER：当Acton::ajaxReturn()返回类型设为jsonp时，内部处理数据的函数。默认为jsonpRetrun函数" /></td>
<td class="inputTd">
<input type="text" name="DEFAULT_JSONP_HANDLER" id="DEFAULT_JSONP_HANDLER" class="input" />
</td>
</tr>
<tr>
<td class="titleTdLong">默认变量过滤函数<tip text="DEFAULT_FILTER：调用$this-&gt_get(‘变量名’)；$this-&gt_post(‘变量名’)内部对数据过滤的方式。默认为：htmlspecialchars函数，多个用逗号隔开。" /></td>
<td class="inputTd">
<input type="text" name="DEFAULT_FILTER" id="DEFAULT_FILTER" class="input" />
</td>
</tr>
<tr>
<td class="titleTdLong">全局变量过滤函数<tip text="VAR_FILTERS：默认为空。如果设置了VAR_FILTERS参数，对GET/POST系统变量会自动进行过滤，多个用逗号分割" /></td>
<td class="inputTd">
<input type="text" name="VAR_FILTERS" id="VAR_FILTERS" class="input" />
</td>
</tr>
<tr>
<td class="titleTdLong">isAjax标记变量<tip text="VAR_AJAX_SUBMIT：Action::isAjax()方法可以识别出来自jQuery的ajax请求，但如果使用其他ajax类库，需要使用此配置设定用来进行ajax标识的表单变量" /></td>
<td class="inputTd">
<input type="text" name="VAR_AJAX_SUBMIT" id="VAR_AJAX_SUBMIT" class="input" />
</td>
</tr>
<tr>
<td class="titleTdLong">jsonp请求标记变量<tip text="VAR_JSONP_HANDLER：用于通过GET参数为Action::ajaxReturn()方法指定jsonp数据处理函数。假设你定义了多个jsonp数据处理函数，那么在ajax请求的时候，应该告诉ajaxReturn使用哪个函数来处理jsonp数据，那么就必须规定一个GET变量用于沟通。假如配置为：‘VAR_JSONP_HANDLER’=&gt;‘getjsonp’，那么在发送ajax请求的时候附加一个GET变量getjson=myjsonpfunc，ajaxReturn检测到这个变量就会调用myjsonpfunc去处理jsonp数据" /></td>
<td class="inputTd">
<input type="text" name="VAR_JSONP_HANDLER" id="VAR_JSONP_HANDLER" class="input" />
</td>
</tr>
<tr>
<td class="titleTdLong">自动载入函数库文件<tip text="LOAD_EXT_FILE：Common目录下需要自动载入的函数文件，多个用逗号隔开。假设你在APP/Common目录下定义了函数文件：test.php和test2.php，如果要使程序能调用这两个文件中的函数，则在右侧填写：test，test2。最后生成的配置结果为：‘LOAD_EXT_FILE’=&gt;‘test,test2’" /></td>
<td class="inputTd">
<input type="text" name="LOAD_EXT_FILE" id="LOAD_EXT_FILE" class="input" />
</td>
</tr>
</table>
</div>

<div id="con_other_3" style="display:none">
<table class="listTable" id="listTable">
<tr>
<td class="titleTdLong">配置文件名<tip text="LOAD_EXT_CONFIG：默认配置会编译如缓存，修改后需重新编译。扩展配置则不会编译入缓存。扩展配置文件格式也是返回一个配置数组。" /></td>
<td class="inputTd">
KEY或NumberIndex
<input type="text" name="LOAD_EXT_CONFIG[k1]" class="input" />
配置文件名
<input type="text" name="LOAD_EXT_CONFIG[v1]" class="input" />
<input type="button" value="新增" class="LOAD_EXT_CONFIG btn btn-small btn-primary" onclick="addRow(this)">
</td>
</tr>
</table>
</div>
