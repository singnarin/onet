<?php
include("include/connect.php");
session_start();

$year = $_GET["year"];
$onetm3 = "onetm3".$year;

$sel_county = mysql_fetch_array(mysql_query("SELECT * FROM `".$onetm3."` WHERE `schoolid` = '56010000'"));
$sel_nationally = mysql_fetch_array(mysql_query("SELECT * FROM `".$onetm3."` WHERE `schoolid` = '00000000'"));

if ($_SESSION['ses_username']!=""){	

if ($_FILES["fileCSV"]["error"]>0){
	$message = "ยังไม่ได้เลือกไฟล์ หรือเกิดข้อพิดพลาด โปรดตรวจสอบ";
	echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
}else{

//move_uploaded_file($_FILES["fileCSV"]["tmp_name"],'D:\xampp\htdocs\onet59\Upload\\'.$_FILES["fileCSV"]["name"]);
move_uploaded_file($_FILES["fileCSV"]["tmp_name"],'/var/www/onet59/Upload\\'.$_FILES["fileCSV"]["name"]);

$objCSV = fopen('Upload\\'.$_FILES["fileCSV"]["name"], "r");
while (($objArr = fgetcsv($objCSV, 3000, ",")) !== FALSE) {

	$sel_onetm3 = mysql_query("SELECT * FROM `".$onetm3."` WHERE `schoolid` = '".$objArr[0]."'");
	$count = mysql_num_rows($sel_onetm3);

	if($count == '1'){
		$countylevel = round($objArr[8] - $sel_county['average'],2);
		$nationallylevel = round($objArr[8] - $sel_nationally['average'],2);
		mysql_query("UPDATE `".$onetm3."` SET `schoolID` = '".$objArr[0]."', `student` = '".$objArr[2]."' , `thai` = '".$objArr[3]."' , `social` = '".$objArr[4]."' , `english` = '".$objArr[5]."' , `math` = '".$objArr[6]."', `science` = '".$objArr[7]."', `average` = '".$objArr[8]."', `countylevel` = '".$countylevel."' , `nationallylevel` = '".$nationallylevel."' WHERE `schoolid` = '".$objArr[0]."'");
	}else{
		$countylevel = round($objArr[8] - $sel_county['average'],2);
		$nationallylevel = round($objArr[8] - $sel_nationally['average'],2);
		$sel_tbschool = mysql_query("SELECT * FROM `tbschool` WHERE `schoolid` = '".$objArr[0]."'");
		$count1 = mysql_num_rows($sel_tbschool);
			if ($count1 == '1') {
				$strSQL = "INSERT INTO `".$onetm3."` ";
				$strSQL .="(`schoolid`, `student`, `thai`, `social`, `english`, `math`, `science`, `average`,`countylevel`,`nationallylevel`)";
				$strSQL .="VALUES ";
				$strSQL .="('".$objArr[0]."','".$objArr[2]."','".$objArr[3]."','".$objArr[4]."','".$objArr[5]."','".$objArr[6]."','".$objArr[7]."','".$objArr[8]."','".$countylevel."','".$nationallylevel."') ";
				$objQuery = mysql_query($strSQL);
			}
		}
}
fclose($objCSV);

		$message = "นำเข้าข้อมูลสำเร็จ";
		echo "<script type='text/javascript'>alert('$message');</script>";
		echo "<meta http-equiv='refresh' content='0;URL=onetm3.php?year=".$year."'>";
	}
}else{
		$message = "ไม่สามารถทำงานได้ เนื่องจากยังไม่ได้ Login หรือไม่ผ่านการทดสอบสิทธิ์ในการเข้าใช้งาน";
		echo "<script type='text/javascript'>alert('$message');</script>";
		echo "<meta http-equiv='refresh' content='0;URL=../index.php'>";
		} 
mysql_close($Conn); 
?>
</table>
</body>
</html>
