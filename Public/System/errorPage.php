<!DOCTYPE HTML>
<html>
<head>
	<!-- <meta http-equiv="Refresh" content="5; url=http://www.jb51.net" />  -->
	<style>
	*{
		margin:0;
	}
	.line{
		font-size: 60px;
		font-weight:bold;
	}
	.line,.body,.foot,.Refresh{
		margin:30px;
		display: block;
	}
	.cRed{
		color:red;
	}
	.body{
		text-indent:2em;
		font-size: 40px;
	}
	.foot,.Refresh{
		font-size: 20px;
		color: #5d5a5a;
	}
	.Refresh{
		margin-left: 30px;
		margin-top:100px;
	}
	.foot{
		margin-top:0;
	}
	</style>
</head>
<body>
	<span class="line">
		<span class="cRed">:)</span>
		<span class="head-title">遇到致命错误</span>
	</span>
	<span class="body">
		<span class="cRed">→　</span>
		<span class="body-text"><?echo $error;?></span>
	</span>
	<span class="Refresh">
		<!-- <span class="Refresh-text">5秒后跳转到首页</span> -->
	</span>
	<span class="foot">
		<span class="foot-text">Framework developer : 林毅洋 - kajweb@163.com</span>
	</span>
</body>
</html>
<?php exit();?>