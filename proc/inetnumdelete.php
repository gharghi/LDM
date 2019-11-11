<?php
$id='P11';
$lv='5';
include "../global/db.php";
$IPID=stripslashes(mysql_real_escape_string($_POST['IPID']));
$result=mysql_query("select * from IP where IPID=$IPID");
$array=mysql_fetch_array($result);
$IP=$array['Oct1'].'.'.$array['Oct2'].'.'.$array['Oct3'].'.'.$array['Oct4'].'/'.$array['CIDR'];
$UserID=$array['UserID'];
$result2=mysql_query("select * from User where UserID=$UserID");
$array2=mysql_fetch_array($result2);
$LatName=$array2['LatName'];
$L1=str_replace(' ','-',$LatName);
$netname=substr($L1,0,10);
if ($array2['NICHDL']!='0')
{
$string="DATA=
inetnum: ".$IP."
netname: ".$netname."
descr: ".$LatName."
country: IR
delete: End_of_Usage
admin-c: ".$array2['NICHDL']."
tech-c: ".$array2['NICHDL']."
status: ASSIGNED PA
mnt-by: ".$MNT."
mnt-domains: ".$MNT."
password: ".$MNT_Pass."
changed: ".$array['Source']."
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
if ($failure=='1')
{
	echo 'a';
	exit;
}
if ($success=='1')
{
	$result=mysql_query("update IP set netname='0',NICHDL='0',Source='0' where IPID=$IPID");
	ALog('RIPE',$NICHDL,'DeleteIP');
	echo 'z';
}
}
else echo 'e';
?>