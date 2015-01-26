<?php
class AdminGroupModel extends Model{


protected $_map = array(
    'iId'     => 'AdminId',
    'iName'   => 'iGroupName',
    'iGroup'  => 'AdminGroup',
    'iType'   => 'AdminType',
    'iMail'   => 'AdminMail',
    'iPhone'  => 'AdminPhone',
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

    array('AdminUserName','','此用户已存在！',0,'unique',1), // 在新增的时候验证name字段是否唯一
    array('AdminUserName' , 'require', '姓名不能为空！'     ,0 , "" , 1),
    array('AdminGroup'    , 'require', '必须选择所属部门！' ,1 , "" , 3),
    array('AdminType'     , 'require', '必须选择用户职务！' ,1 , "" , 3),


    
);

protected $_auto = array(

/*
array(填充字段,填充内容,[填充条件,附加规则])
    1 新增数据的时候处理（默认）
    2 更新数据的时候处理
    3 所有情况都进行处理
*/
    array('AdminAllowDel','1'),
);




} ?>