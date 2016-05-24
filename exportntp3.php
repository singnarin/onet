<?php
include("include/connect.php");
session_start();
header("Content-Type: application/vnd.ms-excel");
$date = date("Y-m-d");
header('Content-Disposition: attachment; filename="ntป3'.$date.'.xls"');

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
?>
<div class="container">
	<div class="row">
  	 		<div class="span12" align="center">
  	  				ผลการประเมินคุณภาพการศึกษาขั้นพื้นฐานเพื่อการประกันคุณภาพผู้เรียน (NT) <br>
  	  				ชั้นประถมศึกษาปีที่ 3 ปีการศึกษา 25<?php echo $year;?> <br>
  	  				สำนักงานเขตพื้นที่การศึกษาประถมศึกษาพะเยา เขต 1 <br>
  	  		<div class="span12">
  	  			<table border="1" >
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