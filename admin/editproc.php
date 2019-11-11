<?php
$id='P16';
$lv='2';
include "../global/db.php";
$NAID=stripslashes(mysql_real_escape_string($_POST['AID']));
if (!empty($_POST['Name']))
	{
		if (!empty($_POST['AUsername']))
		{	
			$PName=stripslashes(mysql_real_escape_string($_POST['Name']));
			$PUsername=stripslashes(mysql_real_escape_string($_POST['AUsername']));
			$query3="select AUsername,Name from Admin where AID=$NAID"; 
			$result3=mysql_query($query3); 
			$array3= mysql_fetch_array($result3);
			$DName=$array3['Name'];
			$DUsername=$array3['AUsername'];
			//------------Search if Name is in DB------------
			$query="select AUsername,Name from Admin where Name='$Name' or AUsername='$AUsername' "; 
			$result=mysql_query($query); 
			$array= mysql_fetch_array($result);
			if ($array['Name']!=$PName)
			{
				if ($array['AUsername']!=$PUsername)
				{
						//------------Insert Name into DB------------------
						if ($PName==$DName) $NQ=" ";
						else {
						$NName=stripslashes(mysql_real_escape_string($_POST['Name']));
						$NQ="Name='$NName',";
						}
						if ($PUsername==$DUsername) $UQ=" ";
						else {
						$NAUsername=stripslashes(mysql_real_escape_string($_POST['AUsername']));
						$UQ="AUsername='$NAUsername',";
						}
						$Mob=stripslashes(mysql_real_escape_string($_POST['Mob'])); if (empty($Mob)) $Mob=0;
						$Email=stripslashes(mysql_real_escape_string($_POST['Email']));
						$Lok=stripslashes(mysql_real_escape_string($_POST['Lok']));
						if (empty($Lok)||$Lok!=1) $Lok=0;
						$query1="update  Admin set $NQ $UQ Lok=$Lok, Email='$Email',Mob=$Mob where AID=$NAID";
						$result=mysql_query($query1); echo $query1;
						//-----------------Get User ID--------------
						if ($result){
							ALog('Admin',$NAID,'Edit');
							echo 1;
						}
						else {
							echo "e";	
						}
					}
				else if ($PUsername!=$DUsername) echo "d";
			}
			else if ($PName!=$DName) echo "c";
		}
		else echo "b";
	}
	
else
{
	echo "a";		
}
?>