<?php
$id='P19';
$lv='2';
$FID='F19';
include "../global/db.php";
$PortID=stripslashes(mysql_real_escape_string($_POST['PortID']));
$query="update Port set Active=2 , Describ='پورت خراب است' where PortID=$PortID";
$result=mysql_query($query);
if ($result)
echo 33;
?>
