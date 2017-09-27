
<?php
header("Content-type: text/html; charset=utf-8");
session_start();
error_reporting(E_ALL);
define("_APP_", "http://ym.njztcm.cn");
define("_URL_", "C:/phpStudy/YMD");

require_once('config.php');
require_once('framework/gyh.php');
require_once('index11.php');



gyh::run($config);
?>

