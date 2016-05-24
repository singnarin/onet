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
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">NT ป.3<b class="caret"></b></a>
            <ul class="dropdown-menu">
              	<li ><a href='ntp3.php?year=57'>ปี 2557</a></li>
      	 		<li ><a href='ntp3.php?year=58'>ปี 2558</a></li>
      	 		<li ><a href='#'>สรุปภาพรวม</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">O-NET ป.6<b class="caret"></b></a>
            <ul class="dropdown-menu">
              	<li ><a href='onetp6.php?year=57'>ปี 2557</a></li>
      	 		<li ><a href='onetp6.php?year=58'>ปี 2558</a></li>
      	 		<li ><a href='#'>สรุปภาพรวม</a></li>
            </ul>
          </li>
          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">O-NET ม.3<b class="caret"></b></a>
            <ul class="dropdown-menu">
              	<li ><a href='onetm3.php?year=57'>ปี 2557</a></li>
      	 		<li ><a href='onetm3.php?year=58'>ปี 2558</a></li>
      	 		<li ><a href='#'>สรุปภาพรวม</a></li>
            </ul>
          </li>
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