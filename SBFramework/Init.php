<?php
// 加载常量表
include 'define.php';
// 挂载页面错误处理器
include __CORE__ . "Thrower" . DS .  "Installer.php";
// 挂载自动加载器处理器
include __CORE__ . "AutoLoading.php";
// 初始化框架配置
include __CONFIG__ . "Init.php";

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