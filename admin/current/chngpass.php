<?php
$id='P16';
$lv='0';
require "../../global/config.php";
require "../../global/functions.php";
//-----------Connecting to Database--------
$con=mysql_connect($DBserver,$DBuser,$DBpass);
if (!$con)
	die('Could not Connect to Database');
mysql_select_db($DBname);
session_start();
if (isset($_COOKIE['Login'])){
//------------------------------------
$result3=mysql_query("select * from Admin where AUsername='".$_COOKIE['Username']."'");
$array3=mysql_fetch_array($result3);
if ($_COOKIE['Login']==$array3['Cookie'])
{ 
if (!isset($_SESSION['UserName']))
	if (!isset($_SESSION['UserName']))
	{
		session_start();
	}
		 $Username=$_SESSION['UserName']=$array3['AUsername']; 
		 $AID=$_SESSION['AID']=$array3['AID'];
		 $Prm=$_SESSION['Prm']=$array3['Prm'];
		 $AName=$_SESSION['AName']=$array3['AName'];
		
}
else {
	echo "<script language='javascript'>RunOut();</script>"; 
		exit;
}
}
else if (isset($_SESSION['UserName'])&&(($_SESSION['logintime']+$SessTime)>time()))
	{ 
		 $Username=$_SESSION['UserName']; 
		 $_SESSION['logintime']=time();
		 $AID=$_SESSION['AID'];
		 $Prm=$_SESSION['Prm'];
		 $AName=$_SESSION['AName'];
	}
else {
	echo "<script language='javascript'>RunOut();</script>"; 
		exit;
}
//-----Checking Permission-------------
$len=strlen($Prm);
$a= array();
$start1=0;
$end1=3;
$start2=4;
$end2=1;
while ($len>=0)
{
$b=substr($Prm,$start1,$end1);
$a[$b]=substr($Prm,$start2,$end2);
$start1=$start1+6;
$start2=$start2+6;
$len--;
}
if ($a[$id]<$lv)
{
	echo "<script language='javascript'> AlertPrm(); </script>";
	exit;
} 
$old=stripslashes(mysql_real_escape_string($_POST['old']));
$Password=stripslashes(mysql_real_escape_string($_POST['Password']));
$Confirm=stripslashes(mysql_real_escape_string($_POST['conf']));
$query="select Password from Admin where AID='$AID'";
$result=mysql_query($query);
$array=mysql_fetch_array($result);
$dbPass=$array['Password'];
if ($dbPass==$old)
{
	$len=strlen($Password);
	if (is_numeric($Password)) $int=1; else $int=0; 
	if ((!empty($Password))&&($int==0)&&($len>6)&&($Password==$Confirm))
					{
						$query="update Admin set Password='$Password' where AID=$AID;";
						$result=mysql_query($query);
						if($result) { 
						ALog('Admin',$AID,'Password');
						echo 1;
						}
					}
					else echo 'b';
}
else echo 'a';
?>