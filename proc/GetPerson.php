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
$string="http://apps.db.ripe.net/whois/lookup/ripe/person/SHN33.xml";
$c = curl_init();
curl_setopt($c, CURLOPT_URL, $string);
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
$resul=curl_exec ($c);
curl_close($c);
$num=strripos($resul,'person');
$success=substr($resul,$num+16,30);echo $success;
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
?>