<div id="pageTitle"></div>
<div class="Tabmenubox TabmenuboxBorder">
<div class="Tabmenubox_cate">{$Think.lang.TAB_SIDE_USER_GROUP}</div>
</div>
<div class="separate"></div>
<div >
<ul class="sideItemUl">
<li><a href='{:U($Think.CONTROLLER_NAME."/index")}' <if condition="$type eq ''">class="click"</if>>{$Think.lang.SIDE_LIST_ALL}</a></li>
<volist name="vos" id="vos">
<li><a href="{:U('Admin/index','type='.$vos['id'])}">{$vos.title}</a></li>
</volist>
</ul>
<div class="separate"></div>
</div><!--con_one_1 End-->