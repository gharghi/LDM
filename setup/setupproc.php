<?php
//if (file_exists('../global/config.php'))
//header('location:../login.php');
print_r($_POST);
extract($_POST);
$con=mysql_connect($DBserver,$DBuser,$DBpass);
if (!$con)
{
	echo 'a';
	exit;
}
mysql_select_db($DBname);
if (empty($SessTime)||empty($EmailAccount)||empty($EmailSubject))
{
echo 'b';
exit;	
}
 
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
echo 'c';
exit;	
}
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
 if ($results!=false)
 echo 'd';
 fclose($Handle); 
 
?>