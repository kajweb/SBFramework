<?php
date_default_timezone_set('Asia/Shanghai');

header("Content-type: text/html; charset=utf-8");
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header('Access-Control-Allow-Methods: GET, POST, PUT,DELETE');
if($_SERVER['REQUEST_METHOD'] == 'OPTIONS'){
	exit();
}