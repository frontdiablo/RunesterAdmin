<div id="pageTitle"></div>

<div class="Tabmenubox TabmenuboxBorder">
<div class="Tabmenubox_cate">{$Think.lang.TAB_SIDE_CATE_FILTER}</div>
</div>

<div class="separate"></div>

{/* Tab选项卡 1 */}
<div id="con_one_1" class="hover">
	<ul class="sideItemUl">
		<li><a href='{:U($Think.CONTROLLER_NAME."/index")}' <if condition="($read neq '0') and ($hide neq '1')">class="click"</if>>全部留言</li></a>
		<li><a href='{:U($Think.CONTROLLER_NAME."/index","read=0")}' <if condition="$read eq '0'">class="click"</if>>未读留言</li></a>
		<li><a href='{:U($Think.CONTROLLER_NAME."/index","hide=1")}' <if condition="$hide eq '1'">class="click"</if>>未审核留言</li></a>
	</ul>
</div>