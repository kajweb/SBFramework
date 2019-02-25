<?php
namespace SBFramework;
class pathInfo
{
	static function Route(){
		if(isset($_SERVER['PATH_INFO'])){
			$_APP_PathInfo = explode('/',trim($_SERVER['PATH_INFO'],"/"));
		}

		$values = 1;
		if(isset($_APP_PathInfo)){
			$_APP_PathInfo_length = count($_APP_PathInfo);
			for($_APP_PathInfo_length;$_APP_PathInfo_length>3;$_APP_PathInfo_length--){
				!$values && $_GET[$_APP_PathInfo[$_APP_PathInfo_length-1]] = $_APP_PathInfo[$_APP_PathInfo_length];
				$values = 1 - $values;
			}
		}else{
			$_APP_PathInfo = explode("|", "Home|Index|Index");
		}
		unset($_APP_PathInfo_length);
		unset($values);

		if(isset($_APP_PathInfo[2])){
			$_object = "{$_APP_PathInfo[0]}\\{$_APP_PathInfo[1]}Controller";
			$_SB_Running = new $_object();
			$func = $_APP_PathInfo[2];
			$rc = new \ReflectionClass($_SB_Running);
			if(!$rc->hasMethod($func)){
				$data = [
							"status"=>"404",
							"data"=>"方法不存在"
						];
				exit(json_encode($data));
			}
			$_SB_Running->$func();	
		}else{
			exit("No permission");
		}

	}
}