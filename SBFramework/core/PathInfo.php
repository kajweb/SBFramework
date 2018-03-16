<?php
if(isset($_SERVER['PATH_INFO'])){
	$_SB_PathInfo = explode('/',trim($_SERVER['PATH_INFO'],"/"));
}