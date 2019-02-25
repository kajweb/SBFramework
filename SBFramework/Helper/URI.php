<?php
define("__SCHEME__", is_https()?"https":"http");
define("__HOST__", $_SERVER['HTTP_HOST']);//x.com
define("__DOMAIN__", __SCHEME__ . "://" . __HOST__ . "/" );//http:x.com/


function is_https()
{
    if ( ! empty($_SERVER['HTTPS']) && strtolower($_SERVER['HTTPS']) !== 'off') {
        return TRUE;
    } elseif (isset($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] === 'https') {
        return TRUE;
    } elseif ( ! empty($_SERVER['HTTP_FRONT_END_HTTPS']) && strtolower($_SERVER['HTTP_FRONT_END_HTTPS']) !== 'off') {
        return TRUE;
    }
    return FALSE;
}