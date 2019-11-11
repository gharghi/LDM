<?php
$id='P18';
$lv='2';
$FID='F18';
include "../global/db.php";
extract($_POST);
$PID=stripslashes(mysql_real_escape_string($_POST['PID']));
if (!isset($S26)) $S26=0; 
if (!isset($S27)) $S27=0; 
if (!isset($S28)) $S28=0; 
if (!isset($S29)) $S29=0; 
if (!isset($S30)) $S30=0; 
if (!isset($S32)) $S32=0; 
if (!isset($S25)) $S25=0; 
if (!isset($S24)) $S24=0; 
$query="update Prefix set S24=$S24,S25=$S25,S26=$S26,S27=$S27,S28=$S28,S29=$S29,S30=$S30,S32=$S32 where PID=$PID";
$result=mysql_query($query);
if ($result) { 
echo 1;
ALog('Prefix',$PID,'Edit');
}
else echo 0;
?>