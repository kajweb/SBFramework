<?php
$_controller = $_SB_PathInfo[0] ?? "index";

spl_autoload_register(function ($class_name) use ($_controller) {
    require_once __APP__ . $_controller . "/Controller/" . $class_name . '.php';
});

$_object = isset($_SB_PathInfo[1]) ? $_SB_PathInfo[1] . __SUFFIX__ : "index" . __SUFFIX__;
$_function = isset($_SB_PathInfo[2]) ? $_SB_PathInfo[2] : "index";

$_SB_Running = new $_object();
isset($_function) && $func = $_function;
isset($_function) && ($_object!=$_function) && $_SB_Running->$func();

unset($_object);
unset($_function);
unset($_SB_PathInfo);
unset($func);