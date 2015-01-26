<?php
namespace Adminx\Model;
use Think\Model;
class AdvModel extends Model{
	protected $_validate = array(
		array('title' , 'require' , '标题不能为空！' , 0 , "" , 1),
		array('title','','该标题同名项目已经存在！',0,'unique',1),
		array('title','1,20','标题长度必须在20个字符以内！',1,'length'),
		array('content'	, 'require'	, '内容不能为空！'	, 0 , "" , 1),
		array('type'	, 'require'	, '请选择广告位置'	  , 0 , "" , 1),
	);
	protected $_auto = array(
		array('content'	, 'htmlspecialchars_decode', 3 , 'function' ),
	);
} ?>