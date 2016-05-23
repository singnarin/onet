<?php
include("include/connect.php");
session_start();

if ($_SESSION['ses_username']!=""){	

if ($_FILES["fileCSV"]["error"]>0){
	$message = "ยังไม่ได้เลือกไฟล์ หรือเกิดข้อพิดพลาด โปรดตรวจสอบ";
	echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<meta http-equiv='refresh' cont57ent57='0;URL=index.php'>";
}else{

move_uploaded_file($_FILES["fileCSV"]["tmp_name"],'/var/www/onet59/Upload\\'.$_FILES["fileCSV"]["name"]);

$objCSV = fopen('Upload\\'.$_FILES["fileCSV"]["name"], "r");
while (($objArr = fgetcsv($objCSV, 3000, ",")) !== FALSE) {

	$sel_nt57 = mysql_query("SELECT * FROM `nt57` WHERE `schoolid` = '".$objArr[0]."'");
	$count57 = mysql_num_rows($sel_nt57);

	if($count57 == '1'){
		mysql_query("UPDATE `nt57` SET `schoolid` = '".$objArr[0]."', `student57` = '".$objArr[2]."' , `language` = '".$objArr[3]."' , `calculate` = '".$objArr[4]."' , `reason` = '".$objArr[5]."' , `average` = '".$objArr[6]."' WHERE `schoolid` = '".$objArr[0]."'");
	}else{
		$sel_tbschool = mysql_query("SELECT * FROM `tbschool` WHERE `schoolid` = '".$objArr[0]."'");
		$count571 = mysql_num_rows($sel_tbschool);
			if ($count571 == '1') {
				$strSQL = "INSERT Int57O nt57 ";
				$strSQL .="(`schoolid`, `student57`, `language`, `calculate`, `reason`, `average`)";
				$strSQL .="VALUES ";
				$strSQL .="('".$objArr[0]."','".$objArr[2]."','".$objArr[3]."','".$objArr[4]."','".$objArr[5]."','".$objArr[6]."') ";
				$objQuery = mysql_query($strSQL);
			}
		}
}
fclose($objCSV);

		$message = "นำเข้าข้อมูลสำเร็จ";
		echo "<script type='text/javascript'>alert('$message');</script>";
		echo "<meta http-equiv='refresh' cont57ent57='0;URL=index.php'>";
	}
}else{
		$message = "ไม่สามารถทำงานได้ เนื่องจากยังไม่ได้ Login หรือไม่ผ่านการทดสอบสิทธิ์ในการเข้าใช้งาน";
		echo "<script type='text/javascript'>alert('$message');</script>";
		echo "<meta http-equiv='refresh' cont57ent57='0;URL=../index.php'>";
		} 
mysql_close($Conn); 
?>
</table>
</body>
</html>