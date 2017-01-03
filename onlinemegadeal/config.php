<?php

$db_host = "localhost"; //hostname
$db_user = "root"; // username
$db_password =""; // password
$db_name = "onlinemegadeal"; //database name
$conn = mysql_connect($db_host, $db_user, $db_password ) or die(mysql_error());
mysql_select_db($db_name, $conn) or die(mysql_error());



