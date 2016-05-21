<!doctype html>
<?php
include("include/connect.php");
session_start();
?>
<html>
<head>
<meta charset="UTF-8">
<title>ระบบรายงาน...</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
<link rel="shortcut icon" type="image/x-icon" href="images/favicon.ico">
<?php
include("css/style.css");
?>
</head>
<body>
<?php
	if ($_SESSION['ses_username']=="56010000"){	
?>
	<br>
<?php include("include/header.php");?>
<div class="container">
  <div class="bg">
	<div class="row">
  	  		<div class="span12">
  	  			<?php include("include/navbar.php");?>
  	  			<br>
				<br>
  	 		</div>
  	  		<div class="span1"></div>
  	  		<div class="span3">
  	  				นำเข้าข้อมูล NT ป.3
  	  		</div>
  	  	<form action="../onet59/ntM3Upload.php" method="post" enctype="multipart/form-data" name="form1">
  	  		<div class="span8">
  	  				<input name="fileCSV" type="file" id="fileCSV">
  					<input name="btnSubmit" type="submit" id="btnSubmit" value="Upload"> <a href="download/nt.csv"> โหลดไฟล์ CSV NT</a>
  					<br>
  					<br>
  			</div>
  		</form>
  			<div class="span1"></div>
  	  		<div class="span3">
  	  				นำเข้าข้อมูล O-NET ป.6
  	  		</div>
  	  	<form action="../onet59/onetP6Upload.php" method="post" enctype="multipart/form-data" name="form2">
  	  		<div class="span8">
  	  				<input name="fileCSV" type="file" id="fileCSV">
  					<input name="btnSubmit" type="submit" id="btnSubmit" value="Upload"> <a href="download/onet.csv"> โหลดไฟล์ CSV O-NET</a>
  					<br>
  					<br>
  			</div>
  		</form>
  			<div class="span1"></div>
  	  		<div class="span3">
  	  				นำเข้าข้อมูล O-NET ม.3
  	  		</div>
  	  	<form action="../onet59/onetM3Upload.php" method="post" enctype="multipart/form-data" name="form3">
  	  		<div class="span8">
  	  				<input name="fileCSV" type="file" id="fileCSV">
  					<input name="btnSubmit" type="submit" id="btnSubmit" value="Upload">
  					<br>
  					<br>
  			</div>
  		</form>
  			<div class="span1"></div>
  	  		<div class="span9">
  	  			<br>
  	  				- ไฟล์ที่อัพโหลดต้องนามสกุล .csv  และ Encoding เป็น UTF-8
				<br>
				<br>
				<br>
				<br>
				<br>
  	  			</div>
  	  		</div>
  	 </div>
  </div>
</div>
	<br>
	<br>
<?php include("include/footer.php");?>
	</div>
<?php
	}else{
		$message = "ไม่สามารถทำงานได้ เนื่องจากยังไม่ได้ Login หรือไม่ผ่านการทดสอบสิทธิ์ในการเข้าใช้งาน";
		echo "<script type='text/javascript'>alert('$message');</script>";
		echo "<meta http-equiv='refresh' content='0;URL=login.php'>";
	} 
?>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
mysql_close($Conn); 
?>