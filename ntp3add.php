<?php
session_start();
$year = $_GET["year"];
$nt = "nt".$year;
include("include/connect.php");

for ($i=0; $i < $_POST["row"]; $i++) { 
	mysql_query("INSERT INTO `".$nt."` (`schoolid`, `language`, `calculate`, `reason`, `average`) VALUES ('".$_POST["schoolid"][$i]."', '".$_POST["laguage"][$i]."', '".$_POST["calculate"][$i]."', '".$_POST["reason"][$i]."', '".$_POST["average"][$i]."')");
}
		$message = "นำเข้าข้อมูลสำเร็จ";
		echo "<script type='text/javascript'>alert('$message');</script>";
		echo "<meta http-equiv='refresh' content='0;URL=ntp3.php?year=".$year."'>";
mysql_close($Conn); 
?>