<?php
namespace Adminx\Model;
use Think\Model;
class PageModel extends Model{
//自动验证
	protected $_validate = array(
		array('title' , 'require'	, '标题不能为空！'     , 0 , "" , 3),
		array('pid'	, 'require'	, '必须选择所属分类！'     , 0 , "" , 3),
		array('content'	, 'require'	, '内容不能为空！'     , 0 , "" , 3),
	);
//自动完成
	protected $_auto = array(
		array('content'	, 'contentCompress', 3 , 'function' ),
	);
} ?>