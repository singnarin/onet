<?php
include("include/connect.php");
$schoolResult =  mysql_fetch_array(mysql_query("SELECT * FROM tbschool WHERE schoolid = '".$_SESSION['ses_username']."'")) or die ("Error Query [".$strSQLstatus."]");
?>
<div class="navbar">
  <div class="navbar-inner">
    <div class="container">
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
      <div class="nav-collapse">
        <ul class="nav">
          <li class="active"><a href="index.php">หน้าแรก</a></li>
          <li class=""><a href="ntp3.php">NT ป.3</a></li>
          <li class=""><a href="onetp6.php">O-NET ป.6</a></li>
          <li class=""><a href="onetm3.php">O-NET ม.3</a></li>
          <li class=""><a href="logout.php">ออกจากระบบ</a></li>
        </ul>
        <ul class="nav pull-right">
        	<ul class="nav">
          		<li class=""><a href="#"><?php echo $_SESSION['ses_username']." - ".$schoolResult["schoolname"];?></a></li>
          	</ul>
        </ul>   
      </div>
    </div>
  </div>
</div>