<?php
namespace Adminx\Model;
use Think\Model;
class ImTypeModel extends Model{
	protected $_validate = array(
		array('type_name' , 'require' , '名称不能为空！' , 0 , "" , 3),
		array('type_name','','同名项目已经存在！',0,'unique',3),
		array('type_name','1,20','名称长度必须在20个字符以内！',1,'length'),
	);
} ?>