<include file="Public:pub_top" />

<style type="text/css">
body{background:#f2f2f2;width:100%;overflow:hidden}
</style>
</head>
<body>




<div id="validatePageTitle">
<div id="title">查看回复信息</div>
</div>

<div id="validatewrapper">

<div class="valiInfo" style="width:auto;float:none">
<div class="infoTitle">维修信息</div>
<div class="infoText" style="height:150px;overflow:auto;">
<span class="title">问题分类：</span>{($vo.FixType)}<br />
<span class="title">提问日期：</span>{($vo.FixDate)}<br />
<span class="title">提问人：</span>{($vo.FixUser)}<br />
<span class="title">所属部门：</span>{($vo.FixUserGroup)}<br />
<span class="title">联系电话：</span>{($vo.FixPhone)}<br />
<span class="title">问题描述：</span>{($vo.FixQuestion)}<br />
</div>
</div>

<div class="valiInfo" style="width:auto;margin-top:10px;height:280px;overflow:auto">
<div class="infoTitle">问题回复</div>
{($vo.FixQuestion)}
</div>


</div>

</body>
</html>

<include file="Public:pub_bottom" />
