<?php
//加载常量配置
$System_Init["CORE"] = $System_Init['SB']."/core";

foreach ($System_Init as $name=>$item) {
	define("__".$name."__", __ROOT__ . $item . "/");
}

$System_CONFIG_Init = include __CONFIG__ . '/Config.php';

foreach ($System_CONFIG_Init as $name=>$item) {
	define("__".$name."__" , $item);
}

unset($System_Init);
unset($System_CONFIG_Init);

include __SB__."core/PathInfo.php";
include __SB__."core/Autoload.php";