<?php
// 错误显示级别
ini_set( "display_errors", "On" );
error_reporting( E_ALL | E_STRICT );

// 加载框架文件
include "SBFramework/Init.php";
// 运行框架
SBFramework::run();