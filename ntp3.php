<!doctype html>
<?php
include("include/connect.php");
session_start();

$sel_nt57 = mysql_query("SELECT * FROM `nt57` ORDER BY `schoolid`");
$sel_county = mysql_fetch_array(mysql_query("SELECT * FROM `nt57` WHERE `schoolid` = '56010000'"));
$sel_nationally = mysql_fetch_array(mysql_query("SELECT * FROM `nt57` WHERE `schoolid` = '00000000'"));
?>
<html>
<head>
<meta charset="UTF-8">
<title>ระบบรายงานผลการทดสอบทางการศึกษา</title>
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
  	 		</div>
  	 		<div class="span12" align="center">
<<<<<<< HEAD
  	  				ผลการประเมินคุณภาพการศึกษาขั้นพื้นฐานเพื่อการประกันคุณภาพผู้เรียน (nt57) <br>
  	  				ชั้นประถมศึกษาปีที่ 3 ปีการศึกษา 2557 <br>
  	  				สำนักงานเขตพื้นที่การศึกษาประถมศึกษาพะเยา เขต 1 <br>
  	  		</div>
  	  		<div class="span12" align="right">
  	  				<input class="btn btn-primary" type="button" name="Button" value="Export Data" onClick="window.location.href='exportnt57p3.php'"><br>
=======
  	  				ผลการประเมินคุณภาพการศึกษาขั้นพื้นฐานเพื่อการประกันคุณภาพผู้เรียน (nt) <br>
  	  				ชั้นประถมศึกษาปีที่ 3 ปีการศึกษา 2558 <br>
  	  				สำนักงานเขตพื้นที่การศึกษาประถมศึกษาพะเยา เขต 1 <br>
  	  		</div>
  	  		<div class="span12" align="right">
  	  				<input class="btn btn-primary" type="button" name="Button" value="Export Data" onClick="window.location.href='exportntp3.php'"><br>
>>>>>>> a99f0b404411baa434047b751c4a3946fb9f8d59
  	  		</div>
  	  		<div class="span12">
  	  			<table class="table table-bordered" >
  	  				<tr>
  	  				<th><div align="center">รหัสโรงเรียน</div></th>
  	  				<th><div align="center">ชื่อโรงเรียน</div></th>
  	  				<th><div align="center">น.ร.(คน)</div></div></th>
  	  				<th><div align="center">ด้านภาษา</div></th>
  	  				<th><div align="center">ด้านคำนวณ</div></th>
  	  				<th><div align="center">ด้านเหตุผล</div></th>
  	  				<th><div align="center">รวมเฉลี่ย</div></th>
  	  				<th><div align="center">เทียบกับระดับเขต</div></th>
  	  				<th><div align="center">เทียบกับระดับประเทศ</div></th>
  	  				</tr>
  	  				<?php
  	  					while($nt57Result = mysql_fetch_array($sel_nt57))
						{
							$sel_school = mysql_fetch_array(mysql_query("SELECT * FROM `tbschool` WHERE `schoolid` = '".$nt57Result['schoolid']."'"));
					?>
							<tr>
								<td><?php echo $nt57Result['schoolid'];?></td>
								<td><?php echo $sel_school['schoolname'];?></td>
								<td><?php echo $nt57Result['student57'];?></td>
								<td><?php echo $nt57Result['language'];?></td>
								<td><?php echo $nt57Result['calculate'];?></td>
								<td><?php echo $nt57Result['reason'];?></td>
								<td><?php echo $nt57Result['average'];?></td>
								<td>
								<?php 
									$count57ylevel = round($nt57Result['average'] - $sel_count57y['average'],2);
									$nationallylevel = round($nt57Result['average'] - $sel_nationally['average'],2);
									echo $count57ylevel;
								?>
								</td>
								<td>
									<?php
										echo $nationallylevel;
									?>
								</td>
							</tr>
					<?php
						}
  	  				?>
  	  			</table>
  	  		</div>
  	  		<div class="span12">
  	  			<div align="center">
  	  			<br>
  	  			
  	  			</div>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
				<br>
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