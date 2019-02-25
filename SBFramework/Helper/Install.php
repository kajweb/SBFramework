<?php
//检查框架文件时候安装完毕
$_checkFiles = [
	"Config/Config.php",
	"Config/DB.php"
];

foreach ($_checkFiles as $_filePath) {
	$_path = __ROOT__ . $_filePath;
	if( !is_file($_path) ){
		errorPage("框架初始化失败","请检查".$_filePath."是否存在","框架安装失败");
	}
}