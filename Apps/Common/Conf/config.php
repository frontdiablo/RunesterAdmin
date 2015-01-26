<?php
if (!defined('THINK_PATH')) exit();

return array(
	//项目配置，请不要随意改动。
	'LOAD_EXT_CONFIG' => 'db', 
    'TMPL_STRIP_SPACE'  => true, //去掉模版里面的空格
    'DEFAULT_THEME'     => 'default',
    'TMPL_TEMPLATE_SUFFIX' => '.tpl',
    'TOKEN_ON'=>false,  // 是否开启令牌验证
    'DEFAULT_MODULE'	 => 'Home',
    'SESSION_AUTO_START' => false,
    'MODULE_ALLOW_LIST'  => array('Home','Adminx'),
    'MODULE_DENY_LIST'      =>  array('Common','Public'),
);
?>