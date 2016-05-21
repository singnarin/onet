<?php
$host="localhost";
$username="root";
$pass_word="tootuu7413";
$db="onetdb";
$Conn = mysql_connect( $host,$username,$pass_word) or die ("ติดต่อฐานข้อมูลไม่ได้");
mysql_query("SET NAMES utf8",$Conn);
mysql_select_db($db) or die("เลือกฐานข้อมูลไม่ได้");

?>
