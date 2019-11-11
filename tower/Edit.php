<?php 
$id='P15';
$lv='2';
include "../global/db.php";
$TWID=stripslashes(mysql_real_escape_string($_POST['TWID']));
$Name=stripslashes(mysql_real_escape_string($_POST['Name']));
$Resp=stripslashes(mysql_real_escape_string($_POST['Resp']));
$Tel=stripslashes(mysql_real_escape_string($_POST['Tel']));
$Height=stripslashes(mysql_real_escape_string($_POST['Height']));
$Address=stripslashes(mysql_real_escape_string($_POST['Address']));
if (!empty($Name))
	{
		if (!empty($Tel))
		{	
			//------------Search if Name is in DB------------
			$query="select Name from Tower where Name='$Name' and TWID!=$TWID "; 
			$result=mysql_query($query);
			$array= mysql_fetch_array($result);
			if ($array['Name']!=$Name)
			{
					//------------Insert Name into DB------------------	
					$query2="update Tower set Name='$Name', Tel='$Tel', Resp='$Resp', Height='$Height', Address='$Address' where TWID=$TWID ";
					$result2=mysql_query($query2);
					//-----------------Get User ID--------------
					if ($result2){	
						ALog('Tower',$TWID,'Edit');
						echo 'z';
						}
					else {
						echo "e";	
					}			
			}
			else echo "c";//duplicate Name
		}
		else echo "b";//wrong Tel
	}
else echo "a";//empty Name		
?>