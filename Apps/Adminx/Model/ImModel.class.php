<?php
namespace Adminx\Model;
use Think\Model;
class ImModel extends Model{
	protected $_validate = array(
		array('name' , 'require' , '标题不能为空！' , 0 , "" , 3),
		array('type' , 'require' , '请选择号码类型！' , 0 , "" , 3),
		array('url' , 'require' , '链接不能为空！' , 0 , "" , 3),
	);
	protected $_auto = array(
		array('url'	, 'htmlspecialchars_decode', 3 , 'function' ),
	);
} ?>