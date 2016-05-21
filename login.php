<!doctype html>
<?php
include("include/connect.php");
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
<br>
<?php include("include/header.php");?>
<div class="container">
  <div class="bg">
	<div class="row">
			<div class="span3"></div>	
    		<div class="span6"><br><br>
    		  <form action="checklogin.php" method="post">
    			<table>
    				<tr>
          				<td width="103"></td>
          				<td width="200" align="center"><h4>เข้าสู่ระบบ</h4></td>
          				<td width="130"></td>
        			</tr>
    				<tr>
          				<td width="103"></td>
          				<td width="200">
            				<img class="profile-img" src="images/user.png" alt="">
            			</td>
          				<td width="130"></td>
        			</tr>
    				<tr>
          				<td width="103">ชื่อผู้ใช้ : </td>
          				<td width="200">
            				<input class="input-large" placeholder="" type="text" name="loginid" size="30" /></td>
          				<td width="130"></td>
        			</tr>
       				<tr>
          				<td>รหัสผ่าน : </td>
          				<td>
           					<input class="input-large"  type="password" name="password" size="30" /></td>
          				<td></td>
        			</tr>
       				 <tr>
          				<td>&nbsp;</td>
          				<td><div align="center"><input class="btn btn-primary" type="submit" value=" เข้าสู่ระบบ " /></div><br><br></td>
          				<td>&nbsp;</td>
       				</tr>
    			</table>
    		  </form>
    		</div>
    		<div class="span3"></div>
  	 </div>
  </div>
</div>
	<br>
	<br>
<?php include("include/footer.php");?>
	</div>
    <script src="http://code.jquery.com/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
</body>
</html>
<?php
mysql_close($Conn); 
?>