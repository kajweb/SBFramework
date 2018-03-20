<?php
// namespace Application\Index\Controller;
class IndexC{

	function index(){
		print_r($_GET);
		echo "欢迎进入首页\n";
	}

	function test(){
		echo "恭喜你，你成功使用本框架\n";
	}
}