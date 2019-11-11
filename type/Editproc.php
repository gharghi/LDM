<?php
$id='P20';
$lv='2';
include "../global/db.php";
$TID=stripslashes(mysql_real_escape_string($_POST['TID']));
$Brand=stripslashes(mysql_real_escape_string($_POST['Brand']));
$Model=stripslashes(mysql_real_escape_string($_POST['Model']));
$Type=stripslashes(mysql_real_escape_string($_POST['Type']));
if (!empty($Type))
	{
		if (!empty($Brand))
		{	
			
			if (!empty($Model))
			{
					
						$query1="update  Type set Model='$Model', Brand='$Brand',Type='$Type' where TID=$TID";
						$result=mysql_query($query1);
						
						if ($result){
							ALog('Type',$TID,'Edit');
						}
						else {
							echo "e";	
						}
					
	
			}
			else  echo "c";//empty Model
		}
		else echo "b";//empty Brand
	}
	
else
{
	echo "a";//empty Type		
}
?>