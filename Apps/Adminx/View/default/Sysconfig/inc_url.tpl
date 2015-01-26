<div class="TabTitle">
<ul>
<li id="url1" onclick="setTab('url',1,2,'hover')" class="hover">URL模式</li>
<li id="url2" onclick="setTab('url',2,2,'hover')">URL路由</li>
</ul>
</div>


<div id="con_url_1" class="hover">
<table class="listTable" id="listTable">
<tr>
<td class="titleTdLong">URL不区分大小写<tip text="URL_CASE_INSENSITIVE：设为true后,url将不区分大小写." /></td>
<td class="inputTd">
	<div id="iURL_CASE_INSENSITIVE" class="dropdown" tabindex="0"><p>false</p><ul>{:getBoolSelect()}</ul></div>
	<input type="hidden" id="URL_CASE_INSENSITIVE" name="URL_CASE_INSENSITIVE" value="" />
</td>
</tr>
<tr>
<td class="titleTdLong">Action参数绑定<tip text="URL_PARAMS_BIND：将url的GET参数与Action方法的参数进行绑定" /></td>
<td class="inputTd">
	<div id="iURL_PARAMS_BIND" class="dropdown" tabindex="0"><p>false</p><ul>{:getBoolSelect()}</ul></div>
	<input type="hidden" id="URL_PARAMS_BIND" name="URL_PARAMS_BIND" value="" />
</td>
</tr>
<tr>
<td class="titleTdLong">URL模式<tip text="URL_MODEL：设置url模式" /></td>
<td class="inputTd">
	<div id="iURL_MODEL" class="dropdown" tabindex="0"><p>pathinfo模式</p><ul>
	<li><a href='javascript:void(0)' rel='' name='pathinfo模式'>pathinfo模式</a></li>
	<li><a href='javascript:void(0)' rel='3' name='兼容模式'>兼容模式</a></li>
	<li><a href='javascript:void(0)' rel='0' name='普通模式'>普通模式</a></li>
	<li><a href='javascript:void(0)' rel='2' name='rewrite模式'>rewrite模式</a></li>
	</ul></div>
	<input type="hidden" id="URL_MODEL" name="URL_MODEL" value="" />
</td>
</tr>

<tr>
<td class="titleTdLong">pathinfo分割符<tip text="URL_PATHINFO_DEPR：Pathinfo模式中URL的参数分隔符" /></td>
<td class="inputTd">
	<div id="iURL_PATHINFO_DEPR" class="dropdown" tabindex="0"><p>/</p><ul>
	<li><a href='javascript:void(0)' rel='' name='/'>/</a></li>
	<li><a href='javascript:void(0)' rel='-' name='-'>-</a></li>
	<li><a href='javascript:void(0)' rel='~' name='~'>~</a></li>
	<li><a href='javascript:void(0)' rel='_' name='_'>_</a></li>
	</ul></div>
	<input type="hidden" id="URL_PATHINFO_DEPR" name="URL_PATHINFO_DEPR" value="" />	
</td>
</tr>
<tr>
<td class="titleTdLong">pathinfo伪静态后缀<tip text="URL_HTML_SUFFIX：在pathinfo模式的url尾部增加后缀，支持用“|”设置多个后缀" /></td>
<td class="inputTd">
<input type="text" name="URL_HTML_SUFFIX" id="URL_HTML_SUFFIX" class="input" />
</td>
</tr>
<tr>
<td class="titleTdLong">404页面<tip text="URL_404_REDIRECT：一个可直接在浏览器访问的404页面的网址，不能是本地文件路径" /></td>
<td class="inputTd">
<input type="text" name="URL_404_REDIRECT" id="URL_404_REDIRECT" class="input" />
</td>
</table>
</div>

<div id="con_url_2" style="display:none">
<table class="listTable" id="listTable">
<tr>
<td class="titleTdLong">开启URL路由</td>
<td class="inputTd">
	<div id="iURL_ROUTER_ON" class="dropdown" tabindex="0"><p>false</p><ul>{:getBoolSelect()}</ul></div>
	<input type="hidden" id="URL_ROUTER_ON" name="URL_ROUTER_ON" value="" />
</td>
</tr>
<tr>
<td class="titleTdLong">URL规则<tip text="URL_ROUTE_RULES：‘路由规则’=&gt;‘匹配目标’" /></td>
<td class="inputTd">
匹配规则 <input type="text" name="URL_ROUTE_RULES[k1]" class="input" />
转换目标 <input type="text" name="URL_ROUTE_RULES[v1]" class="input" />
<input type="button" value="新增规则" class="URL_ROUTE_RULES btn btn-primary btn-small" onclick="addRow(this)">
</td>
</tr>
</table>
</div>
<div class="bottomLine"></div>