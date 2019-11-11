<?php
$id='P11';
$lv='3';
include "../global/db.php";
$LatName=stripslashes(mysql_real_escape_string($_POST['LatName']));
$DBS= new Database;
$DBS->Connect();
$DBS->Select('User','LatName',"LatName='".$LatName."'");
$dup=$DBS->Select_Rows;
if (empty($_POST['LatName'])||$dup!=0)
{
	echo 'f';
	exit;	
}
if (!empty($_POST['Name']))
	{
		if (!empty($_POST['Cont']))
		{	
			$Name=stripslashes(mysql_real_escape_string($_POST['Name']));
			$Cont=stripslashes(mysql_real_escape_string($_POST['Cont']));
			//------------Search if Name is in DB------------
			$DBS->Select('User','Cont,Name',"Name='".$Name."' or Cont='".$Cont."'");
			if ($DBS->Select_Result[0]['Name']!=$Name)
			{
				if ($DBS->Select_Result[0]['Cont']!=$Cont)
				{
					//------------Insert Name into DB------------------
					$Name=stripslashes(mysql_real_escape_string($_POST['Name']));
					$Cont=stripslashes(mysql_real_escape_string($_POST['Cont']));
					$BW=stripslashes(mysql_real_escape_string($_POST['BW']));
					$Address=stripslashes(mysql_real_escape_string($_POST['Address']));
					$Descrip=stripslashes(mysql_real_escape_string($_POST['Descrip']));
					$Status=stripslashes(mysql_real_escape_string($_POST['Status'])); if ($Status!=1) $Status=0;
					$Resp=stripslashes(mysql_real_escape_string($_POST['Resp']));
					$Tel=stripslashes(mysql_real_escape_string($_POST['Tel']));
					$Mob=stripslashes(mysql_real_escape_string($_POST['Mob']));
					$LatName=stripslashes(mysql_real_escape_string($_POST['LatName']));
					$LatResp=stripslashes(mysql_real_escape_string($_POST['LatResp']));
					$Email=stripslashes(mysql_real_escape_string($_POST['Email']));
					$LatAddress=stripslashes(mysql_real_escape_string($_POST['LatAddress']));
					$UserID=$DBS->Insert("User","Name,Cont,BW,Address,Descrip,Status,Resp,Tel,Mob,LatName,LatResp,Email,LatAddress","( '$Name','$Cont',$BW,'$Address','$Descrip',$Status,'$Resp',$Tel,$Mob,'$LatName','$LatResp','$Email','$LatAddress' )");
					//-----------------Get User ID--------------
					if ($UserID==1){
						$UserID=$DBS->Insert_ID;
						ALog('User',$UserID,'Add');
						echo $UserID;
					}
					else {
						echo "e";	
					}
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