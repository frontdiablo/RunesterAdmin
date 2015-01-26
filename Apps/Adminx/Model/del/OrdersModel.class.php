<?php
class FixModel extends Model{


protected $_map = array(
    'OrdersId'       => 'FixId',
    'OrdersSerial' => 'FixUser',
    'OrdersType'    => 'FixUserGroup',
    'OrdersDate'    => 'FixQuestion',
    
);  

protected $_validate = array(
/*

array(验证字段,验证规则,错误提示,[验证条件,附加规则,验证时间])

验证条件：
    0 存在字段就验证 （默认）
    1 必须验证
    2 值不为空的时候验证

验证时间：
    1 新增数据时候验证
    2 编辑数据时候验证
    3 全部情况下验证（默认）
*/


  //  array('FixType','number','排序号只能为数字！',1,'regex'),
);

protected $_auto = array(

/*
array(填充字段,填充内容,[填充条件,附加规则])
    1 新增数据的时候处理（默认）
    2 更新数据的时候处理
    3 所有情况都进行处理
*/
    array('FixSort','1020',1),
    array('FixDate',NowDate,1,'callback'),
    array('FixQuestion',nl2br,1,'function'),
    array('FixAnswer',nl2br,3,'function'),
    array('FixValidate','1'),


    
    
);



function NowDate(){return date("Y-m-d");}
} ?>