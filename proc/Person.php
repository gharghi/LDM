<?php
$id='P11';
$lv='5';
include "../global/db.php";
$UserID=stripslashes(mysql_real_escape_string($_POST['UserID']));
$result=mysql_query("select * from User where UserID=$UserID");
$array=mysql_fetch_array($result);
if ($array['NICHDL']!='0')
{
	echo 'b';
	exit;
}
if (!empty($array['LatResp'])&&!empty($array['LatAddress'])&&!empty($array['Email']))
{
$Source=$RIPE_Email." ".date(Ymd);
$string="NEW=YES&DATA=
person: ".$array['LatResp']."
address: ".$array['LatAddress']."
phone: %2B98".$array['Mob']."
e-mail: ".$array['Email']."
mnt-by: ".$MNT."
password: ".$MNT_Pass."
nic-hdl: AUTO-5".$NIC."
abuse-mailbox: ".$array['Email']."
changed: ".$Source."
source: RIPE";
$c = curl_init();
curl_setopt($c, CURLOPT_URL, 'http://syncupdates.db.ripe.net');
curl_setopt($c, CURLOPT_POST, true);
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
curl_setopt($c, CURLOPT_POSTFIELDS,$string);
$resul=curl_exec ($c);
curl_close($c);
$num=strripos($resul,'Number of objects processed successfully:');
$success=substr($resul,$num+43,1);
$num=strripos($resul,'Number of objects processed with errors:');
$failure=substr($resul,$num+42,2); 
$num=strripos($resul,'Create SUCCEEDED: [person]');
$NICHDL=substr($resul,$num+27,12);
if ($failure=='1')
{
	echo 'a';
	exit;
}
if ($success=='1')
{
	$result=mysql_query("update User set NICHDL='$NICHDL' , Source='$Source' where UserID=$UserID");
	ALog('RIPE',$NICHDL,'PersonAdd');
	echo 'z';
}
}
else echo 'e';
?>