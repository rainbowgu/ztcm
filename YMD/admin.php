
<?php
header("Content-type: text/html; charset=utf-8");
session_start();
//url形式  index.php?c=控制器名&m=方法名
require_once('config.php');
require_once('framework/gyh.php');
gyh::run($config);
?>