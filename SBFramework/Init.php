<?php
include 'define.php';
include __CORE__ . "Thrower" .DIRECTORY_SEPARATOR.  "Installer.php";

include __CORE__."AutoLoading.php";
//框架初始化类
include __CONFIG__."Init.php";

spl_autoload_register("\\AutoLoading\\loading::autoload");
// set_error_handler(["\SBFramework\Error","FrameErrorHandler"]);
// set_exception_handler (["\SBFramework\Error","FrameExceptionHandler"]);

Class SBFramework{
	static function run(){
		Init\Init::run();
		SBFramework\Method::Init();
		SBFramework\PathInfo::Route();
	}
}