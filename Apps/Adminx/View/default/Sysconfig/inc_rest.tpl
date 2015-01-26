<div class="TabTitle">
<ul>
<li id="rest1" onclick="setTab('rest',1,2,'hover')" class="hover">REST配置</li>
<li id="rest2" onclick="setTab('rest',2,2,'hover')">资源输出类型</li>
</ul>
</div>
<div id="con_rest_1" class="hover">
<table class="listTable" id="listTable">
<tr>
<td class="titleTdLong">允许的请求类型<tip text="REST_METHOD_LIST：默认值：get,post,put,delete" /></td>
<td class="inputTd">
<input type="text" name="REST_METHOD_LIST" id="REST_METHOD_LIST" class="input" />
</td>
</tr>
<tr>
<td class="titleTdLong">默认请求类型<tip text="REST_DEFAULT_METHOD：默认值：get" /></td>
<td class="inputTd">
	<div id="iREST_DEFAULT_METHOD" class="dropdown" tabindex="0"><p>get</p><ul>
		<li><a href='javascript:void(0)' rel='' name='get'>get</a></li>
		<li><a href='javascript:void(0)' rel='post' name='post'>post</a></li>
		<li><a href='javascript:void(0)' rel='put' name='put'>put</a></li>
		<li><a href='javascript:void(0)' rel='delete' name='delete'>delete</a></li>
	</ul></div>
	<input type="hidden" id="REST_DEFAULT_METHOD" name="REST_DEFAULT_METHOD" value="" />
</td>
</tr>
<tr>
<td class="titleTdLong">资源类型列表<tip text="REST_CONTENT_TYPE_LIST：默认值：html,xml,json,rss" /></td>
<td class="inputTd">
<input type="text" name="REST_CONTENT_TYPE_LIST" id="REST_CONTENT_TYPE_LIST" class="input" />
</td>
</tr>
<tr>
<td class="titleTdLong">默认资源类型<tip text="REST_DEFAULT_TYPE：默认值：html" /></td>
<td class="inputTd">

	<div id="iREST_DEFAULT_TYPE" class="dropdown" tabindex="0"><p>html</p><ul>
		<li><a href='javascript:void(0)' rel='' name='html'>html</a></li>
		<li><a href='javascript:void(0)' rel='xml' name='xml'>xml</a></li>
		<li><a href='javascript:void(0)' rel='json' name='json'>json</a></li>
		<li><a href='javascript:void(0)' rel='rss' name='rss'>rss</a></li>
	</ul></div>
	<input type="hidden" id="REST_DEFAULT_TYPE" name="REST_DEFAULT_TYPE" value="" />

</td>
</tr>
</table>
</div>
<div id="con_rest_2" style="display:none">
<table class="listTable" id="listTable">
<tr>
<td class="titleTdLong">资源输出类型<tip text="REST_OUTPUT_TYPE：默认值：xml对应application/xml；json对应application/json；html对应text/html" /></td>
<td class="inputTd">

资源类型=>
<input type="text" name="REST_OUTPUT_TYPE[k1]" class="input" />
MIME
<input type="text" name="REST_OUTPUT_TYPE[v1]" class="input" />
<input type="button" value="新增一行" class="REST_OUTP btn btn-small btn-primary " onclick="addRow(this)"><br />
</td>
</tr>

</table>
</div>
<div class="bottomLine"></div>