<?php
namespace Adminx\Model;
use Think\Model;
class ConfigMailModel extends Model{
	protected $_validate = array(
		array('guestname'		, 'require'	, '访客姓名不能为空！'     , 0 , "" , 3),
		array('subjuect'		, 'require'	, '邮件标题不能为空！'     , 0 , "" , 3),
		array('collect_name'	, 'require'	, '收件邮箱姓名不能为空！' , 0 , "" , 3),
		array('collect_address'	, 'require'	, '收件邮箱不能为空！'     , 0 , "" , 3),
		array('smtp_host'		, 'require'	, 'SMTP地址不能为空！'     , 0 , "" , 3),
		array('smtp_port'		, 'require'	, 'SMTP端口不能为空！'     , 0 , "" , 3),
		array('smtp_username'	, 'require'	, 'SMTP用户名不能为空！'   , 0 , "" , 3),
		array('smtp_password'	, 'require'	, 'SMTP密码不能为空！'     , 0 , "" , 3),
		array('smtp_mail'		, 'require'	, 'SMTP邮箱地址不能为空！' , 0 , "" , 3),
		array('smtp_ssl'		, 'require'	, '请选择SSL安全协议！'    , 0 , "" , 3),
		array('smtp_auth'		, 'require'	, '请选择SMTP验证功能！'   , 0 , "" , 3),
	);
} ?>






