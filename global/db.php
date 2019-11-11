<?php
error_reporting(7);
function __autoload($class_name)
    {
        include_once '../inc/class.' . $class_name . '.inc.php';
    }
require "../global/config.php";
require "../global/functions.php";
require "../lang/".$lang.".php";
//-----------Making Sessions---------------
session_save_path('../tmp');
session_start();
if (isset($_COOKIE['Login'])){
//------------------------------------
	$DB= new Database;
	$DB->Connect();
	$DB->Select('Admin','*',"AUsername='".$_COOKIE['Username']."'"); 
	if ($_COOKIE['Login']==$DB->Select_Result[0] ['Cookie'])
{ 
	if (!isset($_SESSION['UserName']))
	{
		session_save_path('../tmp');
		session_start();
	}
		$Username=$_SESSION['UserName']=$DB->Select_Result[0] ['AUsername'];
		$AID=$_SESSION['AID']=$DB->Select_Result[0] ['AID'];
		$Prm=$_SESSION['Prm']=$DB->Select_Result[0] ['Prm']; 
		$AName=$_SESSION['AName']=$DB->Select_Result[0] ['Name'];
		$DB->disconnect();
}
else {
	echo "<script language='javascript'>RunOut();</script>"; 
		header("location:../logout.php"); 
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
		header("location:../logout.php"); 
	exit;
}
?>