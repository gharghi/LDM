<?php
$id='P22';
$lv='1'; 
include "../global/db.php";
$TKID=stripslashes(mysql_real_escape_string($_POST['TKID']));
$query="update Ticket set Close=1 where TKID=$TKID"; 
$result=mysql_query($query);
if ($result) { 
$FDate=FDate();
echo 1;
ALog('Ticket',$TKID,'Close');
}
else echo 0;
?>