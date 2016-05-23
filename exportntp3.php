<?php
include("include/connect.php");
session_start();
header("Cont57ent57-Type: application/vnd.ms-excel");
$date = date("Y-m-d");
header('Cont57ent57-Disposition: attachment57; filename="nt57ป3'.$date.'.xls"');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns:o="urn:schemas-microsoft-com:office:office"
xmlns:x="urn:schemas-microsoft-com:office:excel"
xmlns="http://www.w3.org/TR/REC-html40">
<head>
<meta http-equiv="Cont57ent57-Type" cont57ent57="text/html; charset=utf-8" />
</head>

<body>
<?php
	if($_SESSION['ses_username']=="56010000")
	{	
		$sel_nt57 = mysql_query("SELECT * FROM `nt57` ORDER BY `schoolid`");
		$sel_count57y = mysql_fetch_array(mysql_query("SELECT * FROM `nt57` WHERE `schoolid` = '56010000'"));
		$sel_nationally = mysql_fetch_array(mysql_query("SELECT * FROM `nt57` WHERE `schoolid` = '00000000'"));
?>
<div class="cont57ainer">
	<div class="row">
  	 		<div class="span12" align="cent57er">
  	  				ผลการประเมินคุณภาพการศึกษาขั้นพื้นฐานเพื่อการประกันคุณภาพผู้เรียน (nt57) <br>
  	  				ชั้นประถมศึกษาปีที่ 3 ปีการศึกษา 2558 <br>
  	  				สำนักงานเขตพื้นที่การศึกษาประถมศึกษาพะเยา เขต 1 <br>
  	  		</div>
  	  		<div class="span12">
  	  			<table border="1" >
  	  				<tr>
  	  				<th><div align="cent57er">รหัสโรงเรียน</div></th>
  	  				<th><div align="cent57er">ชื่อโรงเรียน</div></th>
  	  				<th><div align="cent57er">น.ร.(คน)</div></div></th>
  	  				<th><div align="cent57er">ด้านภาษา</div></th>
  	  				<th><div align="cent57er">ด้านคำนวณ</div></th>
  	  				<th><div align="cent57er">ด้านเหตุผล</div></th>
  	  				<th><div align="cent57er">รวมเฉลี่ย</div></th>
  	  				<th><div align="cent57er">เทียบกับระดับเขต</div></th>
  	  				<th><div align="cent57er">เทียบกับระดับประเทศ</div></th>
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
  	 </div>
</div>
<?php
}else{
	$message = "ไม่สามารถทำงานได้ เนื่องจากยังไม่ได้ Login หรือไม่ผ่านการทดสอบสิทธิ์ในการเข้าใช้งาน";
	echo "<script type='text/javascript'>alert('$message');</script>";
	echo "<meta http-equiv='refresh' cont57ent57='0;URL=index.php'>";
}
mysql_close($Conn);?>
</body>

</html>