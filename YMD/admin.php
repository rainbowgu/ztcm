
<?php
header("Content-type: text/html; charset=utf-8");
session_start();
//url��ʽ  index.php?c=��������&m=������
require_once('config.php');
require_once('framework/gyh.php');
gyh::run($config);
?>