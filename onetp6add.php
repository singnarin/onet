<?php
session_start();
$year = $_GET["year"];
$onetp6 = "onetp6".$year;
include("include/connect.php");
foreach($_POST['schoolid'] as $schoolid){
		mysql_query("INSERT INTO `onetp657` (`schoolid`) VALUES ('". $schoolid."')");
}
mysql_close($Conn); 
?>