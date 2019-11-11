<?php
$id='P15';
$lv='3';
include "../global/db.php";
extract($_POST);
$Name=stripslashes(mysql_real_escape_string($Name));
$Resp=stripslashes(mysql_real_escape_string($Resp)); if (empty($Resp)) $Resp="---";
$Address=stripslashes(mysql_real_escape_string($Address)); if (empty($Address)) $Address="---";
$Tel=stripslashes(mysql_real_escape_string($Tel));
$Height=stripslashes(mysql_real_escape_string($Height)); if (empty($Height)) $Height=0;
if (!empty($Name))
{
	if (!empty($Tel))
	{
		$num=0;
		$num=mysql_num_rows(mysql_query("select Name from Tower where Name='$Name'"));
		if ($num==0) {
		$query="insert into Tower (Name,Resp,Address,Tel,Height) value ('$Name','$Resp','$Address','$Tel',$Height)";
		$result=mysql_query($query);
		if($result) {
			 $TWID=mysql_insert_id();
			ALog('Tower',$TWID,'Add');
			echo 'z';	 
		}
		}
		else echo 'c';//check db for name
	}
	else echo 'b';//Empty Tel
}
else echo 'a';//Empty Name
