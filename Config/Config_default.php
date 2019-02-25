<?php
//APP_DEBUG		false 	显示所有错误
//APP_DEBUG		0 		显示部分错误
//APP_DEBUG		true 	不显示错误


return [
	"APP_DEBUG"	=>		0,
	"Application"	=>		"Application",
	"APP_AUTOLOAD"	=>		[
		"Controller"	=>  [
							"key" 	 => "C", 
							"SUFFIX" => "C.php",
							"Path" => __CORE__ . "AutoLoad" . DS . "Controller.php"
						],
		"Service"	=>  [
							"key" 	 => "S", 
							"SUFFIX" => "S.php",
							"Path" => __CORE__ . "AutoLoad" . DS . "Service.php"
						],
		"Model" 	=>  [
							"key" 	 => "M", 
							"SUFFIX" => "M.php",
							"Path" => __CORE__ . "AutoLoad" . DS . "Model.php"
						]
	],
	"AutoLoad"	=>  ["SBFramework","Config"],
	"upload" => "upload",
	"Path" => ltrim(str_replace( "\\","/" , str_replace($_SERVER["DOCUMENT_ROOT"],"",__ROOT__) ),"/")
	// "Path" => trim(str_replace( "\\","/" , str_replace($_SERVER["DOCUMENT_ROOT"],"",__ROOT__) ),"/") . "/"
];