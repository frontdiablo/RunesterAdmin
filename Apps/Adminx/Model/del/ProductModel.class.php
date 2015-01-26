<?php
class ProductModel extends Model{

protected $_map = array(
'iId'       => 'ProId',
'iName'     => 'ProName',    // 名称
'iPrice'    => 'ProPrice',   // 价格
'iUnits'    => 'ProUnits',   // 单位
'iType'     => 'ProType',    // 分类
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
array('ProName'  , 'require', '名称不能为空！'             , 0 , "" , 3),
array('ProPid'   , 'require', '必须选择所属类别不能为空！' , 0 , "" , 3),
array('ProPrice' , 'require', '单价不能为空！'             , 0 , "" , 3),
array('ProUnits' , 'require', '单位名称不能为空！'             , 0 , "" , 3),
);

protected $_auto = array(

/*
array(填充字段,填充内容,[填充条件,附加规则])
    1 新增数据的时候处理（默认）
    2 更新数据的时候处理
    3 所有情况都进行处理
*/

);



} ?>