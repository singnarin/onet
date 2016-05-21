<!doctype html>
<?php
include("include/connect.php");
session_start();

$sel_nt = mysql_query("SELECT * FROM `nt` ORDER BY `schoolid`");
$sel_county = mysql_fetch_array(mysql_query("SELECT * FROM `nt` WHERE `schoolid` = '56010000'"));
$sel_nationally = mysql_fetch_array(mysql_query("SELECT * FROM `nt` WHERE `schoolid` = '00000000'"));
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
  	 		</div>
  	  		<div class="span12">
  	  			<table class="table table-bordered" >
  	  				<tr>
  	  				<th>รหัสโรงเรียน</th>
  	  				<th>ชื่อโรงเรียน</th>
  	  				<th>น.ร.(คน)</th>
  	  				<th>ด้านภาษา</th>
  	  				<th>ด้านคำนวณ</th>
  	  				<th>ด้านเหตุผล</th>
  	  				<th>รวมเฉลี่ย</th>
  	  				<th>เทียบกับระดับเขต</th>
  	  				<th>เทียบกับระดับประเทศ</th>
  	  				</tr>
  	  				<?php
  	  					while($ntResult = mysql_fetch_array($sel_nt))
						{
							$sel_school = mysql_fetch_array(mysql_query("SELECT * FROM `tbschool` WHERE `schoolid` = '".$ntResult['schoolid']."'"));
					?>
							<tr>
								<td><?php echo $ntResult['schoolid'];?></td>
								<td><?php echo $sel_school['schoolname'];?></td>
								<td><?php echo $ntResult['student'];?></td>
								<td><?php echo $ntResult['language'];?></td>
								<td><?php echo $ntResult['calculate'];?></td>
								<td><?php echo $ntResult['reason'];?></td>
								<td><?php echo $ntResult['average'];?></td>
								<td>
								<?php 
									$countylevel = round($ntResult['average'] - $sel_county['average'],2);
									$nationallylevel = round($ntResult['average'] - $sel_nationally['average'],2);
									echo $countylevel;
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