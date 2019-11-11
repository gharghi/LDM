<?php
function __autoload($class_name)
    {
        include_once '../inc/class.' . $class_name . '.inc.php';
    }
require "../global/config.php";
require "../global/functions.php";
require "../lang/".$lang.".php";
//-----------Connecting to Database--------
$DBS= new Database;
$DBS->Connect();
$User=$DBS->Escape($_POST['User']);
$Key=$DBS->Escape($_POST['Key']);
$Pass=$DBS->Escape($_POST['Pass']);
$Conf=$DBS->Escape($_POST['Conf']);
session_start();
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
	$Update['Password']=$Pass;
	$result=$DBS->Update('Admin',$Update,'AID='.$User);
	if ($result)
	echo 'k';	
}
else echo 'f';
?>