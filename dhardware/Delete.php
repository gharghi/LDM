<?php
$id='P13';
$lv='4'; 
include "../global/db.php";
$HWID=stripslashes(mysql_real_escape_string($_POST['HWID']));
$array=mysql_fetch_array(mysql_query("select * from Hardware where HWID=$HWID"));
extract($array);
$query="delete from Hardware where HWID=$HWID"; 
$result=mysql_query($query);
if ($result) { 
$FDate=FDate();
$result7=mysql_query("select * from IP where Object='Hardware' and UserID=$HWID"); 
$array7=mysql_fetch_array($result7);
$LOct1=$array7['Oct1'];
$LOct2=$array7['Oct2'];
$LOct3=$array7['Oct3'];
$LOct4=$array7['Oct4'];
$LDate=$array7['Date'];
$IPID=$array7['IPID'];
$CIDR=$array7['CIDR'];
$result10=mysql_query("insert into DelIP (Oct1,Oct2,Oct3,Oct4,Object,UserID,CreDate,DelDate,IPID,CIDR) value ($LOct1,$LOct2,$LOct3,$LOct3,'Hardware',$HWID,'$LDate','$FDate',$IPID,$CIDR)");
$result8=mysql_query("delete from IP where Object='Hardware' and UserID=$HWID");
$query="update Port set Describ='',HWID='',VLAN='',Active=0 where PortID=$Port"; 
$result=mysql_query($query);
echo 1;
ALog('Hardware',$HWID,'Delete');
}
else echo 0;
?>