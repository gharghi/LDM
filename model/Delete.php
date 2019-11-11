<?php
$id='P18';
$lv='2';
$FID='F18';
include "../global/db.php";
$PID=stripslashes(mysql_real_escape_string($_POST['PID']));
$query="delete from Prefix where PID=$PID";
$result=mysql_query($query);
if ($result) { 
echo 1;
ALog('Prefix',$PID,'Delete');
}
else echo 0;
?>