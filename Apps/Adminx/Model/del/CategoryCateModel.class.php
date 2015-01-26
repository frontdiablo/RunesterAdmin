<?php
namespace Adminx\Model;
use Think\Model;
class CategoryCateModel extends Model{
	protected $_validate = array(
		array('cate_title' , 'require' , '分类名称不能为空！' , 0 , "" , 3),
		array('cate_title','','同名项目已经存在！',0,'unique',3),
		array('cate_title','1,20','位置名称长度必须在20个字符以内！',1,'length'),
	);
} ?>