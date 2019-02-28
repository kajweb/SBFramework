<?php
namespace Config;
use think\Db;

Class Init{
	static function run(){
		// 初始化数据库配置
		(new self())->DB()->init();
	}
	
	function init(){
		include __ROOT__ . "Init.php";
		return $this;
	}
	
	function DB(){
		$_db_path = __CONFIG__ . "DB.php";
		// 检测框架是否完成安装
		if( !is_file($_db_path) ){
			errorPage("数据库配置文件不存在","请检查数据库配置文件是否存在","配置文件出错");
		}
		$dbConfig = include $_db_path;
		Db::setConfig($dbConfig);
		return $this;
	}
}