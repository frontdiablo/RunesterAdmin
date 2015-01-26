<?php
namespace Adminx\Model;
use Think\Model;
class AdminModel extends Model{
	protected $_validate = array(
		array('username'	, 'require'	, '登录名不能为空！'     , 0 , "" , 3),
		array('username','','该登录名已经存在！',0,'unique',3),
		array('username','1,20','用户名长度必须在20个字符以内！',1,'length'),
		array('nickname','','该昵称已经存在！',0,'unique',3),
		array('nickname','1,20','昵称长度必须在20个字符以内！',1,'length'),
		array('password'	, 'require'	, '密码不能为空！'     , 0 , "" , 1),
		array('password','4,20','密码长度必须在4-20个字符以内！',1,'length'),
		array('repassword','password','两次输入的密码不一致',0,'confirm'),
	);
} ?>