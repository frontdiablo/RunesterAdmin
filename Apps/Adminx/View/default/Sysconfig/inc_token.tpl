<div class="TabTitle">
<ul>
<li class="hover">表单token</li>
</ul>
</div>
<table class="listTable" id="listTable">
<tr>
<td class="titleTdLong">开启token<tip text="TOKEN_ON：是否启用表单令牌" /></td>
<td class="inputTd">
	<div id="iTOKEN_ON" class="dropdown" tabindex="0"><p>false</p><ul>{:getBoolSelect()}</ul></div>
	<input type="hidden" id="TOKEN_ON" name="TOKEN_ON" value="" />
</td>
</tr>
<tr>
<td class="titleTdLong">令牌错误后是否重置<tip text="TOKEN_RESET：令牌验证失败后是否自动重置令牌" /></td>
<td class="inputTd">
	<div id="iTOKEN_RESET" class="dropdown" tabindex="0"><p>false</p><ul>{:getBoolSelect()}</ul></div>
	<input type="hidden" id="TOKEN_RESET" name="TOKEN_RESET" value="" />
</td>
</tr>
<tr>
<td class="titleTdLong">令牌生成函数<tip text="TOKEN_TYPE：用于生成验证字符串的函数,默认值:md5" /></td>
<td class="inputTd">
<input type="text" name="TOKEN_TYPE" id="TOKEN_TYPE" class="input" />
</td>
</tr>
<tr>
<td class="titleTdLong">表单隐藏字段名称<tip text="TOKEN_NAME：自动在表单插入的令牌隐藏域,默认为:__hash__" /></td>
<td class="inputTd">
<input type="text" name="TOKEN_NAME" id="TOKEN_NAME" class="input" />
</td>
</tr>
</table>
<div class="bottomLine"></div>