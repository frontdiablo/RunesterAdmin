<div class="TabTitle">
<ul>
<li id="db1" onclick="setTab('db',1,2,'hover')" class="hover">分布式数据库</li>
<li id="db2" onclick="setTab('db',2,2,'hover')">Model配置</li>
</ul>
</div>
<div id="con_db_1" class="hover">
<table class="listTable" id="listTable">
<tr>
<td class="titleTdLong">数据库模式<tip text="DB_DEPLOY_TYPE：在主从模式下，数据库连接不能使用DSN方式" /></td>
<td class="inputTd">
	<div id="iDB_DEPLOY_TYPE" class="dropdown" tabindex="0"><p>单服务器</p><ul>
		<li><a href='javascript:void(0)' rel='' name='单服务器'>单服务器</a></li>
		<li><a href='javascript:void(0)' rel='1' name='主从模式'>主从模式</a></li>
	</ul></div>
	<input type="hidden" id="DB_DEPLOY_TYPE" name="DB_DEPLOY_TYPE" value="" />
</td>
</tr>
<tr>
<td class="titleTdLong">主从读写分离<tip text="DB_RW_SEPARATE：在读写分离的情况下，DB_HOST的第一个主机作为主服务器，负责写入数据，其余的都作为从服务器配置。如果你用的是原生SQL：写操作必须用模型的execute方法，读操作必须用模型的query方法，否则会发生主从读写错乱的情况。" /></td>
<td class="inputTd">
	<div id="iDB_RW_SEPARATE" class="dropdown" tabindex="0"><p>false</p><ul>{:getBoolSelect()}</ul></div>
	<input type="hidden" id="DB_RW_SEPARATE" name="DB_RW_SEPARATE" value="" />
</td>
</tr>
<tr>
<td class="titleTdLong">主服务器数量<tip text="DB_MASTER_NUM：如果设置了读写分离和DB_MASTER_NUM参数，DB_HOST按顺序前面的几个配置都是主服务器配置信息，只负责写。后面的是从服务器，只负责读。" /></td>
<td class="inputTd">
<input type="text" name="DB_MASTER_NUM" id="DB_MASTER_NUM" class="input" />
</td>
</tr>
<tr>
<td class="titleTdLong">读服务器序号<tip text="DB_SLAVE_NO：序号是0开始的整数，表示DB_HOST中某个位置的服务器；在开启读写分离情况下，将只从这台服务器读，否则随机选择一个从服务器读。从2个服务器中读：‘DB_SLAVE_NO’=&gt;1" /></td>
<td class="inputTd">
<input type="text" name="DB_SLAVE_NO" id="DB_SLAVE_NO" class="input" />
</td>
</tr>
</table>
</div>


<div id="con_db_2" style="display:none">
<table class="listTable" id="listTable">
<tr>
<td class="titleTdLong">SQL语句缓存<tip text="DB_SQL_BUILD_CACHE：开启之后不会每次都重新生成sql语句，而是将生成的sql语句缓存，以减少大量请求时重复解析sql的性能开销。" /></td>
<td class="inputTd">
	<div id="iDB_SQL_BUILD_CACHE" class="dropdown" tabindex="0"><p>false</p><ul>{:getBoolSelect()}</ul></div>
	<input type="hidden" id="DB_SQL_BUILD_CACHE" name="DB_SQL_BUILD_CACHE" value="" />
</td>
</tr>
<tr>
<td class="titleTdLong">SQL语句缓存方式<tip text="DB_SQL_BUILD_QUEUE：默认为文件方式缓存，建议为php安装xcache或APC扩展以使用内存缓存" /></td>
<td class="inputTd">
	<div id="iDB_SQL_BUILD_QUEUE" class="dropdown" tabindex="0"><p>file</p><ul>
		<li><a href='javascript:void(0)' rel='' name='file'>file</a></li>
		<li><a href='javascript:void(0)' rel='xcache' name='xcache'>xcache</a></li>
		<li><a href='javascript:void(0)' rel='apc' name='apc'>apc</a></li>
	</ul></div>
	<input type="hidden" id="DB_SQL_BUILD_QUEUE" name="DB_SQL_BUILD_QUEUE" value="" />
</td>
</tr>
<tr>
<td class="titleTdLong">SQL语句缓存数量<tip text="DB_SQL_BUILD_LENGTH：SQL语句缓存数量,只缓存select语句" /></td>
<td class="inputTd">
<input type="text" name="DB_SQL_BUILD_LENGTH" id="DB_SQL_BUILD_LENGTH" class="input" />
</td>
</tr>
<tr>
<td class="titleTdLong">SQL执行Trace<tip text="DB_SQL_LOG：设为true将在Trace的SQL标签中显示SQL语句的执行所耗费的时间.默认为false,（调试模式默认为true）" /></td>
<td class="inputTd">
	<div id="iDB_SQL_LOG" class="dropdown" tabindex="0"><p>false</p><ul>{:getBoolSelect()}</ul></div>
	<input type="hidden" id="DB_SQL_LOG" name="DB_SQL_LOG" value="" />
</td>
</tr>
<tr>
<td class="titleTdLong">字段类型检查<tip text="DB_FIELDTYPE_CHECK：开启之后，数据在写入数据库之前对不合法的类型，会按照数据表的字段类型执行数据类型转换，更加安全。" /></td>
<td class="inputTd">
	<div id="iDB_FIELDTYPE_CHECK" class="dropdown" tabindex="0"><p>false</p><ul>{:getBoolSelect()}</ul></div>
	<input type="hidden" id="DB_FIELDTYPE_CHECK" name="DB_FIELDTYPE_CHECK" value="" />
</td>
</tr>
<tr>
<td class="titleTdLong">开启字段缓存<tip text="DB_FIELDS_CACHE：在开发时，考虑到数据表结构可能调整，因此应该关闭字段缓存。在部署模式下数据表结构已经固定，应开启字段缓存有利用提升性能。默认为true（调试模式默认为false）" /></td>
<td class="inputTd">
	<div id="iDB_FIELDS_CACHE" class="dropdown" tabindex="0"><p>false</p><ul>{:getBoolSelect()}</ul></div>
	<input type="hidden" id="DB_FIELDS_CACHE" name="DB_FIELDS_CACHE" value="" />
</td>
</tr>
<tr>
<td class="titleTdLong">LIKE查询的字段<tip text="DB_LIKE_FIELDS：为了保持模型的逻辑清晰，避免性能问题，不建议使用该功能" /></td>
<td class="inputTd">
<input type="text" name="DB_LIKE_FIELDS" id="DB_LIKE_FIELDS" class="input" />
</td>
</tr>
</table>
</div>
<div class="bottomLine"></div>