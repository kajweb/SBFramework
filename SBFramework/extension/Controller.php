<?php
namespace SBFramework\extension;
class Controller
{
	function success($data){
		$map['status'] = 200;
		$map['data'] = $data;
		echo json_encode($map);
		exit();
	}

	function error($data){
		$map['status'] = 100;
		$map['data'] = $data;
		echo json_encode($map);
		exit();
	}

	function myReturn($e){
		echo json_encode($e);
		exit();
	}

	function ajaxReturn($e){
		$map['status'] = $e ? 200 : 100 ;
		$map['data'] = $e;
		echo json_encode($map);
		exit();
	}
}