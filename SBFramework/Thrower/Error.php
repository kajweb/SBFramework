<?php
namespace SBFramework\Thrower;
class Error
{
	static function Install(){
		set_error_handler([new self(),"FrameErrorHandler"]);
	}

	static function FrameErrorHandler($errno="", $errstr="", $errfile="", $errline="") {
		$errtype = "error";
		 // echo $errno."<br>";
		 // echo $errstr."<br>";
		 // echo $errfile."<br>";
		 $errfile = str_replace( __ROOT__, "", $errfile );
		 // echo $errline."<br>";
		if( !function_exists("mb_detect_encoding") ){
			$errstr = "请开启mb_detect_encoding支持 (extension=php_iconv.dll)";
		} elseif( !mb_detect_encoding($errstr)=="UTF-8" ){
			$errstr = iconv('gbk', 'utf-8', $errstr);
		}
		 include __WEB_SYSTEM__ . "error.php";
	}

	static function FrameExceptionHandler($e){
	    // if ($e instanceof Error)  
	    // {
	    //     echo "catch Error: " . $e->getCode() . '   ' . $e->getMessage() . '<br>';  
	    // }
	    // else  
	    // {
	    //     echo "catch Exception: " . $e->getCode() . '   ' . $e->getMessage() . '<br>';  
	    // }
	    $errtype = "exception";
		$errno = $e->getCode();
		$errstr = $e->getMessage();
		if( !function_exists("mb_detect_encoding") ){
			$errstr = "请开启mb_detect_encoding支持(extension=php_iconv.dll)";
		} elseif( !mb_detect_encoding($errstr)=="UTF-8" ){
			$errstr = iconv('gbk', 'utf-8', $errstr);
		}
		$errfile = $e->getFile();
		$errfile = str_replace( __ROOT__, "", $errfile );
		$errline = $e->getLine();
		$errtrace = $e->getTrace();
		include __WEB_SYSTEM__ . "error.php";
	}
}