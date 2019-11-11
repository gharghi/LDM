<?php
$id='P14';
$lv='4';
include "../global/db.php";
$SWID=stripslashes(mysql_real_escape_string($_POST['SWID']));
$result=mysql_query("select PortID from Port where SWID=$SWID and Active=1");
$num=mysql_num_rows($result);
if ($num>0){
	echo 'b';	
}
else {
	$result1=mysql_query("delete from Port where SWID=$SWID");
$FDate=FDate();
$result7=mysql_query("select * from IP where Object='Switch' and UserID=$SWID"); 
$array7=mysql_fetch_array($result7);
$LOct1=$array7['Oct1'];
$LOct2=$array7['Oct2'];
$LOct3=$array7['Oct3'];
$LOct4=$array7['Oct4'];
$LDate=$array7['Date'];
$IPID=$array7['IPID'];
$CIDR=$array7['CIDR'];
$result10=mysql_query("insert into DelIP (Oct1,Oct2,Oct3,Oct4,Object,UserID,CreDate,DelDate,IPID,CIDR) value ($LOct1,$LOct2,$LOct3,$LOct3,'Switch',$SWID,'$LDate','$FDate',$IPID,$CIDR)");
$result8=mysql_query("delete from IP where Object='Switch' and UserID=$SWID");
$query="delete from Switch where SWID=$SWID";
$result=mysql_query($query);
if ($result) { 
echo 'a';
ALog('Switch',$SWID,'Delete');
}
}
?>