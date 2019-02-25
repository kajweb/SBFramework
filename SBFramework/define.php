<?php
define("DS", DIRECTORY_SEPARATOR);
define("__ROOT__", dirname($_SERVER['SCRIPT_FILENAME']). DIRECTORY_SEPARATOR);
define("__CONFIG__",__ROOT__."Config" . DIRECTORY_SEPARATOR);
define("__LIB__",__ROOT__."Lib" . DIRECTORY_SEPARATOR);
define("__CORE__",__DIR__ . DIRECTORY_SEPARATOR);
// $_configPath = DIRECTORY_SEPARATOR .'Config' . DIRECTORY_SEPARATOR . 'Config.php';
// define("CONFIG",include __ROOT__ . $_configPath);
define("CONFIG",serialize(include __CONFIG__ . 'Config.php'));

//引入function
include __CORE__ .'function.php';
include __ROOT__ .'function.php';
include __CORE__ .'Helper' . DS . 'URI.php';

//定义常量
define("__PATH__",  getConfig("Path") );
define("__PUBLIC__", __ROOT__  . 'Public' . DIRECTORY_SEPARATOR);
define("__WEB__", __PUBLIC__  . "Web" . DIRECTORY_SEPARATOR );
define("__WEB_SYSTEM__", __PUBLIC__  . "System" . DIRECTORY_SEPARATOR );

//检查框架安装情况
include __CORE__ .'Helper' . DS . 'Install.php';

//处理__STATIC__
$_temp = str_replace( $_SERVER["DOCUMENT_ROOT"], "", __ROOT__ );
$_temp = str_replace( "\\", "/", $_temp );
define("__STATIC__",  rtrim($_temp,"/")  . "/Public/Static/" );
unset($_temp);


include __CORE__."vendor/autoload.php";