<!doctype html>
<?php
include("include/connect.php");
session_start();

$year = $_GET["year"];
$nt = "nt".$year;

$sel_nt = mysql_query("SELECT * FROM `".$nt."` ORDER BY `nationallylevel` DESC");

$sel_nationally = mysql_query("SELECT * FROM `".$nt."` WHERE `schoolid` = '00000000'");
$countnationally = mysql_num_rows($sel_nationally);
$nationallyResult = mysql_fetch_array($sel_nationally);

$sel_county = mysql_query("SELECT * FROM `".$nt."` WHERE `schoolid` = '56010000'");
$countcounty = mysql_num_rows($sel_county);
$countyResult = mysql_fetch_array($sel_county);
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
<?php
if ($countcounty>0 AND $countnationally>0) {
?>
  	 		<div class="span12" align="center">
  	  				นำเข้าข้อมูล nt ป.3
  	  		</div>
  	  	<form action="ntp3Upload.php?year=<?php echo $year;?>" method="post" enctype="multipart/form-data" name="form2">
  	  		<div class="span12" align="center">
  	  				<input name="fileCSV" type="file" id="fileCSV">
  					<input name="btnSubmit" type="submit" id="btnSubmit" value="Upload"> <a href="download/nt.csv"> โหลดไฟล์ NT CSV</a>
  					<br>
  					<br>
  			</div>
  		</form>
  	 		<div class="span12" align="center">
  	  				ผลการประเมินคุณภาพการศึกษาขั้นพื้นฐานเพื่อการประกันคุณภาพผู้เรียน (NT) <br>
  	  				ชั้นประถมศึกษาปีที่ 3 ปีการศึกษา 25<?php echo $year;?> <br>
  	  				สำนักงานเขตพื้นที่การศึกษาประถมศึกษาพะเยา เขต 1 <br>
  	  		</div>
  	  		<div class="span12" align="right">
  	  				<input class="btn btn-primary" type="button" name="Button" value="Export Data" onClick="window.location.href='exportntp3.php?year=<?php echo $year;?>'"><br>
  	  		</div>
  	  		<div class="span12">
  	  			<table class="table table-bordered" >
  	  				<tr>
  	  				<th><div align="center">รหัสโรงเรียน</div></th>
  	  				<th><div align="center">ชื่อโรงเรียน</div></th>
  	  				<th><div align="center">น.ร.(คน)</div></th>
  	  				<th><div align="center">ด้านภาษา</div></th>
  	  				<th><div align="center">ด้านคำนวณ</div></th>
  	  				<th><div align="center">ด้านเหตุผล</div></th>
  	  				<th><div align="center">รวมเฉลี่ย</div></th>
  	  				<th><div align="center">เทียบกับระดับเขต</div></th>
  	  				<th><div align="center">เทียบกับระดับประเทศ</div></th>
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
								<td><?php echo $ntResult['countylevel'];?></td>
								<td><?php echo $ntResult['nationallylevel'];?></td>
							</tr>
					<?php
						}
  	  				?>
  	  			</table>
  	  		</div>
          <?php 
        }else{
          ?>
          <div class="span12" align="center">
  	  				ผลการประเมินคุณภาพการศึกษาขั้นพื้นฐานเพื่อการประกันคุณภาพผู้เรียน (NT) <br>
  	  				ชั้นประถมศึกษาปีที่ 3 ปีการศึกษา 25<?php echo $year;?> <br>
  	  				สำนักงานเขตพื้นที่การศึกษาประถมศึกษาพะเยา เขต 1 <br>
  	  	  </div>
          <form id="form1" name="form1" method="post" action="ntp3add.php?year=<?php echo $year;?>">
          <div class="span12" align="center">
              <table class="table table-bordered" >
                <tr>
                  	<th><div align="center">ระดับ</div></th>
                  	<th><div align="center">ด้านภาษา</div></th>
  	  				<th><div align="center">ด้านคำนวณ</div></th>
  	  				<th><div align="center">ด้านเหตุผล</div></th>
  	  				<th><div align="center">รวมเฉลี่ย</div></th>
              </tr>
              <tr>
                <td>เขตพื้นที่การศึกษา</td>
                	<input type="hidden" name="schoolid[]" value="56010000">
                	<td><input type="text" name="laguage[]" class="input-mini"></td>
                	<td><input type="text" name="calculate[]" class="input-mini"></td>
                	<td><input type="text" name="reason[]" class="input-mini"></td>
                	<td><input type="text" name="average[]" class="input-mini"></td>
              </tr>
              <tr>
                <td>ประเทศ</td>
                <input type="hidden" name="schoolid[]" value="00000000">
                	<td><input type="text" name="laguage[]" class="input-mini"></td>
                	<td><input type="text" name="calculate[]" class="input-mini"></td>
                	<td><input type="text" name="reason[]" class="input-mini"></td>
                	<td><input type="text" name="average[]" class="input-mini"></td>
              </tr>
            </table>
            <input type="hidden" name="row" value="2">
            <div align="center"><input class="btn btn-primary" type="submit" value=" บันทึกข้อมูล " />
          </div>
          </form>
          <?php 
        }
          ?>
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