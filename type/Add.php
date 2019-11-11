<?php
$id='P20';
$lv='2';
$FID='F20';
include "../global/db.php";
extract($_POST);
$Type=stripslashes(mysql_real_escape_string($Type));
$Brand=stripslashes(mysql_real_escape_string($Brand));
$Model=stripslashes(mysql_real_escape_string($Model));
if (!empty($Type))
{
	if (!empty($Brand))
	{
		if (!empty($Model))
		{
		$query="insert into Type (Type,Brand,Model) value ('$Type','$Brand','$Model')";
		$result=mysql_query($query);
		if($result) {
			 $TID=mysql_insert_id();
			ALog('Type',$TID,'Add');
			echo 'z';	 
		}
		}
		else echo 'c';//Empty Model
	}
	else echo 'b';//Empty Brand
}
else echo 'a';//Empty Type
