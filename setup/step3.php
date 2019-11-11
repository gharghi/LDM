<?php
//if (file_exists('../global/config.php'))
//header('location:../login.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="rtl">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>مدیریت اسناد لیمو -- نصب</title>
<link rel="stylesheet" type="text/css" href="../css/meta-admin.css" />
<link rel="icon" type="image/ico" href="../favicon.ico" />
<link rel="stylesheet" type="text/css" href="../css/green-theme.css" />
<link rel="stylesheet" href="../global/jalalijscalendar/skins/calendar-green.css">
<link rel="stylesheet" type="text/css" href="../css/ui/jquery-ui-1.10.0.custom.css" />
<!--[if lte IE 6]><link media="screen" rel="stylesheet" type="text/css" href="css/ie.css" /><![endif]-->
<script type="text/javascript" src="../scripts/jquery-1.9.0.js"></script>
<script type="text/javascript" src="../scripts/jquery-ui-1.10.0.custom.js"></script>
<script type="text/javascript" src="../scripts/css.js"></script>
<script type="text/javascript" src="../scripts/behaviour.js"></script>
<script type="text/javascript" src="../scripts/functions.js"></script>
</head>
<body>
<!--[if !IE]>start wrapper<![endif]-->
<div id="wrapper"> 
 <!--[if !IE]>start head<![endif]-->
 <div id="head">
  <div class="inner">
   <h1 id="logo"><a href="home.php">LDM control Adminstration Panel</a></h1>
   <!--[if !IE]>start user details<![endif]--> 
   <!--[if !IE]>end user details<![endif]--> 
   <!--[if !IE]>start main menu<![endif]--> 
  </div>
 </div>
 <!--[if !IE]>end head<![endif]--> 
 <!--[if !IE]>start content<![endif]-->
 <div id="content"> 
  <!--[if !IE]>start content bottom<![endif]-->
  <div class="inner"> 
   <!--[if !IE]>start info<![endif]--> 
   <!--[if !IE]>end section<![endif]-->
   <div id="info">
    <div class="section">
     <div class="section_inner">
      <ul class="system_messages">
       <li class="red" id="Ea" ><span class="ico"></span><strong class="system_title">امکان اتصال یه دیتابیس وجود ندارد!</strong></li>
       <li class="red" id="Eb" ><span class="ico"></span><strong class="system_title">تمامی فیلد ها به درستی تکمیل نشده اند!</strong></li>
       <li class="red" id="Ec" ><span class="ico"></span><strong class="system_title">ساخت دیتابیس با مشکل روبرو شد!</strong></li>
       <li class="red" id="Ed" ><span class="ico"></span><strong class="system_title">ایجاد فایل کانفیگ با مشکل روبرو شد!</strong></li>
       <li class="green" id="sa" ><span class="ico"></span><strong class="system_title">مراحل نصب با موفقیت تکمیل شد. </strong></li>
       
      </ul>
