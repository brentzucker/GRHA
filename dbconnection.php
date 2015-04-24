<?php
$host = "localhost";
$db = "internet_prog";
$username = "root";
$pwd = "";

$db_server = mysql_connect($host, $username, $pwd);
if(!$db_server)die("can't connect to server". mysql_error());

mysql_select_db($db);

?>