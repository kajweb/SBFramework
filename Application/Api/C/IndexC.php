<?php
namespace Api;
use \think\Db;
use \SBFramework\extension\Controller;
// use \Service;

class IndexController extends Controller{
	function index(){
		// SBF调用Model、Service并输出Json例子
		$d = D("api/Index")->example();
		$s = S("api/Example")->demo();
		// SBFramework\extension
		$this->ajaxReturn([$d,$s]);
	}
}