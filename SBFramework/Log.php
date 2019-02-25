<?php
//增加日志（登陆信息）
function logAddLoginSuccess($key="",$value){
	$db = \think\Db::name("log");
	$map['type'] = "login_success";
	$map['key'] = $key;
	$map['value'] = $value;
	$map['value2'] = getIp();
	$map['hidden'] = serialize($_SERVER);
	$db->insert($map);
}

//增加日志（登陆信息）
function logLoginFailed($key="",$value){
	$db = \think\Db::name("log");
	$map['type'] = "login_failed";
	$map['key'] = $key;
	$map['value'] = $value;
	$map['value2'] = getIp();
	$map['hidden'] = serialize($_SERVER);
	$db->insert($map);
}

//增加日志（行为信息）
function logAddArticle($key="",$value="",$value2=""){
	$db = \think\Db::name("log");
	$map['type'] = "add_article";
	$map['key'] = $key;
	$map['value'] = $value;
	$map['value2'] = $value2;
	$map['hidden'] = serialize($_SERVER);
	$db->insert($map);
}

//增加日志（行为信息）
function logEditArticle($key="",$value="",$value2=""){
	$db = \think\Db::name("log");
	$map['type'] = "edit_article";
	$map['key'] = $key;
	$map['value'] = $value;
	$map['value2'] = $value2;
	$map['hidden'] = serialize($_SERVER);
	$db->insert($map);
}

//增加日志（行为信息）
function logDelArticle($key="",$value="",$value2=""){
	$db = \think\Db::name("log");
	$map['type'] = "del_article";
	$map['key'] = $key;
	$map['value'] = $value;
	$map['value2'] = $value2;
	$map['hidden'] = serialize($_SERVER);
	$db->insert($map);
}

//增加日志（行为信息）
function logEditPasswordSuccess($key="",$value="",$value2=""){
	$db = \think\Db::name("log");
	$map['type'] = "edit_password_success";
	$map['key'] = $key;
	$map['value'] = $value;
	$map['value2'] = $value2;
	$map['hidden'] = serialize($_SERVER);
	$db->insert($map);
}

//增加日志（行为信息）
function logEditPasswordFailed($key="",$value="",$value2=""){
	$db = \think\Db::name("log");
	$map['type'] = "edit_password_failed";
	$map['key'] = $key;
	$map['value'] = $value;
	$map['value2'] = $value2;
	$map['hidden'] = serialize($_SERVER);
	$db->insert($map);
}

//增加日志（行为信息）
function logAddNews($key="",$value="",$value2=""){
	$db = \think\Db::name("log");
	$map['type'] = "add_news";
	$map['key'] = $key;
	$map['value'] = $value;
	$map['value2'] = $value2;
	$map['hidden'] = serialize($_SERVER);
	$db->insert($map);
}

//增加日志（行为信息）
function logDelNews($key="",$value="",$value2=""){
	$db = \think\Db::name("log");
	$map['type'] = "del_news";
	$map['key'] = $key;
	$map['value'] = $value;
	$map['value2'] = $value2;
	$map['hidden'] = serialize($_SERVER);
	$db->insert($map);
}

//增加日志（行为信息）
function logAddUserSuccess($key="",$value="",$value2=""){
	$db = \think\Db::name("log");
	$map['type'] = "add_user_success";
	$map['key'] = $key;
	$map['value'] = $value;
	$map['value2'] = $value2;
	$map['hidden'] = serialize($_SERVER);
	$db->insert($map);
}


//增加日志（行为信息）
function logAddUserFailed($key="",$value="",$value2=""){
	$db = \think\Db::name("log");
	$map['type'] = "add_user_failed";
	$map['key'] = $key;
	$map['value'] = $value;
	$map['value2'] = $value2;
	$map['hidden'] = serialize($_SERVER);
	$db->insert($map);
}

//增加日志（行为信息）
function logEditUserSuccess($key="",$value="",$value2=""){
	$db = \think\Db::name("log");
	$map['type'] = "edit_user_success";
	$map['key'] = $key;
	$map['value'] = $value;
	$map['value2'] = $value2;
	$map['hidden'] = serialize($_SERVER);
	$db->insert($map);
}

//增加日志（行为信息）
function logEditUserFailed($key="",$value="",$value2=""){
	$db = \think\Db::name("log");
	$map['type'] = "edit_user_failed";
	$map['key'] = $key;
	$map['value'] = $value;
	$map['value2'] = $value2;
	$map['hidden'] = serialize($_SERVER);
	$db->insert($map);
}

//增加日志（行为信息）
function logDelUserSuccess($key="",$value="",$value2=""){
	$db = \think\Db::name("log");
	$map['type'] = "del_user_success";
	$map['key'] = $key;
	$map['value'] = $value;
	$map['value2'] = getIp();
	$map['hidden'] = serialize($_SERVER);
	$db->insert($map);
}

//增加日志（行为信息）
function logDelUserFailed($key="",$value="",$value2=""){
	$db = \think\Db::name("log");
	$map['type'] = "del_user_failed";
	$map['key'] = $key;
	$map['value'] = $value;
	$map['value2'] = getIp();
	$map['hidden'] = serialize($_SERVER);
	$db->insert($map);
}