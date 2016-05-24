<?php
include("include/connect.php");
session_start();
header("Content-Type: application/vnd.ms-excel");
$date = date("Y-m-d");
header('Content-Disposition: attachment; filename="onetม3'.$date.'.xls"');
$year = $_GET["year"];
$onetm3 = "onetm3".$year;
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>

<body>
<?php
	if($_SESSION['ses_username']=="56010000")
	{	
		$sel_onetm3 = mysql_query("SELECT * FROM `".$onetm3."` ORDER BY `nationallylevel` DESC");
		$sel_county = mysql_fetch_array(mysql_query("SELECT * FROM `".$onetm3."` WHERE `schoolid` = '56010000'"));
		$sel_nationally = mysql_fetch_array(mysql_query("SELECT * FROM `".$onetm3."` WHERE `schoolid` = '00000000'"));
?>
<div class="container">
	<div class="row">
  	 		<div class="span12" align="center">
  	  				ผลการทดสอบทางการศึกษาระดับชาติขั้นพื้นฐาน (O-NET) <br>
  	  				ชั้นมัธยมศึกษาปีที่ 3 ปีการศึกษา 25<?php echo $year;?> <br>
  	  				สำนักงานเขตพื้นที่การศึกษาประถมศึกษาพะเยา เขต 1 <br>
  	  		</div>
  	  		<div class="span12">
  	  			<table border="1" >
  	  				<tr>
  	  				<th><div align="center">รหัสโรงเรียน</div></th>
  	  				<th><div align="center">ชื่อโรงเรียน</div></th>
  	  				<th><div align="center">น.ร.(คน)</div></th>
  	  				<th><div align="center">ไทย</div></th>
  	  				<th><div align="center">สังคม</div></th>
  	  				<th><div align="center">อังกฤษ</div></th>
  	  				<th><div align="center">คณิตศาสตร์</div></th>
  	  				<th><div align="center">วิทยาศาสตร์</div></th>
  	  				<th><div align="center">เฉลี่ย</div></th>
  	  				<th><div align="center">เทียบกับระดับเขต</div></th>
  	  				<th><div align="center">เทียบกับระดับประเทศ</div></th>
  	  				</tr>
  	  				<?php
  	  					while($onetm3Result = mysql_fetch_array($sel_onetm3))
						{
							$sel_school = mysql_fetch_array(mysql_query("SELECT * FROM `tbschool` WHERE `schoolid` = '".$onetm3Result['schoolid']."'"));
					?>
							<tr>
								<td><?php echo $onetm3Result['schoolid'];?></td>
								<td><?php echo $sel_school['schoolname'];?></td>
								<td><?php echo $onetm3Result['student'];?></td>
								<td><?php echo $onetm3Result['thai'];?></td>
								<td><?php echo $onetm3Result['social'];?></td>
								<td><?php echo $onetm3Result['english'];?></td>
								<td><?php echo $onetm3Result['math'];?></td>
								<td><?php echo $onetm3Result['science'];?></td>
								<td><?php echo $onetm3Result['average'];?></td>
								<td><?php echo $onetm3Result['countylevel'];?></td>
								<td><?php echo $onetm3Result['nationallylevel'];?></td>
							</tr>
					<?php
						}
  	  				?>
  	  			</table>
  	  		</div>
  	 </div>
</div>
<?php
}else{
	$message = "ไม่สามารถทำงานได้ เนื่องจากยังไม่ได้ Login หรือไม่ผ่านการทดสอบสิทธิ์ในการเข้าใช้งาน";
	echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<meta http-equiv='refresh' content='0;URL=index.php'>";
}
mysql_close($Conn);?>
</body>

</html>