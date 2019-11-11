<?php
$id='P15';
$lv='4';
include "../global/db.php";
$TWID=stripslashes(mysql_real_escape_string($_POST['TWID']));
$result=mysql_query("select SWID from Switch where TWID=$TWID");
$num=mysql_num_rows($result);
if ($num>0)
{
	echo 'b';
}
else
{
$query="delete from Tower where TWID=$TWID";
$result=mysql_query($query);
if ($result) { 
echo 'a';
ALog('Tower',$TWID,'Delete');
}
}
?>