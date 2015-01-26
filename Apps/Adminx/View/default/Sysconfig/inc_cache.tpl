<div class="TabTitle">
<ul>
<li class="hover">缓存配置</li>
</ul>
</div>

<table class="listTable" id="listTable">
<tr>
<td class="titleTdLong">缓存有效期<tip text="DATA_CACHE_TIME：通用设置项，设置缓存数据的有效期。默认为0,表示永久有效" /></td>
<td class="inputTd">
<input type="text" name="DATA_CACHE_TIME" id="DATA_CACHE_TIME" class="input" />
</td>
</tr>
<tr>
<td class="titleTdLong">缓存前缀<tip text="DATA_CACHE_PREFIX：如果服务器上运行有多个应用，可能需要设置缓存前缀避免缓存冲突" /></td>
<td class="inputTd">
<input type="text" name="DATA_CACHE_PREFIX" id="DATA_CACHE_PREFIX" class="input" />
</td>
</tr>
<tr>
<td class="titleTdLong">缓存类型<tip text="DATA_CACHE_TYPE：默认为file方式缓存，如果其他方式需为php安装所需扩展，并提供Extend类库中的相应缓存驱动" /></td>
<td class="inputTd">

	<div id="iDATA_CACHE_TYPE" class="dropdown" tabindex="0"><p>File</p><ul>
	<li><a href='javascript:void(0)' rel='' name='File'>File</a></li>
	<li><a href='javascript:void(0)' rel='Db' name='Db'>Db</a></li>
	<li><a href='javascript:void(0)' rel='Apc' name='Apc'>Apc</a></li>
	<li><a href='javascript:void(0)' rel='Memcache' name='Memcache'>Memcache</a></li>
	<li><a href='javascript:void(0)' rel='Shmop' name='Shmop'>Shmop</a></li>
	<li><a href='javascript:void(0)' rel='Sqlite' name='Sqlite'>Sqlite</a></li>
	<li><a href='javascript:void(0)' rel='Xcache' name='Xcache'>Xcache</a></li>
	<li><a href='javascript:void(0)' rel='Apachenote' name='Apachenote'>Apachenote</a></li>
	<li><a href='javascript:void(0)' rel='Eaccelerator' name='Eaccelerator'>Eaccelerator</a></li>
	</ul></div>
	<input type="hidden" id="DATA_CACHE_TYPE" name="DATA_CACHE_TYPE" value="" />
</td>
</tr>
<tr>
<td class="titleTdLong">数据缓存是否压缩<tip text="DATA_CACHE_COMPRESS：可节省缓存占用空间，但压缩解压占用CPU资源" /></td>
<td class="inputTd">
	<div id="iDATA_CACHE_COMPRESS" class="dropdown" tabindex="0"><p>false</p><ul>{:getBoolSelect()}</ul></div>
	<input type="hidden" id="DATA_CACHE_COMPRESS" name="DATA_CACHE_COMPRESS" value="" />
</td>
</tr>
<tr>
<td class="titleTdLong">数据缓存是否校验<tip text="DATA_CACHE_CHECK：缓存读写时执行数据校验" /></td>
<td class="inputTd">
	<div id="iDATA_CACHE_CHECK" class="dropdown" tabindex="0"><p>false</p><ul>{:getBoolSelect()}</ul></div>
	<input type="hidden" id="DATA_CACHE_CHECK" name="DATA_CACHE_CHECK" value="" />
</td>
</tr>
<tr>
<td class="titleTdLong">缓存存放目录<tip text="DATA_CACHE_PATH：只对file方式有效，设置缓存文件的存放目录，通常无需设置。默认为：Runtime/Temp" /></td>
<td class="inputTd">
<input type="text" name="DATA_CACHE_PATH" id="DATA_CACHE_PATH" class="input" />
</td>
</tr>
<tr>
<td class="titleTdLong">数据缓存使用子目录<tip text="DATA_CACHE_SUBDIR：根据缓存哈西标识自动创建子目录，提高缓存性能" /></td>
<td class="inputTd">
	<div id="iDATA_CACHE_SUBDIR" class="dropdown" tabindex="0"><p>false</p><ul>{:getBoolSelect()}</ul></div>
	<input type="hidden" id="DATA_CACHE_SUBDIR" name="DATA_CACHE_SUBDIR" value="" />
</td>
</tr>
<tr>
<td class="titleTdLong">子目录缓存深度<tip text="DATA_PATH_LEVEL：根据缓存数据量指定一个合适的缓存深度，不要太深，否则将生成大量的目录。默认为：1" /></td>
<td class="inputTd">
<input type="text" name="DATA_PATH_LEVEL" id="DATA_PATH_LEVEL" class="input" />
</td>
</tr>
</table>
<div class="bottomLine"></div>