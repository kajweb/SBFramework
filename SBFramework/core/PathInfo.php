<?php
if(isset($_SERVER['PATH_INFO'])){
	$_SB_PathInfo = explode('/',trim($_SERVER['PATH_INFO'],"/"));
}

$values = 1;
if(isset($_SB_PathInfo)){
	$_SB_PathInfo_length = count($_SB_PathInfo);
	for($_SB_PathInfo_length;$_SB_PathInfo_length>3;$_SB_PathInfo_length--){
		!$values && $_GET[$_SB_PathInfo[$_SB_PathInfo_length-1]] = $_SB_PathInfo[$_SB_PathInfo_length];
		$values = 1 - $values;
	}
}

unset($_SB_PathInfo_length);