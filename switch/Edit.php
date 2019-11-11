<?php 
$id='P14';
$lv='2';
include "../global/db.php";
$SWID=stripslashes(mysql_real_escape_string($_POST['SWID']));
$Hostname=stripslashes(mysql_real_escape_string($_POST['Hostname']));
$Oct1=stripslashes(mysql_real_escape_string($_POST['Oct1']));
$Oct2=stripslashes(mysql_real_escape_string($_POST['Oct2']));
$Oct3=stripslashes(mysql_real_escape_string($_POST['Oct3']));
$Oct4=stripslashes(mysql_real_escape_string($_POST['Oct4']));
$Model=stripslashes(mysql_real_escape_string($_POST['Model']));
$PortCt=stripslashes(mysql_real_escape_string($_POST['PortCt']));
if (!empty($PortCt))
{
if (!empty($Model))
{
if (!empty($Hostname))
	{
		$result6=mysql_query("select IPID from IP where Oct1=$Oct1 and Oct2=$Oct2 and Oct3=$Oct3 and Oct4=$Oct4 and !(Object='Switch' and UserID=$SWID)");
		$num=mysql_num_rows($result6);
		if ((!empty($Oct1))&&(!empty($Oct2))&&(!empty($Oct3))&&(!empty($Oct4))&&($Oct1<224)&&($Oct2<256)&&($Oct3<256)&&($Oct4<255)&&($num==0))
		{	
			//------------Search if Name is in DB------------
			$query="select Hostname from Switch where Hostname='$Hostname' and SWID!=$SWID "; 
			$result=mysql_query($query);
			$array= mysql_fetch_array($result);
			$query="select PortCt from Switch where SWID=$SWID "; 
			$result=mysql_query($query); 
			$array2= mysql_fetch_array($result);
			$OPortCt=$array2['PortCt'];
			if ($array['Hostname']!=$Hostname)
			{
				
					//------------Insert Name into DB------------------
					$MAC=stripslashes(mysql_real_escape_string($_POST['MAC'])); if ($MAC=="-----") $MAC=""; 
					$TWID=stripslashes(mysql_real_escape_string($_POST['TWID'])); 
if ($a['P21']>=1)
{ 
					$User=stripslashes(mysql_real_escape_string($_POST['User'])); if ($User=="-----") $User="";
					$Pass=stripslashes(mysql_real_escape_string($_POST['Pass'])); if ($Pass=="-----") $Pass="";
					$Secret=stripslashes(mysql_real_escape_string($_POST['Secret'])); if ($Secret=="-----") $Secret="";
					$SNMP=stripslashes(mysql_real_escape_string($_POST['SNMP'])); if ($SNMP=="-----") $SNMP="";
}
					$FDate=FDate();
					$result7=mysql_query("select * from IP where Object='Switch' and UserID=$SWID"); 
					$array7=mysql_fetch_array($result7);
					$LOct1=$array7['Oct1'];
					$LOct2=$array7['Oct2'];
					$LOct3=$array7['Oct3'];
					$LOct4=$array7['Oct4'];
					$LDate=$array7['Date'];
					$IPID=$array7['IPID'];
					$CIDR=$array7['CIDR'];
					$result10=mysql_query("insert into DelIP (Oct1,Oct2,Oct3,Oct4,Object,UserID,CreDate,DelDate,IPID,CIDR) value ($LOct1,$LOct2,$LOct3,$LOct3,'Switch',$SWID,'$LDate','$FDate',$IPID,$CIDR)");
					$result8=mysql_query("delete from IP where Object='Switch' and UserID=$SWID");
					$result9=mysql_query("insert into IP (Oct1,Oct2,Oct3,Oct4,CIDR,Object,UserID,Date) value ($Oct1,$Oct2,$Oct3,$Oct4,32,'Switch',$SWID,'$FDate')");
 
if ($a['P21']>=1)
{ 
$query2="update Switch set Hostname='$Hostname', MAC='$MAC', TWID='$TWID', Model=$Model, User='$User', Pass='$Pass', Secret='$Secret', SNMP='$SNMP', PortCt=$PortCt where SWID=$SWID ";
}
else {					
$query2="update Switch set Hostname='$Hostname', MAC='$MAC', TWID='$TWID', Model=$Model, PortCt=$PortCt where SWID=$SWID ";
}
					$result2=mysql_query($query2);
				
					//-----------------Get User ID--------------
					if ($result2){
						
						if ($PortCt!=$OPortCt)
						{
							if ($PortCt>$OPortCt)
							{
								$sum=$PortCt-$OPortCt;
								for ($k=$OPortCt+1;$k<=$PortCt;$k++) {
			 						$query="insert into Port (SWID,PNum) value ($SWID,$k)";
									$result=mysql_query($query);
								}
							}
							else 
							{
								$sum=$OPortCt-$PortCt;
								for ($k=$OPortCt;$k>$PortCt;$k--) {
			 						$query="delete from Port where SWID=$SWID and PNum=$k";
									$result=mysql_query($query);
								}
							}
						}
						ALog('Switch',$SWID,'Edit');
						echo 'z';
						}
					else {
						echo "e";	
					}
				
			}
			else echo "c";//duplicate hostname
		}
		else echo "b";//wrong IP
	}
	
else echo "a";//empty hostname		
}
else echo "f";//empty model
}
else echo "g";//empty PortCt
?>