<?php
$id='P14';
$lv='3';
include "../global/db.php";
extract($_POST);
$Hostname=stripslashes(mysql_real_escape_string($Hostname));
$Oct1=stripslashes(mysql_real_escape_string($Oct1)); 
$Oct2=stripslashes(mysql_real_escape_string($Oct2)); 
$Oct3=stripslashes(mysql_real_escape_string($Oct3));
$Oct4=stripslashes(mysql_real_escape_string($Oct4));
$TWID=stripslashes(mysql_real_escape_string($TWID));
$Model=stripslashes(mysql_real_escape_string($Model));
$User=stripslashes(mysql_real_escape_string($User));
$Pass=stripslashes(mysql_real_escape_string($Pass));
$SNMP=stripslashes(mysql_real_escape_string($SNMP));
$Secret=stripslashes(mysql_real_escape_string($Secret));
$PortCt=stripslashes(mysql_real_escape_string($PortCt));
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
		$array=mysql_fetch_array(mysql_query("select Hostname from Switch where Hostname='$Hostname'  and SWID!=$SWID" ));
		if ($array['Hostname']!=$Hostname) 
		{
			
			
		$query="insert into Switch (Hostname,TWID,User,Pass,Secret,SNMP,PortCt,Model,MAC) value ('$Hostname','$TWID','$User','$Pass','$Secret','$SNMP',$PortCt,'$Model','$MAC')";
		$result=mysql_query($query);
		if($result) {
			 $SWID=mysql_insert_id();
			 	for ($k=1;$k<=$PortCt;$k++) {
			 		$query="insert into Port (SWID,PNum) value ($SWID,$k)";
					$result=mysql_query($query);
				}
		$FDate=FDate();
		$result=mysql_query("insert into IP (Oct1,Oct2,Oct3,Oct4,CIDR,Object,UserID,Date) value ($Oct1,$Oct2,$Oct3,$Oct4,32,'Switch',$SWID,'$FDate')");
			ALog('Switch',$SWID,'Add');
			echo 'z';	 
		}
		
		}
		else echo 'c';//check db for name
}
else echo 'a';//Empty Name
