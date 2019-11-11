<?php 
$id='P18';
$lv='2';
$FID='F18';
include "../global/db.php"; 
extract($_POST);
$Oct1=stripslashes(mysql_real_escape_string($Oct1)); if (empty($Oct1)) $Oct1=0;
$Oct2=stripslashes(mysql_real_escape_string($Oct2)); if (empty($Oct2)) $Oct2=0;
$Oct3=stripslashes(mysql_real_escape_string($Oct3)); if (empty($Oct3)) $Oct3=0;
$Oct4=stripslashes(mysql_real_escape_string($Oct4)); if (empty($Oct4)) $Oct4=0;
$CIDR=stripslashes(mysql_real_escape_string($CIDR)); if (empty($CIDR)) $CIDR=0;
if ($CIDR>7&&$CIDR<33)
{
	if ($Oct1<224&&$Oct2<256&&$Oct3<256&&$Oct4<255&&is_numeric($Oct1)&&is_numeric($Oct2)&&is_numeric($Oct3)&&is_numeric($Oct4)&&is_numeric($CIDR)) {
		
		if((($CIDR>=24)&&($Oct4 %( pow(2,(32-$CIDR)))==0))
		||(($Oct4==0)&&($CIDR>=16&&$CIDR<=23)&&($Oct3 % (pow(2,(24-$CIDR)))==0))
		||(($Oct3==0)&&($Oct4==0)&&($CIDR>=8&&$CIDR<=15)&&($Oct2 % (pow(2,(16-$CIDR)))==0)))
		{
			$DB=new Database;
			$DB->Connect();
			$result=$DB->Insert('Prefix','Oct1,Oct2,Oct3,Oct4,CIDR','( '.$Oct1.','.$Oct2.','.$Oct3.','.$Oct4.','.$CIDR.' )');
			if($result) {
				echo 'z';
				$PID=$DB->Insert_ID;
				ALog('Prefix',$PID,'Add');	 
				}
				else echo 'e';
		}
		else echo 'c';//mask and oct4 are incompatible
	}
	else echo 'b';//Octeds are more than 256 or not number
}
else echo 'a';//CIDR is invalid
