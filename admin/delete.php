<?php
$id='P16';
$lv='5'; 
include "../global/db.php";
$NAID=$_POST['AID'];
if ($NAID==$AID) echo 2;
else {
$query = "delete from Admin where AID=$NAID"; 
$result=mysql_query($query);
if ($result){
	Alog('Admin',$NAID,'Delete');
	 echo 1;
} 
else echo 0;
}
?>