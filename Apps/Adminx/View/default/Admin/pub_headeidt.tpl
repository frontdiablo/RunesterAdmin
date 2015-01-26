<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="x-ua-compatible" content="ie=7" />
<title>RunesterAdmin</title>
<script src="http://open.web.meitu.com/sources/xiuxiu.js" type="text/javascript"></script>
    <script type="text/javascript">
        window.onload=function(){
          xiuxiu.embedSWF("altContent",5,"800px","400px");
          xiuxiu.setUploadURL("{:U('Admin/head_upload','',true,true)}");
          xiuxiu.onUploadResponse = function (data)
          {
            if(data == "头像上传成功!"){
            	alert(data);
                parent.location.reload();
            }else{
                alert(data);
            }
          }
        }
    </script>
<style type="text/css">
html,body{width:100%;overflow:hidden;margin:0;padding-left:5px;}
</style>
</head>
<body>
<form enctype="multipart/form-data" method="POST" name="myform">
<div id="altContent"></div>
</form>
</body></html>