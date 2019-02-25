<?php
include __CORE__.'Log.php';

//获得文件后缀名，如果没有后缀，返回空
function getFileExtName( $fileName ){
	$ext = NULL;
	$fileNameArray = explode(".", $fileName);
	if( count($fileNameArray) > 1 ){
		$ext = strtolower( end($fileNameArray) );
	}
	return $ext;
}

function getConfig($e){
	$_config = unserialize(CONFIG);
	return $_config[$e];
}

function getDBConfig( $e, $mandatory=false ){
	static $_config = [];
	if( $mandatory || !array_key_exists($e, $_config) ){
		$map['key'] = $e;
		$_config_DB = \think\Db::name("config")->where($map)->find();
		if( $_config_DB === false ){
			return false;
		}
		$_config[$e] = $_config_DB['value'];
	}

	return $_config[$e] ;
}

function setDBConfig( $key, $value ){
	$map['key'] = $key;
	$count = M("config")->where($map)->count();
	if( !$count ){
		$data['key'] = $key;
		$data['value'] = $value;
		$result = M("config")->instrt($data);
	} else {
		$data['value'] = $value;
		$result = M("config")->where($map)->update($data);
	}
	return $result;
}

function S($param){
	return Service($param);
}

function D($param){
	return Model($param);
}

//直接操作数据库
function M($param){
	return \think\Db::name($param);
}

function Service($param){
		$Service = explode("/", $param);
		$_module = $Service[0];
		unset($Service[0]);
		$_class =  rtrim( $_module . "\\" . implode("\\", $Service) , "\\") . "Service";
		if(!class_exists($_class)){
			$data = array(
						"status"=>"404",
						"data"=>"Service:{$param}不存在"
					);
			exit(json_encode($data));
		}
		return new $_class();
}

function Model($param){
		$Model = explode("/", $param);
		$_module = $Model[0];
		unset($Model[0]);
		$_class =  rtrim( $_module . "\\" . implode("\\", $Model) , "\\") . "Model";
		if(!class_exists($_class)){
			$data = array(
						"status"=>"404",
						"data"=>"Model:{$param}不存在"
					);
			exit(json_encode($data));
		}
		return new $_class();
}

function errorPage($e="程序停止运行",$ef="",$type="halt"){
	$errtype = $type;
	$errstr = $e;
	$errfile = $ef;
	include __WEB_SYSTEM__ . "/error.php";
}


//替换\和/
//reverse为false的时候，把\替换为/，为true的时候，把/替换为\
function path2Url( $saveName, $reverse = false ){
	if( !$reverse ){
		$saveName = str_replace( "\\","/", $saveName );
	} else {
		$saveName = str_replace( "/","\\", $saveName );
	}
	return $saveName;
}

function create_random_string($random_length) {
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $random_string = '';
	for ($i = 0; $i < $random_length; $i++) {
		$random_string .= $chars [mt_rand(0, strlen($chars) - 1)];
	}
	return $random_string;
}

function getDateTime($time = false){
	$time = $time ? $time : time();
	return date("Y-m-d H:i:s",$time);
}

function getZhDateTime($time = false){
	$time = $time ? $time : time();
	return date("Y年m月d日 H时i分s秒",$time);
}

function getMonthDay($time = false){
	$time = $time ? $time : time();
	return date("m-d",$time);
}

function getDates($time = false){
	$time = $time ? $time : time();
	return date("Y-m-d",$time);
}

function getZhDate($time = false){
	$time = $time ? $time : time();
	return date("Y年m月d日",$time);
}

function getTime($time = false){
	$time = $time ? $time : time();
	return date("H:i:s",$time);
}

function getIp(){
    static $realip;
    if (isset($_SERVER)){
        if (isset($_SERVER["HTTP_X_FORWARDED_FOR"])){
            $realip = $_SERVER["HTTP_X_FORWARDED_FOR"];
        } else if (isset($_SERVER["HTTP_CLIENT_IP"])) {
            $realip = $_SERVER["HTTP_CLIENT_IP"];
        } else {
            $realip = $_SERVER["REMOTE_ADDR"];
        }
    } else {
        if (getenv("HTTP_X_FORWARDED_FOR")){
            $realip = getenv("HTTP_X_FORWARDED_FOR");
        } else if (getenv("HTTP_CLIENT_IP")) {
            $realip = getenv("HTTP_CLIENT_IP");
        } else {
            $realip = getenv("REMOTE_ADDR");
        }
    }
    return $realip;
}

function serverIP(){
    return gethostbyname($_SERVER['SERVER_NAME']);
}

function GET($e=false,$def=""){
	if(!$e){
		$GET = array();
		foreach ($_GET as $key => &$value) {
			$GET[$key] = addslashes($value);
		}
		return $GET;
	}
	if(isset($_GET[$e])){
		return addslashes($_GET[$e]);
	}else{
		return $def;
	}
}

function POST($e=false,$def=""){
	if(!$e){
		$POST = array();
		foreach ($_POST as $key => &$value) {
			$POST[$key] = addslashes($value);
		}
		return $POST;
	}
	if(isset($_POST[$e])){
		return addslashes($_POST[$e]);
	}else{
		return $def;
	}
}

function I($e=false,$def=""){
	if(!$e){
		$REQUEST = array();
		foreach ($_REQUEST as $key => &$value) {
			$REQUEST[$key] = addslashes($value);
		}
		return $REQUEST;
	}
	if(isset($_REQUEST[$e])){
		return addslashes($_REQUEST[$e]);
	}else{
		return $def;
	}
}

//通过get方法获取int
function getInt($e,$def=""){
	if(isset($_GET[$e])){
		return (int)$_GET[$e];
	}else{
		return (int)$def;
	}
} 

//通过get方法获取int
function postInt($e,$def=""){
	if(isset($_POST[$e])){
		return (int)$_POST[$e];
	}else{
		return (int)$def;
	}
} 

function postStr($e,$def=""){
	if(isset($_POST[$e])){
		return $_POST[$e];
	}else{
		return $def;
	}
} 


function get2code($e,$def=""){
	if(isset($_GET[$e])){
		return html2code( $_GET[$e] );
	}else{
		return $def;
	}
}

function post2code($e,$def){
	if(isset($_POST[$e])){
		return html2code( $_POST[$e] );
	}else{
		return $def;
	}
}

//存到数据库前保护
function html2code($e){
	return htmlspecialchars($e,ENT_QUOTES);
}

function code2html($e){
	return htmlspecialchars_decode($e,ENT_QUOTES);
}

function getDSPath( $path ){
	$path = implode( DS, $path);
	return $path;
}

function getStaticJS( $path ){
	return '<script src="' . __STATIC__ . $path . '" type="text/javascript"></script>';
}

function getJS( $path ){
	return '<script src="' . $path . '" type="text/javascript"></script>';
}