<?php
$error=1;
extract($_POST);
$con=mysql_connect($DBserver,$DBuser,$DBpass);
if (!$con)
{
	 echo "
<script type='text/javascript'>
$(document).ready(function() {
$('li.red#Ea').show().delay(2000).fadeOut(4000);
});
</script>
	";
}
else {
mysql_select_db($DBname);
if (empty($SessTime)||empty($EmailAccount)||empty($EmailSubject))
{
echo "
<script type='text/javascript'>
$(document).ready(function() {
$('li.red#Eb').show().delay(2000).fadeOut(4000);
});
</script>
	";
}
 else
 {
$CreateDB="CREATE TABLE IF NOT EXISTS `Admin` (
  `AID` int(8) NOT NULL auto_increment,
  `AUsername` varchar(30) NOT NULL,
  `Password` varchar(30) default NULL,
  `Grp` varchar(20) NOT NULL,
  `Lok` int(1) NOT NULL default '0',
  `Name` varchar(100) default NULL,
  `Email` varchar(50) default NULL,
  `Prm` varchar(100) default NULL,
  `Mob` bigint(10) default NULL,
  `Cookie` varchar(200) default '0',
  PRIMARY KEY  (`AID`),
  UNIQUE KEY `AUsername` (`AUsername`)
)  ";
$result=mysql_query($CreateDB,$con);
$CreateDB="
CREATE TABLE IF NOT EXISTS `AdminLogin` (
  `AID` int(6) default NULL,
  `Browser` varchar(150) default NULL,
  `Date` datetime default NULL,
  `IP` varchar(15) default NULL,
  `LogID` int(8) NOT NULL auto_increment,
  `Salt` bigint(10) default NULL,
  PRIMARY KEY  (`LogID`),
  KEY `AID` (`AID`)
)  
";
$result=mysql_query($CreateDB,$con);
$CreateDB="
CREATE TABLE IF NOT EXISTS `Audit` (
  `LOGID` int(20) NOT NULL auto_increment,
  `AID` int(8) NOT NULL,
  `Object` varchar(20) default NULL,
  `OID` varchar(20) default NULL,
  `Date` datetime default NULL,
  `Action` varchar(20) default NULL,
  `IP` varchar(15) default NULL,
  PRIMARY KEY  (`LOGID`),
  KEY `AID` (`AID`)
) 
";
$result=mysql_query($CreateDB,$con);
$CreateDB="
CREATE TABLE IF NOT EXISTS `DelIP` (
  `IPID` int(8) default NULL,
  `UserID` int(8) default NULL,
  `Oct1` int(3) default NULL,
  `Oct2` int(3) default NULL,
  `Oct3` int(3) default NULL,
  `Oct4` int(3) default NULL,
  `CIDR` int(2) default NULL,
  `CreDate` datetime default NULL,
  `DelDate` datetime default NULL,
  `DelIPID` int(8) NOT NULL auto_increment,
  `Object` varchar(20) NOT NULL default 'User',
  PRIMARY KEY  (`DelIPID`)
)  
";
$result=mysql_query($CreateDB,$con);
$CreateDB="
CREATE TABLE IF NOT EXISTS `Hardware` (
  `HWID` int(8) NOT NULL auto_increment,
  `TWID` int(8) NOT NULL,
  `SWID` int(8) NOT NULL,
  `VLAN` int(8) NOT NULL,
  `Username` varchar(30) default NULL,
  `Password` varchar(30) default NULL,
  `SNMP` varchar(20) default NULL,
  `Secret` varchar(20) default NULL,
  `MAC` varchar(17) default NULL,
  `UserID` int(10) NOT NULL,
  `Port` int(10) default NULL,
  `Model` varchar(40) default NULL,
  `Hostname` varchar(60) default NULL,
  `Searchable` tinyint(1) default '1',
  PRIMARY KEY  (`HWID`),
  KEY `VLAN` (`VLAN`),
  KEY `SWID` (`SWID`),
  KEY `TWID` (`TWID`),
  KEY `UserID` (`UserID`)
) 
";
$result=mysql_query($CreateDB,$con);
$CreateDB="
CREATE TABLE IF NOT EXISTS `IP` (
  `IPID` int(11) NOT NULL auto_increment,
  `UserID` int(8) NOT NULL,
  `netname` varchar(30) NOT NULL default '0',
  `NICHDL` varchar(30) NOT NULL default '0',
  `Source` varchar(100) NOT NULL default '0',
  `CIDR` int(2) NOT NULL,
  `Oct4` int(3) NOT NULL,
  `Oct3` int(3) NOT NULL,
  `Oct2` int(3) NOT NULL,
  `Oct1` int(3) NOT NULL,
  `Date` datetime default NULL,
  `Searchable` tinyint(1) default '1',
  `Object` varchar(20) NOT NULL default 'User',
  PRIMARY KEY  (`IPID`),
  KEY `UserID` (`UserID`)
) 
";
$result=mysql_query($CreateDB,$con);
$CreateDB="
CREATE TABLE IF NOT EXISTS `Port` (
  `PortID` int(8) NOT NULL auto_increment,
  `SWID` int(8) NOT NULL,
  `Describ` varchar(40) default NULL,
  `PNum` int(4) default NULL,
  `HWID` int(8) default NULL,
  `VLAN` int(4) default NULL,
  `Active` int(1) default '0',
  `Searchable` tinyint(1) default '1',
  PRIMARY KEY  (`PortID`),
  KEY `SWID` (`SWID`),
  KEY `Describ` (`Describ`)
)  
";
$result=mysql_query($CreateDB,$con);
$CreateDB="
CREATE TABLE IF NOT EXISTS `Prefix` (
  `PID` int(3) NOT NULL auto_increment,
  `Oct1` int(3) NOT NULL,
  `Oct2` int(3) NOT NULL,
  `Oct3` int(3) NOT NULL,
  `Oct4` int(3) NOT NULL,
  `CIDR` int(2) NOT NULL,
  `S24` tinyint(1) NOT NULL default '0',
  `S25` tinyint(1) NOT NULL default '0',
  `S26` tinyint(1) NOT NULL default '0',
  `S27` tinyint(1) NOT NULL default '0',
  `S28` tinyint(1) NOT NULL default '0',
  `S29` tinyint(1) NOT NULL default '0',
  `S30` tinyint(1) NOT NULL default '0',
  PRIMARY KEY  (`PID`)
)  
";
$result=mysql_query($CreateDB,$con);
$CreateDB="
CREATE TABLE IF NOT EXISTS `Switch` (
  `SWID` int(8) NOT NULL auto_increment,
  `Hostname` varchar(30) NOT NULL,
  `SNMP` varchar(20) default NULL,
  `Secret` varchar(20) default NULL,
  `PortCt` int(3) default NULL,
  `MAC` varchar(30) default NULL,
  `User` varchar(30) default NULL,
  `Pass` varchar(30) default NULL,
  `Model` varchar(30) default NULL,
  `TWID` int(6) default NULL,
  PRIMARY KEY  (`SWID`),
  UNIQUE KEY `Hostname` (`Hostname`),
  KEY `TWID` (`TWID`)
)  
";
$result=mysql_query($CreateDB,$con);
$CreateDB="
CREATE TABLE IF NOT EXISTS `Ticket` (
  `TID` int(10) NOT NULL auto_increment,
  `AID` int(8) NOT NULL,
  `UserID` int(8) NOT NULL,
  `Type` varchar(20) default NULL,
  `Date` datetime default NULL,
  PRIMARY KEY  (`TID`),
  KEY `AID` (`AID`),
  KEY `UserID` (`UserID`)
)  
";
$result=mysql_query($CreateDB,$con);
$CreateDB="
CREATE TABLE IF NOT EXISTS `TicketLog` (
  `ActionID` int(10) NOT NULL auto_increment,
  `TID` int(10) NOT NULL,
  `SndID` int(8) NOT NULL,
  `RcID` int(8) NOT NULL,
  `Date` datetime default NULL,
  PRIMARY KEY  (`ActionID`),
  KEY `TID` (`TID`)
)  
";
$result=mysql_query($CreateDB,$con);
$CreateDB="
CREATE TABLE IF NOT EXISTS `Tower` (
  `Name` varchar(100) NOT NULL,
  `Address` varchar(200) default NULL,
  `Resp` varchar(100) default NULL,
  `Tel` varchar(100) default NULL,
  `Height` int(2) default NULL,
  `TWID` int(11) NOT NULL auto_increment,
  PRIMARY KEY  (`TWID`),
  UNIQUE KEY `Name` (`Name`)
) 
";
$result=mysql_query($CreateDB,$con);
$CreateDB="
CREATE TABLE IF NOT EXISTS `Type` (
  `TID` int(8) NOT NULL auto_increment,
  `Type` varchar(40) default NULL,
  `Brand` varchar(50) default NULL,
  `Model` varchar(50) default NULL,
  `Searchable` tinyint(1) default '1',
  PRIMARY KEY  (`TID`)
)  
";
$result=mysql_query($CreateDB,$con);
$CreateDB="
CREATE TABLE IF NOT EXISTS `User` (
  `UserID` int(8) NOT NULL auto_increment,
  `Name` varchar(100) NOT NULL,
  `Cont` varchar(20) NOT NULL,
  `NICHDL` varchar(20) NOT NULL default '0',
  `Source` varchar(100) NOT NULL default '0',
  `LatName` varchar(100) NOT NULL,
  `LatAddress` varchar(200) NOT NULL,
  `LatResp` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `BW` float default NULL,
  `Address` varchar(300) default NULL,
  `Descrip` varchar(200) default NULL,
  `Status` int(1) NOT NULL default '0',
  `Resp` varchar(120) default NULL,
  `Tel` bigint(10) default NULL,
  `Mob` bigint(10) default NULL,
  `Searchable` tinyint(1) default '1',
  `NDeleted` tinyint(1) default '1',
  PRIMARY KEY  (`UserID`),
  UNIQUE KEY `Name` (`Name`),
  UNIQUE KEY `Cont` (`Cont`)
) ";
$result=mysql_query($CreateDB,$con);
$query="insert into Admin (AUsername,Password,Grp,Lok,Name,Prm) value ('admin','admin',1,1,'Default User','P11.5-P12.5-P13.5-P14.5-P15.5-P16.5-P1752-P18.5-P19.5-P20.5-P21.5')";
$result=mysql_query($query);
if (!$result)
{
echo "
<script type='text/javascript'>
$(document).ready(function() {
$('li.red#Ec').show().delay(2000).fadeOut(4000);
});
</script>
	";
}
else {
$File = "../global/config.php"; 
 $Handle = fopen($File, 'w');
 $Data = "<?php\n//Define Database Server Address\n"; 
 fwrite($Handle, $Data); 
 $Data = "$"; 
 fwrite($Handle, $Data);
 $Data = "DBserver='$DBserver';\n"; 
 fwrite($Handle, $Data);
 
 $Data = "//Define Database Uasername\n"; 
 fwrite($Handle, $Data); 
 $Data = "$"; 
 fwrite($Handle, $Data);
 $Data = "DBuser='$DBuser';\n"; 
 fwrite($Handle, $Data);
 
  $Data = "//Define Database Password\n"; 
 fwrite($Handle, $Data); 
 $Data = "$"; 
 fwrite($Handle, $Data);
 $Data = "DBpass='$DBpass';\n"; 
 fwrite($Handle, $Data);
 
  $Data = "//Define Database Name\n"; 
 fwrite($Handle, $Data); 
 $Data = "$"; 
 fwrite($Handle, $Data);
 $Data = "DBname='$DBname';\n"; 
 fwrite($Handle, $Data);
 
  $Data = "//Session Time\n"; 
 fwrite($Handle, $Data); 
 $Data = "$"; 
 fwrite($Handle, $Data);
 $Data = "SessTime='$SessTime';\n"; 
 fwrite($Handle, $Data);
 
  $Data = "//Encrypted Login\n"; 
 fwrite($Handle, $Data); 
 $Data = "$"; 
 fwrite($Handle, $Data);
 $Data = "EncryptLogin='$EncryptLogin';\n"; 
 fwrite($Handle, $Data);
 
  $Data = "//Sending Email Accoun\n"; 
 fwrite($Handle, $Data); 
 $Data = "$"; 
 fwrite($Handle, $Data);
 $Data = "EmailAccount='$EmailAccount';\n"; 
 fwrite($Handle, $Data);
 
  $Data = "//Sending Email Subject\n"; 
 fwrite($Handle, $Data); 
 $Data = "$"; 
 fwrite($Handle, $Data);
 $Data = "EmailSubject='$EmailSubject';\n"; 
 fwrite($Handle, $Data);
 
  $Data = "//RIPE NCC Valid maintainer\n"; 
 fwrite($Handle, $Data); 
 $Data = "$"; 
 fwrite($Handle, $Data);
 $Data = "MNT='$MNT';\n"; 
 fwrite($Handle, $Data);
 
  $Data = "//nic-hdl prefix of ocjects\n"; 
 fwrite($Handle, $Data); 
 $Data = "$"; 
 fwrite($Handle, $Data);
 $Data = "NIC='$NIC';\n"; 
 fwrite($Handle, $Data);
 
  $Data = "//Authorized email for RIPE DB\n"; 
 fwrite($Handle, $Data); 
 $Data = "$"; 
 fwrite($Handle, $Data);
 $Data = "RIPE_Email='$RIPE_Email';\n"; 
 fwrite($Handle, $Data);
 
  $Data = "//Maintainer Password\n"; 
 fwrite($Handle, $Data); 
 $Data = "$"; 
 fwrite($Handle, $Data);
 $Data = "MNT_Pass='$MNT_Pass';\n?>"; 
 $results=fwrite($Handle, $Data);
 if ($results==false)
 {
 echo "
<script type='text/javascript'>
$(document).ready(function() {
$('li.red#Ed').show().delay(2000).fadeOut(4000);
});</script>
	";
	
 }
 else
 {
 fclose($Handle); 
  echo "
<script type='text/javascript'>
$(document).ready(function() {
$('li.gren#sa').show().delay(2000).fadeOut(4000);
});
</script>
	";
	$error=0;
 }
 }
 }
}
?>
      <!--[if !IE]>start forms<![endif]-->
      <form name="setup" id="Setup" method="post" class="search_form general_form" action="step3.php">
       <!--[if !IE]>start fieldset<![endif]-->
       <fieldset>
        <!--[if !IE]>start forms<![endif]-->
        <div class="forms">
         <?php 
		 if ($error==0)
		 {
			 echo "
      <div style='color:#036; margin-top:100px; margin-right:40px; border-color:#090; border-style:dashed; padding:50px;'><a href='../login.php'>عملیات نصب با موفقیت انجام شد. لطفا برای ادامه با<br  />نام کاربری :admin<br />رمز عبور : admin<br />وارد شوید.<br></a></div>";
		 }
	  ?>
      <div style="margin-top:30px;" > </div>
   	 <input type="hidden" value="<?php echo $DBserver; ?>" name="DBserver"  />
         <input type="hidden" value="<?php echo $DBuser; ?>" name="DBuser"  />
         <input type="hidden" value="<?php echo $DBpass; ?>" name="DBpass"  />
         <input type="hidden" value="<?php echo $DBname; ?>" name="DBname"  />
         
            <?php 
		 if ($error==0)
		 {
			 echo "
			 <script language='javascript'>
			 	 document.setup.action ='../login.php';
			 </script>
			 ";
			 echo "
         <!--[if !IE]>start row<![endif]-->
         
         <div class='row'>
          <div class='inputs'> <span class='button blue_button ok_button'><span><span><span class='button_ico'><em></span>ورود به سایت</em></span></span>
           <input name='submit' type='submit' />
           </span><span id='loading_button' style='display:none;'><img src='../css/layout/load3.gif' /></span> </div>
         </div>
         
         <!--[if !IE]>end row<![endif]--> 
		 ";
		 }
		 else {
			 echo "
			 <script language='javascript'>
			 	 document.setup.action ='step2.php';
			 </script>
			 ";
			echo "
			<!--[if !IE]>start row<![endif]-->
         
         <div class='row'>
          <div class='inputs'> <span class='button blue_button cancel_button'><span><span><span class='button_ico'><em></span>بازگشت</em></span></span>
           <input name='submit' type='submit'/>
           </span><span id='loading_button' style='display:none;'><img src='../css/layout/load3.gif' /></span> </div>
         </div>
         
         <!--[if !IE]>end row<![endif]-->
			"; 
		 }
         ?>
        </div>
        
        <!--[if !IE]>end forms<![endif]-->
        
       </fieldset>
       
       <!--[if !IE]>end fieldset<![endif]-->
       
      </form>
      
      <!--[if !IE]>end forms<![endif]--> 
      
     </div>
     
     <!--[if !IE]>end section inner<![endif]--> 
     
    </div>
   </div>
   
   <!--[if !IE]>end info<![endif]--> 
   
  </div>
  
  <!--[if !IE]>end content bottom<![endif]--> 
  
 </div>
 
 <!--[if !IE]>end content<![endif]--> 
 
</div>
<!--[if !IE]>end wrapper<![endif]--> 
</body>
</html>
