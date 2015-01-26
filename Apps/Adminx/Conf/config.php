<?php

$file_field = "./public/Conf/field.config.php";
if(file_exists($file_field)) $conf_field = require($file_field);else $conf_field = array();

$array = array(
	define("ADMINPATH",ROOT."Apps/Adminx"),
	define('UPLOADIMG',ROOT.'public/image/'),
	define('RESIMG',ADMINPATH.'/resource/image/'),

	'TMPL_PARSE_STRING'  =>array(
	     '__RES__'      => ADMINPATH . '/resource', // 资源库
	     '__RESIMG__'   => ADMINPATH . '/resource/images', // 资源库 - 图片
	     '__RESFUN__'   => ADMINPATH . '/resource/function', // 资源库 - function
	     '__RESSTYLE__' => ADMINPATH . '/resource/style', // 资源库 - css
	     '__UPLOADIMG__'  => ROOT_PATH.'public/image', // 资源库
	),
	'AUTOLOAD_NAMESPACE' => array('Common' => APP_PATH.'Common',),
	'URL_MODEL' => '1',
	'L0OAD_EXT_FILE' => "Common", //自动加载函数库
	'DATA_CACHE_TYPE'   => 'File', // 数据缓存类型
	'LANG_SWITCH_ON' => true,   // 开启语言包功能
//	'VAR_SESSION_ID' => 'session_id',	//修复uploadify插件无法传递session_id的bug
//	'COOKIE_PREFIX'=>'ra_',           // Cookie前缀 避免冲突
	'TAGLIB_BUILD_IN'    =>    'cx,MyTags',//自动加载标签库

	/* 后台错误页面模板
	'TMPL_ACTION_ERROR'     =>  APP_PATH.'Public/Tpl/dispatch_jump.tpl', // 默认错误跳转对应的模板文件
	'TMPL_ACTION_SUCCESS'   =>  APP_PATH.'Public/Tpl/dispatch_jump.tpl', // 默认成功跳转对应的模板文件
	'TMPL_EXCEPTION_FILE'   =>  APP_PATH.'Public/Tpl/dispatch_jump.tpl',// 异常页面的模板文件
	*/
	
	'AUTH_CONFIG'=>array(
		'AUTH_ON' => true, //认证开关
		'AUTH_TYPE' => 1, // 认证方式，1为时时认证；2为登录认证。
		'AUTH_GROUP' => 'ra_admin_group', //用户组数据表名
		'AUTH_GROUP_ACCESS' => 'ra_admin_group_access', //用户组明细表
		'AUTH_RULE' => 'ra_admin_rule', //权限规则表
		'AUTH_USER' => 'ra_admin',//用户信息表
		'NOT_AUTH_CONTROLLER' => 'Page,Article',//无须验证Controller
		'NOT_AUTH_USER' => 'avatar',//无须验证用户
	),
);
return array_merge($conf_field,$array);
?>