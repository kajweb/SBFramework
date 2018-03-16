<?php
$_controller = $_SB_PathInfo[0] ?? "index";

spl_autoload_register(function ($class_name) use ($_controller) {
    require_once __APP__ . $_controller . "/Controller/" . $class_name . '.class.php';
});

$_SB_Running = isset($_SB_PathInfo[0]) ? new $_SB_PathInfo[0]() : new index();
isset($_SB_PathInfo[1]) && $func = $_SB_PathInfo[1];
isset($_SB_PathInfo[1]) && ($_SB_PathInfo[0]!=$_SB_PathInfo[1]) &&$_SB_Running->$func();

unset($_SB_PathInfo);
unset($func);