<?php
session_start(); //เปิด seesion เพื่อทำงาน
$loginid="null";
$password="null";
$_SESSION['ses_username']=null;
echo '<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />';
//กำหนดภาษาของเอกสารให้เป็น UTF-8
$loginid = $_POST['loginid'];
//ประกาศซตัวแปรชื่อ username โดยการรับค่ามาจากกล่อง username ที่หน้า Login
$password = $_POST['password'];
//ประกาศซตัวแปรชื่อ password โดยการรับค่ามาจากกล่อง password ที่หน้า Login
if($loginid == "") {                    //ถ้ายังไม่ได้กรอกข้อมูลที่ชื่อผู้ใช้ให้ทำงานดังต่อไปนี้
$message = "คุณยังไม่ได้ใส่ชื่อผู้ใช้ครับ";
	echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=login.php'>";
	} else if($password == "") {        //ถ้ายังไม่ได้กรอกรหัสผ่านให้ทำงานดังต่อไปนี้
		$message = "คุณยังไม่ได้ใส่รหัสผ่านครับ";
		echo "<script type='text/javascript'>alert('$message');</script>";
		echo "<meta http-equiv='refresh' content='0;login.php'>";
			} else {                                               //ถ้ากรอกข้อมูลทั้งหมดแล้วให้ทำงานดังนี้
				include("include/connect.php");          //เรียก function สำหรับติดต่อฐานข้อมูลจากหน้า connect.php ขึ้นมา
				$check_log = mysql_query("SELECT * FROM tbschool WHERE schoolid = '$loginid' AND password = '$password'");//ใช้ภาษา SQL ตรวจสอบข้อมูลในฐานข้อมูล
				$num = mysql_num_rows($check_log);//ให้เอาค่าที่ได้ออกมาประกาศเป็นตัวแปรชื่อ $num
if($num <=0) {                                                           //ถ้าหากค่าที่ได้ออกมามีค่าต่ำกว่า 1
	$message = "ชื่อผู้ใช้หรือรหัสผ่านของคุณไม่ถูกต้องครับ";
	echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=login.php'>";
	} else {
		while ($data = mysql_fetch_array($check_log) ) {
		$_SESSION['ses_userid'] = session_id();            //สร้าง session สำหรับเก็บค่า ID
		$_SESSION['ses_username'] = $loginid ;      //สร้าง session สำหรับเก็บค่า Username
		echo "<meta http-equiv='refresh' content='0;URL=index.php'>";

}
}
}
mysql_close($Conn);
?>