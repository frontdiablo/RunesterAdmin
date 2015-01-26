<div class="TabTitle">
<ul>
<li class="hover">SESSION配置</li>
</ul>
</div>
<table class="listTable" id="listTable">
<tr>
<td class="titleTdLong">自动开启session</td>
<td class="inputTd">
			<div id="iSESSION_AUTO_START" class="dropdown" tabindex="0"><p>默认</p><ul>
			<li><a href='javascript:void(0)' rel='' name='默认'>默认</a></li>
			<li><a href='javascript:void(0)' rel='true' name='true'>true</a></li>
			<li><a href='javascript:void(0)' rel='false' name='false'>false</a></li>
			</ul></div>
	<input type="hidden" id="SESSION_AUTO_START" name="SESSION_AUTO_START" value="" />
		
</td>
</tr>
<tr>
<td class="titleTdLong">id<tip text="id：session_id($id)" /></td>
<td class="inputTd">
<input type="text" name="SESSION_OPTIONS[id]" id="SESSION_OPTIONS_id" class="input" />
</td>
</tr>
<tr>
<td class="titleTdLong">name<tip text="name：session_name($name)," /></td>
<td class="inputTd">
<input type="text" name="SESSION_OPTIONS[name]" id="SESSION_OPTIONS_name" class="input" />
</td>
</tr>
<tr>
<td class="titleTdLong">expire<tip text="expire：session.gc_maxlifetime=expire" /></td>
<td class="inputTd">
<input type="text" name="SESSION_OPTIONS[expire]" id="SESSION_OPTIONS_expire" class="input" />
</td>
</tr>
<tr>
<td class="titleTdLong">path<tip text="path：session_save_path($path)" /></td>
<td class="inputTd">
<input type="text" name="SESSION_OPTIONS[path]" id="SESSION_OPTIONS_path" class="input" />
</td>
</tr>
<tr>
<td class="titleTdLong">prefix<tip text="prefix：session_name前缀" /></td>
<td class="inputTd">
<input type="text" name="SESSION_OPTIONS[prefix]" id="SESSION_OPTIONS_prefix" class="input" />
</td>
</tr>
<tr>
<td class="titleTdLong">domain<tip text="domain：session.cookie_domain=domain" /></td>
<td class="inputTd">
<input type="text" name="SESSION_OPTIONS[domain]" id="SESSION_OPTIONS_domain" class="input" />
</td>
</tr>
<tr>
<td class="titleTdLong">cache_expire<tip text="cache_expire：session_cache_expire($ce)" /></td>
<td class="inputTd">
<input type="text"
				name="SESSION_OPTIONS[cache_expire]" id="SESSION_OPTIONS_cache_expire" class="input" />
</td>
</tr>
<tr>
<td class="titleTdLong">cache_limiter<tip text="cache_limiter：session_cache_limiter()" /></td>
<td class="inputTd">

	<div id="iSESSION_OPTIONS_cache_limiter" class="dropdown" tabindex="0"><p>默认</p><ul>
		<li><a href='javascript:void(0)' rel='' name='默认'>默认</a></li>
		<li><a href='javascript:void(0)' rel='nocache' name='nocache'>nocache</a></li>
		<li><a href='javascript:void(0)' rel='public' name='public'>public</a></li>
		<li><a href='javascript:void(0)' rel='private_no_expire' name='private_no_expire'>private_no_expire</a></li>
		<li><a href='javascript:void(0)' rel='private' name='private'>private</a></li>
	</ul></div>
	<input type="hidden" id="SESSION_OPTIONS_cache_limiter" name="SESSION_OPTIONS[cache_limiter]" value="" />
</td>
</tr>
<tr>
<td class="titleTdLong">use_cookies<tip text="use_cookies：session.use_cookies" /></td>
<td class="inputTd">
	<div id="iSESSION_OPTIONS_co" class="dropdown" tabindex="0"><p>默认</p><ul>
		<li><a href='javascript:void(0)' rel='' name='默认'>默认</a></li>
		<li><a href='javascript:void(0)' rel='1' name='强制为是'>强制为是</a></li>
		<li><a href='javascript:void(0)' rel='0' name='强制为否'>强制为否</a></li>
	</ul></div>
	<input type="hidden" id="SESSION_OPTIONS_co" name="SESSION_OPTIONS[use_cookies]" value="" />
</td>
</tr>
<tr>
<td class="titleTdLong">use_trans_sid<tip text="use_trans_sid：session.use_trans_sid" /></td>
<td class="inputTd">
	<div id="iSESSION_OPTIONS_sid" class="dropdown" tabindex="0"><p>默认</p><ul>
		<li><a href='javascript:void(0)' rel='' name='默认'>默认</a></li>
		<li><a href='javascript:void(0)' rel='0' name='强制为否'>强制为否</a></li>
		<li><a href='javascript:void(0)' rel='1' name='强制为是'>强制为是</a></li>
	</ul></div>
	<input type="hidden" id="SESSION_OPTIONS_sid" name="SESSION_OPTIONS[use_trans_sid]" value="" />
</td>
</tr>
<tr>
<td class="titleTdLong">type<tip text="type：SESSION驱动类的类名，不含.class.php后缀" /></td>
<td class="inputTd">
<input type="text" name="SESSION_OPTIONS[type]" id="SESSION_OPTIONS_type" class="input" />
</td>
</tr>
</table>
<div class="bottomLine"></div>