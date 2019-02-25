<?php
namespace SBFramework;
class Method
{
	static function Init(){
		if ($_SERVER['REQUEST_METHOD'] == 'GET'){
			define("IS_GET",true);
			define("IS_POST",false);
		} elseif($_SERVER['REQUEST_METHOD'] == 'POST') {
			define("IS_POST",true);
			define("IS_GET",false);
		}
	}
}