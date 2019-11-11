<?php 
$id='P11';
$lv='2';
include "../global/db.php";
$UserID=stripslashes(mysql_real_escape_string($_POST['UserID']));
$Name=stripslashes(mysql_real_escape_string($_POST['Name']));
$LatName=stripslashes(mysql_real_escape_string($_POST['LatName']));
$Cont=stripslashes(mysql_real_escape_string($_POST['Cont']));
if (!empty($Name))
	{
		if (!empty($Cont))
		{	
			//------------Search if Name is in DB------------
			$DB=new Database;
			$DB->Connect();
			$DB->Select('User','Cont,Name',"(Name='".$Name."' or Cont='".$Cont."' or LatName='".$LatName."') and UserID!=".$UserID);
			if ($DB->Select_Result[0]['Name']!=$Name)
			{
				if ($DB->Select_Result[0]['Cont']!=$Cont)
				{
					if ($DB->Select_Result[0]['LatName']!=$LatName)
				{
					$DB->Disconnect();
					//------------Insert Name into DB------------------
					$Address=trim($_POST['Address']);
					$LatAddress=trim($_POST['LatAddress']);
					$Descrip=trim($_POST['Descrip']);
					$Tel=stripslashes(mysql_real_escape_string($_POST['Tel'])); if ($Tel=="-----") $Tel="''"; 
					$Mob=stripslashes(mysql_real_escape_string($_POST['Mob'])); if ($Mob=="-----") $Mob="''";
					$Resp=stripslashes(mysql_real_escape_string($_POST['Resp'])); if ($Resp=="-----") $Resp="";
					$BW=stripslashes(mysql_real_escape_string($_POST['BW'])); if ($BW=="-----") $BW=0;
					$Status=stripslashes(mysql_real_escape_string($_POST['Status']));
					$Address=stripslashes(mysql_real_escape_string($Address)); if ($Address=="-----") $Address="";
					$LatAddress=stripslashes(mysql_real_escape_string($LatAddress)); if ($LatAddress=="-----") $LatAddress="";
					$Descrip=stripslashes(mysql_real_escape_string($Descrip));   if ($Descrip=="-----") $Descrip="";
					$LatResp=stripslashes(mysql_real_escape_string($_POST['LatResp'])); if ($LatResp=="-----") $LatResp="";
					$Email=stripslashes(mysql_real_escape_string($_POST['Email'])); if ($Email=="-----") $Email="";
					$DB=new Database;
					$DB->Connect();
					$update['Name']=$Name;
					$update['Cont']=$Cont;
					$update['Tel']=$Tel;
					$update['Mob']=$Mob;
					$update['BW']=$BW;
					$update['Status']=$Status;
					$update['Address']=$Address;
					$update['Descrip']=$Descrip;
					$update['LatName']=$LatName;
					$update['LatAddress']=$LatAddress;
					$update['LatResp']=$LatResp;
					$update['Email']=$Email;
					$result2=$DB->Update('User',$update,'UserID='.$UserID);
					//-----------------Get User ID--------------
					if ($result2){
			$DB2=new Database;	
			$DB2->Connect();	
			$DB2->Select('User','*','UserID='.$UserID);	

if ($DB2->Select_Result[0]['NICHDL']!='0')
{
if (!empty($DB2->Select_Result[0]['LatResp'])&&!empty($DB2->Select_Result[0]['LatAddress'])&&!empty($DB2->Select_Result[0]['Email']))
{
$Source=$RIPE_Email." ".date(Ymd);
$string="DATA=
person: ".$DB2->Select_Result[0]['LatResp']."
address: ".$DB2->Select_Result[0]['LatAddress']."
phone: %2B98".$DB2->Select_Result[0]['Mob']."
e-mail: ".$DB2->Select_Result[0]['Email']."
mnt-by: ".$MNT."
password: ".$MNT_Pass."
nic-hdl: ".$DB2->Select_Result[0]['NICHDL']."
abuse-mailbox: ".$DB2->Select_Result[0]['Email']."
changed: ".$Source."
source: RIPE";
$c = curl_init();
curl_setopt($c, CURLOPT_URL, 'http://syncupdates.db.ripe.net');
curl_setopt($c, CURLOPT_POST, true);
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
curl_setopt($c, CURLOPT_POSTFIELDS,$string);
$resul=curl_exec ($c);
curl_close($c);
$num=strripos($resul,'Number of objects processed successfully:');
$success=substr($resul,$num+43,1);
$num=strripos($resul,'Number of objects processed with errors:');
$failure=substr($resul,$num+42,2); 
if ($success=='1')
{
	$DB3=new Database;
	$DB3->Connect();
	$update2['Source']=$Source;
	$DB3->Update('User',$update2,'UserID='.$UserID);
	ALog('RIPE',$DB2->Select_Result[0]['NICHDL'],'PersonEdit'); 
}
	if ($failure=='1')
{
	echo 'j';
}
				
}
}
						
						ALog('User',$UserID,'Edit');
						echo 'z';
						}
					else {
						echo "e";	
					}
				}
				else echo 'f';
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