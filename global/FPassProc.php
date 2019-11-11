<?php
require "../global/config.php";
require "../global/functions.php";
//-----------Connecting to Database--------
$con=mysql_connect($DBserver,$DBuser,$DBpass);
if (!$con)
	die('Could not Connect to Database');
mysql_select_db($DBname);
session_start();
$User=stripslashes(mysql_real_escape_string($_POST['User']));
$Key=stripslashes(mysql_real_escape_string($_POST['Key']));
$Pass=stripslashes(mysql_real_escape_string($_POST['Pass']));
$Conf=stripslashes(mysql_real_escape_string($_POST['Conf']));
if (empty($User))
{
	echo 'f';
	exit;	
}
$len=strlen($Pass);
if (is_numeric($Pass)) $int=1; else $int=0;
if (empty($Pass)||$int==1||$len<7||$Pass!=$Conf)
   {
	  echo 'e';
	  exit;
   }
					
if ($Key==$_SESSION['Key3'])
{
	$result=mysql_query("update Admin set Password='$Pass' where AID=$User");
	if ($result)
	echo 'k';	
}
else echo 'f';
?>