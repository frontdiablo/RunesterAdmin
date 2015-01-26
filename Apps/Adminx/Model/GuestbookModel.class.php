<?php
namespace Adminx\Model;
use Think\Model;
class GuestbookModel extends Model{
//自动验证
	protected $_validate = array(
		array('pid'	, 'require'	, '未获取到需回复的帖子'     , 0 , "" , 3),
		array('content'	, 'require'	, '内容不能为空！'     , 0 , "" , 3),
	);
//自动完成
	protected $_auto = array(
		array('isRead'  , 1),
		array('username'	, 'getusername', 3 , 'callback' ),
		array('head'	, 'gethead', 3 , 'callback' ),
		array('content'	, 'htmlspecialchars_decode', 3 , 'function' ),
		array('pubDate'	, 'unixtime', 3 , 'function' ),
	);
	
	
	/* 根据sessin获取用户名 */
	function getusername(){
		$username = session("admin_nickname") ? session("admin_nickname") : session("admin_username");
		return $username;	
	}
	/* 根据session获取用户头像 */
	function gethead(){return session("admin_head");}
} ?>