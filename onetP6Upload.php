<?php
include("include/connect.php");
session_start();

if ($_SESSION['ses_username']!=""){	

if ($_FILES["fileCSV"]["error"]>0){
	$message = "ยังไม่ได้เลือกไฟล์ หรือเกิดข้อพิดพลาด โปรดตรวจสอบ";
	echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
}else{

move_uploaded_file($_FILES["fileCSV"]["tmp_name"],'/var/www/onet59/Upload\\'.$_FILES["fileCSV"]["name"]);

$objCSV = fopen('Upload\\'.$_FILES["fileCSV"]["name"], "r");
while (($objArr = fgetcsv($objCSV, 3000, ",")) !== FALSE) {

	$sel_nt = mysql_query("SELECT * FROM `onetp6` WHERE `schoolid` = '".$objArr[0]."'");
	$count = mysql_num_rows($sel_nt);

	if($count == '1'){
		mysql_query("UPDATE `onetp6` SET `schoolID` = '".$objArr[0]."', `student` = '".$objArr[2]."' , `thai` = '".$objArr[3]."' , `social` = '".$objArr[4]."' , `english` = '".$objArr[5]."' , `math` = '".$objArr[6]."', `science` = '".$objArr[7]."', `average` = '".$objArr[8]."' WHERE `schoolid` = '".$objArr[0]."'");
	}else{
		$sel_tbschool = mysql_query("SELECT * FROM `tbschool` WHERE `schoolid` = '".$objArr[0]."'");
		$count1 = mysql_num_rows($sel_tbschool);
			if ($count1 == '1') {
				$strSQL = "INSERT INTO onetp6 ";
				$strSQL .="(`schoolid`, `student`, `thai`, `social`, `english`, `math`, `science`, `average`)";
				$strSQL .="VALUES ";
				$strSQL .="('".$objArr[0]."','".$objArr[2]."','".$objArr[3]."','".$objArr[4]."','".$objArr[5]."','".$objArr[6]."','".$objArr[7]."','".$objArr[8]."') ";
				$objQuery = mysql_query($strSQL);
			}
		}
}
fclose($objCSV);

		$message = "นำเข้าข้อมูลสำเร็จ";
		echo "<script type='text/javascript'>alert('$message');</script>";
		echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
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