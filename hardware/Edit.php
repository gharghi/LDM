<?php  
$id='P13';
$lv='2';
include "../global/db.php";
$HWID=stripslashes(mysql_real_escape_string($_POST['HWID']));
$Hostname=stripslashes(mysql_real_escape_string($_POST['Hostname']));
$Oct1=stripslashes(mysql_real_escape_string($_POST['Oct1']));
$Oct2=stripslashes(mysql_real_escape_string($_POST['Oct2']));
$Oct3=stripslashes(mysql_real_escape_string($_POST['Oct3']));
$Oct4=stripslashes(mysql_real_escape_string($_POST['Oct4']));
$Model=stripslashes(mysql_real_escape_string($_POST['Model']));
$Port=stripslashes(mysql_real_escape_string($_POST['Port']));
if (!empty($Port))
{
if (!empty($Model))
{
if (!empty($Hostname))
	{
	$result6=mysql_query("select IPID from IP where Oct1=$Oct1 and Oct2=$Oct2 and Oct3=$Oct3 and Oct4=$Oct4 and !(Object='Hardware' and UserID=$HWID)");
		$num=mysql_num_rows($result6);
		if (!((!empty($Oct1))&&(!empty($Oct2))&&(!empty($Oct3))&&(!empty($Oct4))&&($Oct1<224)&&($Oct2<256)&&($Oct3<256)&&($Oct4<255)&&($num==0)))
		{	
		echo 'b';
		exit;
		}
			//------------Search if Name is in DB------------
			$query="select Hostname from Hardware where Hostname='$Hostname' and HWID!=$HWID "; 
			$result=mysql_query($query); 
			$array= mysql_fetch_array($result);
			$query="select Port,VLAN,Hostname from Hardware where HWID=$HWID "; 
			$result=mysql_query($query); 
			$array2= mysql_fetch_array($result);
			$OPort=$array2['Port'];
			$OVLAN=$array2['VLAN'];
			$OHostname=$array2['Hostname'];
			if ($array['Hostname']!=$Hostname)
			{
					//------------Insert Name into DB------------------
					$MAC=stripslashes(mysql_real_escape_string($_POST['MAC'])); if ($MAC=="-----") $MAC=""; 
					$TWID=stripslashes(mysql_real_escape_string($_POST['TWID']));
					$SWID=stripslashes(mysql_real_escape_string($_POST['SWID'])); 
if ($a['P21']>=1)
{ 
					$Username=stripslashes(mysql_real_escape_string($_POST['Username'])); if ($Username=="-----") $Username="";
					$Password=stripslashes(mysql_real_escape_string($_POST['Password'])); if ($Password=="-----") $Password="";
					$Secret=stripslashes(mysql_real_escape_string($_POST['Secret'])); if ($Secret=="-----") $Secret="";
					$SNMP=stripslashes(mysql_real_escape_string($_POST['SNMP'])); if ($SNMP=="-----") $SNMP="";
}
					$VLAN=stripslashes(mysql_real_escape_string($_POST['VLAN']));
					$FDate=FDate();
					$result7=mysql_query("select * from IP where Object='Hardware' and UserID=$HWID"); 
					$array7=mysql_fetch_array($result7);
					$LOct1=$array7['Oct1'];
					$LOct2=$array7['Oct2'];
					$LOct3=$array7['Oct3'];
					$LOct4=$array7['Oct4'];
					$LDate=$array7['Date'];
					$IPID=$array7['IPID'];
					$CIDR=$array7['CIDR'];
					$result10=mysql_query("insert into DelIP (Oct1,Oct2,Oct3,Oct4,Object,UserID,CreDate,DelDate,IPID,CIDR) value ($LOct1,$LOct2,$LOct3,$LOct3,'Hardware',$HWID,'$LDate','$FDate',$IPID,$CIDR)");
					$result8=mysql_query("delete from IP where Object='Hardware' and UserID=$HWID");
					$result9=mysql_query("insert into IP (Oct1,Oct2,Oct3,Oct4,CIDR,Object,UserID,Date) value ($Oct1,$Oct2,$Oct3,$Oct4,32,'Hardware',$HWID,'$FDate')");
if ($a['P21']>=1)
{ 
$query2="update Hardware set Hostname='$Hostname', MAC='$MAC', TWID=$TWID, SWID=$SWID , Model=$Model, Username='$Username', Password='$Password', Secret='$Secret', SNMP='$SNMP', Port=$Port,VLAN=$VLAN where HWID=$HWID ";
}
else
{
					$query2="update Hardware set Hostname='$Hostname', MAC='$MAC', TWID=$TWID, SWID=$SWID , Model=$Model,  Port=$Port,VLAN=$VLAN where HWID=$HWID ";
}
					$result2=mysql_query($query2);
				
					//-----------------Get User ID--------------
					if ($result2){
						
						if ($Port!=$OPort)
						{
							
			 				$query="update Port set HWID=$HWID,VLAN=$VLAN,Describ='$Hostname',Active=1 where PortID=$Port";
							$result=mysql_query($query);
			 				$query="update Port set Describ='',HWID='',VLAN='',Active=0 where PortID=$OPort"; 
							$result=mysql_query($query);
							
						}
						
						if ($VLAN!=$OVLAN)
						{
							
			 			
			 				$query="update Port set VLAN=$VLAN where PortID=$Port";
							$result=mysql_query($query);
							
						}
						
						if ($Hostname!=$OHostname)
						{
							
			 			
			 				$query="update Port set Describ='$Hostname' where PortID=$Port";
							$result=mysql_query($query); 
							
						}
						
						ALog('Hardware',$HWID,'Edit');
						echo 'z';
						}
					else {
						echo "e";	
					}
			}
			else echo "c";//duplicate hostname
	
	}
	
else echo "a";//empty hostname		
}
else echo "f";//empty model
}
else echo "g";//empty PortCt
?>