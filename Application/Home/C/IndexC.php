<?php
namespace Home;
use \think\Db;
use \SBFramework\extension\Controller;
// use \Service;

class indexController extends Controller{
	function index(){
		// SBF模块化开发示例
		// 加载头部模版
		include ( __WEB__ . "header.php");
		// 加载js
		echo getStaticJS( 'js/jquery-3.3.1.min.js');
		// 加载用户函数
		echo UF_BodyMidHtml();
		// 加载页面
		include( __WEB__ . getDSPath(["index","img.php"]) );
		// 调用框架函数示例
		echo getStaticJS( 'js/index.js');
		include( __WEB__ . "foot.php" );
	}
}