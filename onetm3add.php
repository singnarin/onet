<?php
session_start();
$year = $_GET["year"];
$onetm3 = "onetm3".$year;
include("include/connect.php");

for ($i=0; $i < $_POST["row"]; $i++) { 
	mysql_query("INSERT INTO `".$onetm3."` (`schoolid`, `thai`, `social`, `english`, `math`, `science`, `average`) VALUES ('".$_POST["schoolid"][$i]."', '".$_POST["thai"][$i]."', '".$_POST["social"][$i]."', '".$_POST["english"][$i]."', '".$_POST["math"][$i]."', '".$_POST["science"][$i]."', '".$_POST["average"][$i]."')");
}
		$message = "นำเข้าข้อมูลสำเร็จ";
		echo "<script type='text/javascript'>alert('$message');</script>";
		echo "<meta http-equiv='refresh' content='0;URL=onetm3.php?year=".$year."'>";
mysql_close($Conn); 
?>