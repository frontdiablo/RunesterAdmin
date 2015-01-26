{/* 显示模式 */}
<if condition="$mode eq 'display'">
<foreach name="vo" item="vo">
	<?php
	$subclass = $vo['cate_pid'] != 0 ? "subLi" : "";
	$select = $vo['cate_id'] == $selectid ? "click" : "";
	?>
	<li class="{$subclass}"><a href="{:U($Think.CONTROLLER_NAME."/index?pid=".$vo['cate_id'])}" class="{$select}" >{$vo['cate_title']}</a></li>
</foreach>

{/* 编辑模式 */}
<elseif condition="$mode eq 'edit'"/>
<foreach name="vo" item="vo">
	<?php $subclass = $vo['cate_pid'] != 0 ? "subTr" : "";?>
	<tr class="{$subclass}">
	<td class="numTd">
	<input type="hidden" value="{$vo.cate_id}" name="iId[]" id="iId" />
	<input type="text" class="numInput" maxlength="3" value="{$vo.cate_sort}" onclick="this.select()" name="iSort{$vo.cate_id}" /></td>
	<td><input type="text" class="NameInput" value="{$vo.cate_title}" name="iName{$vo.cate_id}" id="iName{$vo.cate_id}" onkeydown="sideModifyActive(\"iName{$vo.cate_id}\")" /></td>
	<td class="btnTd">
	<if condition="$edit eq 1"><a href="{:U("Category/edit?id=".$vo["cate_id"])}" class="editBtn" title="编辑"></a></if>
	<a href="javascript:void(0)" class="delBtn" title="删除" onclick='isConfirm("{:U("Category/delete?id=".$vo['cate_id'])}","您确定要删除这个位置吗？如果该位置存在信息请先清空信息后再执行本操作。")'></a></td>
	</tr>
</foreach>
</if>