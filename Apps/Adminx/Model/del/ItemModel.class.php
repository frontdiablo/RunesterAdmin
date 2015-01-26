<?php
class ItemModel extends Model{

protected $_map = array(
'iId'            =>  'ItemId',
'iNum'           =>  'ItemNum',              // 数量
'iProPrice'      =>  'ItemPrice',            // 单价
'iBuyDate'       =>  'ItemDateBuy',          // 购买日期

'iValiName1'     =>  'ItemValiName1',        // 一级审核人姓名
'iValiName2'     =>  'ItemValiName2',        // 二级审核人姓名
'iValiName3'     =>  'ItemValiName3',        // 三级审核人姓名
'iValiName4'     =>  'ItemValiName4',        // 四级审核人姓名

'iValiDate1'     =>  'ItemValiDate1',        // 一级审核通过日期
'iValiDate2'     =>  'ItemValiDate2',        // 二级审核通过日期
'iValiDate3'     =>  'ItemValiDate3',        // 三级审核通过日期
'iValiDate4'     =>  'ItemValiDate4',        // 四级审核通过日期

'iNoteBuy'       =>  'ItemNoteBuy',          // 购买者备注
'iNoteVali1'     =>  'ItemValiNote1',        // 一级审核备注
'iNoteVali2'     =>  'ItemValiNote2',        // 二级审核备注
'iNoteVali3'     =>  'ItemValiNote3',        // 三级审核备注
'iNoteVali4'     =>  'ItemValiNote4',        // 四级审核备注
'iNoteVendor'    =>  'ItemValiNoteVendor',   // DataOA备注
'iNotePrivate'   =>  'ItemValiNotePrivate',  // DataOA私有备注
'iDateMade'      =>  'ItemDateMade',         // 产品出厂日期
'iValidate'      =>  'ItemValidate',         // 审核状态：1 - 通过审核；0 - 未通过审核
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


  //  array('ItemType','number','排序号只能为数字！',1,'regex'),
);

protected $_auto = array(

/*
array(填充字段,填充内容,[填充条件,附加规则])
    1 新增数据的时候处理（默认）
    2 更新数据的时候处理
    3 所有情况都进行处理
*/
array('ItemNoteBuy'         , 'valiSafechar' , 3 , 'function' ),
array('ItemValiNote2'       , 'valiSafechar' , 3 , 'function' ),
array('ItemValiNote2'       , 'valiSafechar' , 3 , 'function' ),
array('ItemValiNote2'       , 'valiSafechar' , 3 , 'function' ),
array('ItemValiNote2'       , 'valiSafechar' , 3 , 'function' ),
array('ItemValiNoteVendor'  , 'valiSafechar' , 3 , 'function' ),
array('ItemValiNotePrivate' , 'valiSafechar' , 3 , 'function' ),
array('iDateMade'           , 'valiSafechar' , 3 , 'function' ),

array('ItemNoteBuy'         , 'nl2br' , 3 , 'function' ),
array('ItemValiNoteVendor'  , 'nl2br' , 3 , 'function' ),
array('ItemValiNotePrivate' , 'nl2br' , 3 , 'function' ),
array('ItemValiNote2'       , 'nl2br' , 3 , 'function' ),
array('ItemValiNote2'       , 'nl2br' , 3 , 'function' ),
array('ItemValiNote2'       , 'nl2br' , 3 , 'function' ),
array('ItemValiNote2'       , 'nl2br' , 3 , 'function' ),

);



} ?>