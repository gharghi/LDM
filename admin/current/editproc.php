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
if (!empty($_POST['Name']))
	{
			$PName=stripslashes(mysql_real_escape_string($_POST['Name']));
			$query3="select Name from Admin where AID=$AID"; 
			$result3=mysql_query($query3); 
			$array3= mysql_fetch_array($result3);
			$DName=$array3['Name'];
			//------------Search if Name is in DB------------
				if ($PName!=$DName){ 
					$query="select Name from Admin where Name='$PName' ";
					$result=mysql_query($query); 
					$num=mysql_num_rows($result); 
					if ($num==0){
						$NQ="Name='$PName',";
					}
					else die('b');//there is such name in DB
				}
				else $NQ=" ";
				$Mob=stripslashes(mysql_real_escape_string($_POST['Mob'])); if (empty($Mob)) $Mob=0;
				$Email=stripslashes(mysql_real_escape_string($_POST['Email']));
				$query1="update Admin set $NQ  Email='$Email',Mob='$Mob' where AID=$AID";
				$result=mysql_query($query1);
				//-----------------Get User ID--------------
				if ($result){
				ALog('Admin',$AID,'Edit');//	ALog('Admin',$AID,'Edit');
						echo 1;
						}
						else {	
						echo "c";					
				}
		}
else
{
	echo "a";		
}
?>