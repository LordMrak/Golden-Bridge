<?php
# FileName="Connection_php_mysql.htm"
# Type="MYSQL"
# HTTP="true"
include("class.simpleDB.php");
include("class.simpleMysqli.php");
$settings=array(
    'server' => 'localhost',
    'username' => 'root',
    'password' => '',
    'db' => 'goldenbridge',
    'port' => 3306,
	'charset' => 'utf8',
);
$db_gb=new simpleMysqli($settings);


?>