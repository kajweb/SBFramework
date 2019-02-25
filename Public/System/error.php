<!DOCTYPE HTML>
<html>
<head>
	<meta charset="utf-8">
	<!-- <meta http-equiv="Refresh" content="5; url=http://www.jb51.net" />  -->
	<style>
	*{
		margin:0;
	}
	html,body{
		height: 100%;
		overflow:hidden;
	}
	a{
		color: #fff;
	}
	#errorPage{
		position: absolute;
		left: 0;
		top: 0;
		width: 100%;
		height: 100%;
		background: #000;
	    opacity: 0.75;
	    color: #fff;
	    overflow-y: scroll;
    	background-image: -webkit-gradient( linear, 0 0,100% 100%, color-stop(.5, rgba(255,255,255,.2)), color-stop(.5, transparent), to(transparent) );
	    background-size: 40px 40px;
	}
	.line{
		font-size: 60px;
		font-weight:bold;
	}
	.bold{
		font-weight:bold;
	}
	.line,.body,.foot,.trace{
		margin:30px;
		display: block;
	}
	.body-text{
		display: inline-block;
		text-indent:0em;
	}
	.cRed{
		color:red;
	}
	.body{
		/*text-indent:2em;*/
		font-size: 30px;
	}
	.foot{
		font-size: 20px;
		color: #8c8a8a;
	}
	.trace{
		margin-left: 30px;
		margin-top:100px;
	}
	.foot{
		margin-top:0;
	}
	</style>
</head>
<body>
<div id="errorPage">
	<span class="line">
		<span class="cRed">:)</span>
		<span class="head-title">遇到错误<?php echo (!empty($errtype))?" - ". $errtype:"" ?></span>
	</span>
	<?php //报错设置
	$APP_DEBUG = getConfig("APP_DEBUG");
	if( !$APP_DEBUG ){
	?>
	<span class="body">
		<div><span class="cRed">→　　</span><span class="body-text bold"><?php echo $errstr;?></span></div>
		<br>
		<?php
		if( isset($errfile) && !empty($errfile) ){
		?>
			<div><span>→　　</span><span class=""><?php echo $errfile;?></span>
			<?php
			 echo (isset($errline) && !empty($errline)) ? "<span class=\"cRed bold\"> [ Line: ".$errline." ]</span>" : "";
			 ?>
			</div>
		<?php
		}
		?>

		<!-- <div><span class="">位置：<?echo isset($errline)?$errline:"";?></span></div> -->
	</span>
	<span class="trace">
	<?php //报错设置
	}
	if( $APP_DEBUG === false ){
		if(isset($errtrace) && $errtrace){
			foreach ($errtrace as $key => $value) {
				echo "[{$key}] : ";
				print_r($value);
				echo "<br>\n";
			}
		}
	}
	?>
	<!-- <span class="trace-text">5秒后跳转到首页</span> -->
	</span>
	<span class="foot">
		<span class="foot-text">Framework developer : 林毅洋 - kajweb@163.com</span>
	</span>
</div>
</body>
</html>
<?php exit();?>