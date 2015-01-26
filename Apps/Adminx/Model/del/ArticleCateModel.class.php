<?php
namespace Adminx\Model;
use Think\Model;
class ArticleCateModel extends Model{
//自动验证
	protected $_validate = array(
		array('cate_title' , 'require', '标题不能为空！' , 0 , "" , 3),
	);
} ?>