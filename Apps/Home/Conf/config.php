<?php

return array(



define('UPLOADIMG',ROOT_PATH.'public/image/'),
define('RESIMG',ADMINPATH.'/resource/image/'),


'TMPL_PARSE_STRING'  =>array(
     '__RES__'      => ADMINPATH . '/resource', // 资源库
     '__RESIMG__'   => ADMINPATH . '/resource/images', // 资源库 - 图片
     '__RESFUN__'   => ADMINPATH . '/resource/function', // 资源库 - function
     '__RESSTYLE__' => ADMINPATH . '/resource/style', // 资源库 - css
     '__UPLOADIMG__'  => ROOT_PATH.'public/image', // 资源库
),



'AUTOLOAD_NAMESPACE' => array('Common' => APP_PATH.'Common',),

/*
	'RBAC_SUPERADMIN' => 'avatar', //超级管理员名称
	'ADMIN_AUTH_KEY' => 'superadmin', //超级管理员识别号
	'USER_AUTH_ON' => true, //是否开启验证
	'USER_AUTH_TYPE' => 1, //验证类型（1：登录验证；2：时时验证）
	'USER_AUTH_KEY' => uid,  //用户认证识别号
	'NOT_AUTH_MODULE' => '', //无需认证的控制器
	'NOT_AUTH_ACTION' => '', //无需认证的动作方法
	'RBAC_ROLE_TABLE' =>   DB_PREFIX.'admin_role', //角色表名称
	'RBAC_USER_TABLE' =>   DB_PREFIX.'admin_role_user', //角色用户中间表名称
	'RBAC_ACCESS_TABLE' => DB_PREFIX.'admin_access', //权限表名称
	'RBAC_NODE_TABLE' =>   DB_PREFIX.'admin_node', //节点点表名称
*/

	/*
	'AUTH_CONFIG'=>array(
	'AUTH_ON' => true, //认证开关
	'AUTH_TYPE' => 2, // 认证方式，1为时时认证；2为登录认证。
	'AUTH_GROUP' => 'ra_admin_group', //用户组数据表名
	'AUTH_GROUP_ACCESS' => 'ra_admin_group_access', //用户组明细表
	'AUTH_RULE' => 'ra_admin_rule', //权限规则表
	'AUTH_USER' => 'ra_admin',//用户信息表
	),

*/

  'URL_MODEL' => '1',
	'L0OAD_EXT_FILE' => "Common", //自动加载函数库
	'DATA_CACHE_TYPE'   => 'File', // 数据缓存类型
	'LANG_SWITCH_ON' => true,   // 开启语言包功能

    /* SESSION 和 COOKIE 配置 */

    'VAR_SESSION_ID' => 'session_id',	//修复uploadify插件无法传递session_id的bug
	'COOKIE_PREFIX'=>'ra_',           // Cookie前缀 避免冲突

 
    'TAGLIB_BUILD_IN'    =>    'cx,MyTags'//自动加载标签库
    /* 后台错误页面模板 */
 //   'TMPL_ACTION_ERROR'     =>  APP_PATH.'Public/Tpl/dispatch_jump.tpl', // 默认错误跳转对应的模板文件
  //  'TMPL_ACTION_SUCCESS'   =>  APP_PATH.'Public/Tpl/dispatch_jump.tpl', // 默认成功跳转对应的模板文件
  //  'TMPL_EXCEPTION_FILE'   =>  APP_PATH.'Public/Tpl/dispatch_jump.tpl',// 异常页面的模板文件


);

?>