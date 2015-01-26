<?php
namespace Adminx\Model;
use Think\Model;
class CategoryModel extends Model{
//自动验证
	protected $_validate = array(
		array('cate_title'	, 'require'	, '分类名称不能为空！'     , 0 , "" , 3),
		array('cate_type'	, 'require'	, '分类类型不能为空！'     , 0 , "" , 3),
	);
} ?>