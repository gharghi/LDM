<?php
$id='P13'; 
$lv='3';
include "../global/db.php";
extract($_POST);
$Oct1=stripslashes(mysql_real_escape_string($Oct1)); 
$Oct2=stripslashes(mysql_real_escape_string($Oct2)); 
$Oct3=stripslashes(mysql_real_escape_string($Oct3));
$Oct4=stripslashes(mysql_real_escape_string($Oct4));
$Hostname=stripslashes(mysql_real_escape_string($Hostname));
$TWID=stripslashes(mysql_real_escape_string($TWID));
$SWID=stripslashes(mysql_real_escape_string($SWID));
$MAC=stripslashes(mysql_real_escape_string($MAC));
$Model=stripslashes(mysql_real_escape_string($Model));
$User=stripslashes(mysql_real_escape_string($User));
$Pass=stripslashes(mysql_real_escape_string($Pass));
$SNMP=stripslashes(mysql_real_escape_string($SNMP));
$Secret=stripslashes(mysql_real_escape_string($Secret));
$Port=stripslashes(mysql_real_escape_string($Port));
$VLAN=stripslashes(mysql_real_escape_string($VLAN));
if (empty($Oct1)||empty($Oct2)||empty($Oct3)||empty($Oct4))
{
	echo 'i';
	exit;	
}
$Oct1=(int)$Oct1;
$Oct2=(int)$Oct2;
$Oct3=(int)$Oct3;
$Oct4=(int)$Oct4;
$result=mysql_query("select IPID from IP where Oct1=$Oct1 and Oct2=$Oct2 and Oct3=$Oct3 and Oct4=$Oct4");
$num=mysql_num_rows($result);
if ($num!=0)
{
	echo 'j';
	exit;
}
if (!empty($Hostname))
{
	if (!empty($Model))
{
	
	if (!empty($SWID))
{
	
		$array=mysql_fetch_array(mysql_query("select Hostname from Hardware where Hostname='$Hostname' "));
		if ($array['Hostname']!=$Hostname) {
			
		$query="insert into Hardware (Hostname,TWID,SWID,Username,Password,Secret,SNMP,Port,Model,MAC,VLAN,UserID) value ('$Hostname',$TWID,$SWID,'$User','$Pass','$Secret','$SNMP',$Port,'$Model','$MAC','$VLAN',$UserID)";
		$result=mysql_query($query);
		if($result) {
			 $HWID=mysql_insert_id();
			$query="update Port set HWID=$HWID,Describ='$Hostname',VLAN=$VLAN,Active=1 where PortID=$Port";
			$result=mysql_query($query); 
		$FDate=FDate();
		$result=mysql_query("insert into IP (Oct1,Oct2,Oct3,Oct4,CIDR,Object,UserID,Date) value ($Oct1,$Oct2,$Oct3,$Oct4,32,'Hardware',$HWID,'$FDate')");
			
			ALog('Hardware',$HWID,'Add');
			echo 'z';	 
		}
		}
		else echo 'c';//check db for name
	}
else echo 'e';//Empty Switch
}
else echo 'f';//Empty Model
}
else echo 'a';//Empty Name
