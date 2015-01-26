<?php
namespace Adminx\Model;
use Think\Model;
class NavModel extends Model{
//自动验证
	protected $_validate = array(
		array('title'	, 'require'	, '标题不能为空！'     , 0 , "" , 3),
		array('area'	, 'require'	, '必须选择导航位置'     , 0 , "" , 3),
	);
} ?>