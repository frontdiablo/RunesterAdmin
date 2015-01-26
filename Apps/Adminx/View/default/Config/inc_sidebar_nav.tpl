<ul class="sideItemUl">
<li><a href="{:U('Config/web')}">{$Think.lang.SIDE_LIST_WEBSITE}</a></li>
<li><a href="{:U('Config/home')}">{$Think.lang.SIDE_LIST_HOME}</a></li>

<if condition="returnAuth($Thik.MODULE_NAME.'/Adv/index')">
<li><a href="{:U('Adv/index')}">{$Think.lang.SIDE_LIST_ADV}</a></li>
</if>
</ul>

<div class="separate"></div>

<ul class="sideItemUl">
<if condition="returnAuth($Thik.MODULE_NAME.'/Im/index')">
<li><a href="{:U('Im/index')}">{$Think.lang.SIDE_LIST_IM}</a></li>
</if>
<if condition="returnAuth($Thik.MODULE_NAME.'/Config/mail')">
<li><a href="{:U('Config/mail')}">{$Think.lang.SIDE_LIST_MAIL}</a></li>
</if>
<if condition="returnAuth($Thik.MODULE_NAME.'/Webtools/index')">
<li><a href="{:U('Favorite/index')}">{$Think.lang.SIDE_LIST_FAVORITE}</a></li>
</if>

<li><a href="{:U('Config/advance')}">网站高级配置</a></li>

<if condition="returnAuth($Thik.MODULE_NAME.'/Sysconfig/index')">
<li><a href="{:U('Sysconfig/index')}">网站项目配置</a></li>
</if>
</ul>