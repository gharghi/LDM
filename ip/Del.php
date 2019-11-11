<?php
$id='P12';
$lv='3';
include "../global/db.php";
$IPID=stripslashes(mysql_real_escape_string($_POST['IPID']));
$array=mysql_fetch_array(mysql_query("select * from IP where IPID=$IPID"));
extract($array);
$CreDate=$Date;
if ($array['NICHDL']!='0')
{
	echo 'k';
	exit;
}
$FDate=FDate();
$num=pow(2,(32-$CIDR));
$query1="insert into DelIP (IPID,UserID,Oct1,Oct2,Oct3,Oct4,CIDR,CreDate,DelDate) value ($IPID,$UserID,$Oct1,$Oct2,$Oct3,$Oct4,$CIDR,'$CreDate','$FDate')";
$query2="delete from IP where IPID in ($IPID";
for ($i=0;$i<$num-1;$i++)
{
	$IPID++;	
	$Oct4++;
$query1=$query1." , ($IPID,$UserID,$Oct1,$Oct2,$Oct3,$Oct4,$CIDR,'$CreDate','$FDate')";
$query2=$query2." , $IPID";
}
$query2=$query2.")";
$result1=mysql_query($query1);
	if ($result1) {
		$result2=mysql_query($query2);
	}
if ($result2) echo 1;
else echo 2;
?>