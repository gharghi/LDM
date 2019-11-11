<?php 
$id='P16';
$lv='3';
include "../global/db.php";
if (!empty($_POST['Name']))
	{
		if (!empty($_POST['AUsername']))
		{	
			$Name=$_POST['Name'];
			$Cont=$_POST['AUsername'];
			//------------Search if Name is in DB------------
			$query="select AUsername,Name from Admin where Name='$Name' or AUsername='$AUsername' "; 
			$result=mysql_query($query); 
			$array= mysql_fetch_array($result);
			if ($array['Name']!=$Name)
			{
				if ($array['AUsername']!=$Cont)
				{
					$len=strlen($_POST['Password']);
					if (is_numeric($_POST['Password'])) $int=1; else $int=0;
					if (!empty($_POST['Password'])&&$int==0&&$len>6&&$_POST['Password']==$_POST['conf'])
					{
						//------------Insert Name into DB------------------
						$Name=stripslashes(mysql_real_escape_string($_POST['Name']));
						$AUsername=stripslashes(mysql_real_escape_string($_POST['AUsername']));
						$Password=stripslashes(mysql_real_escape_string($_POST['Password']));
						$conf=stripslashes(mysql_real_escape_string($_POST['conf']));
						$Mob=stripslashes(mysql_real_escape_string($_POST['Mob'])); if (empty($Mob)) $Mob=0;
						$Email=stripslashes(mysql_real_escape_string($_POST['Email']));
						$Lok=stripslashes(mysql_real_escape_string($_POST['Lok']));
						if (empty($Lok)||$Lok!=1) $Lok=0;
						$query1="insert into Admin ( Name,AUsername,Password,Lok,Email,Mob ) value ( '$Name','$AUsername','$Password',$Lok,'$Email',$Mob )";
						$result=mysql_query($query1);
						//-----------------Get User ID--------------
						if ($result){
							$NAID=mysql_insert_id();
							ALog('Admin',$NAID,'Add');
							echo $NAID;
						}
						else {
							echo "e";	
						}
					}
					else echo "f";
				}
				else echo "d";
			}
			else echo "c";
		}
		else echo "b";
	}
	
else
{
	echo "a";		
}
?>