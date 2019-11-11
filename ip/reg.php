<?php
$id='P12';
$lv='2';
include "../global/db.php";
$UserID=stripslashes(mysql_real_escape_string($_POST['UserID']));
$PID=stripslashes(mysql_real_escape_string($_POST['PID']));
$count=stripslashes(mysql_real_escape_string($_POST['count']));
$net=stripslashes(mysql_real_escape_string($_POST['Oct4']));
if ($_POST['Oct4']=='b')
{
	echo 'g';
	exit;	
}
$DB=new Database;
$DB->Connect();
$DB->Select('Prefix','*','PID='.$PID);
$Oct1=$DB->Select_Result[0]['Oct1'];
$Oct2=$DB->Select_Result[0]['Oct2'];
$Oct3=$DB->Select_Result[0]['Oct3'];
$DB2=new Database;
$DB2->Connect();
$DB2->Select('IP','IPID','Oct1='.$Oct1.' and Oct2='.$Oct2.' and Oct3='.$Oct3.' and Oct4='.$Oct4);
$exist=$DB2->Select_Rows;
if ($exist==0) {
$FDate=FDate();
$CIDR=substr($count,1,2);
$len=pow(2,(32-$CIDR));

$query="($Oct1,$Oct2,$Oct3,$net,$CIDR,$UserID,'$FDate')";
for($i=0;$i<$len-1;$i++)
{
	$net++;
	$query=$query." , ($Oct1,$Oct2,$Oct3,$net,$CIDR,$UserID,'$FDate')";	
	
}
$DB3=new Database;
$DB3->Connect();
$result=$DB3->Insert("IP","Oct1,Oct2,Oct3,Oct4,CIDR,UserID,Date",$query);
if ($result) {
	$IPID=$DB3->Insert_ID;
	$IPID=$IPID-$len+1;
	ALog('IP',$IPID,'Add');
	echo "1";
}
}
else echo 'a';
?> 