<?php
namespace Adminx\Model;
use Think\Model;
class FavoriteModel extends Model{
	protected $_validate = array(
		array('name' , 'require'	, '名称不能为空！' , 0 , "" , 3),
		array('name','','该项目已经存在！',0,'unique',3),
		array('name','1,20','名称长度必须在20个字符以内！',1,'length'),
		
		array('url'	, 'require'	, '地址不能为空！' , 0 , "" , 3),
		array('url','','该项目已经存在！',0,'unique',3),
		
		array('type' , 'require'	, '请选择类型' , 0 , "" , 3),
	);
	protected $_auto = array(
		array('url'	, 'replaceUrlhttp', 3 , 'function' ),
	);
} ?>