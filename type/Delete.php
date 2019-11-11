<?php
$id='P20';
$lv='2';
include "../global/db.php";
$TID=stripslashes(mysql_real_escape_string($_POST['TID']));
$query="delete from Type where TID=$TID";
$result=mysql_query($query);
if ($result) { 
echo 1;
ALog('Type',$TID,'Delete');
}
else echo 0;
?>