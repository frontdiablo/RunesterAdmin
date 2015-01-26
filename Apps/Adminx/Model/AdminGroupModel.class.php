<?php
namespace Admin\Model;
use Think\Model;
class AdminGroupModel extends Model {
    protected $_validate = array(
    array('title'	, 'require'	, '群名称不能为空'     , 0 , "" , 3),
    );
}