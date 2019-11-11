<?php
$id='P11';
$lv='1'; 
include "../global/db.php";
$Oct1=stripslashes(mysql_real_escape_string($_POST['O1']));
$Oct2=stripslashes(mysql_real_escape_string($_POST['O2']));
$Oct3=stripslashes(mysql_real_escape_string($_POST['O3']));
$Oct4=stripslashes(mysql_real_escape_string($_POST['O4']));
//--------checking ind database-------------
$query="select IPID from IP where Oct1=$Oct1 and Oct2=$Oct2 and Oct3=$Oct3 and Oct4=$Oct4"; 
$result=mysql_query($query);
$num=mysql_num_rows($result);
if ($num==0&&$Oct1<224&&$Oct2<256&&$Oct3<256&&$Oct4<255)
echo 1;
else echo 2;
?>
