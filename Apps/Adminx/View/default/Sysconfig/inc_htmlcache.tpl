<div class="TabTitle">
<ul>
<li id="html1" onclick="setTab('html',1,2,'hover')" class="hover">静态缓存配置</li>
<li id="html2" onclick="setTab('html',2,2,'hover')">静态缓存规则</li>
</ul>
</div>

<div id="con_html_1" class="hover">
<table class="listTable" id="listTable">
<tr>
<td class="titleTdLong">开启静态缓存<tip text="HTML_CACHE_ON：静态缓存文件的根目录在HTML_PATH定义的路径下面，并且只有定义了静态规则的操作才会进行静态缓存" /></td>
<td class="inputTd">
	<div id="iHTML_CACHE_ON" class="dropdown" tabindex="0"><p>false</p><ul>{:getBoolSelect()}</ul></div>
	<input type="hidden" id="HTML_CACHE_ON" name="HTML_CACHE_ON" value="" />
</td>
</tr>
<tr>
<td class="titleTdLong">静态缓存扩展名<tip text="HTML_FILE_SUFFIX：默认为:.html" /></td>
<td class="inputTd">
<input type="text" name="HTML_FILE_SUFFIX" id="HTML_FILE_SUFFIX" class="input" />
</td>
</tr>
<tr>
<td class="titleTdLong">静态缓存时间<tip text="HTML_CACHE_TIME：单位为：秒。默认值:60" /></td>
<td class="inputTd">
<input type="text" name="HTML_CACHE_TIME" id="HTML_CACHE_TIME" class="input" />
</td>
</tr>
</table>
</div>
<div id="con_html_2" style="display:none">
<table class="listTable" id="listTable">
<tr>
<td class="titleTdLong">静态缓存规则<tip text="HTML_CACHE_RULES：控制器和操作设定缓存规则" /></td>
<td class="inputTd">
Module:Acton=>
<input type="text" name="HTML_CACHE_RULES[k1]" class="input" />
			
静态规则,有效期,附加规则
<input type="text" name="HTML_CACHE_RULES[v1]" class="input" />
<input type="button" value="新增一行" class="HTML_CACHE_RULES btn btn-small btn-primary" onclick="addRow(this)"><br />

</td>
</tr>
</table>
</div>
<div class="bottomLine"></div>