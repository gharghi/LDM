<?php 
$id='P11';
$lv='3';
include "../global/db.php";
$UserID=stripslashes(mysql_real_escape_string($_POST['UserID']));
$DB=new Database;
$DB->Connect();
$DB->Select('IP','IPID',"Object='User' and UserID=".$UserID);
$IPNum=$DB->Select_Rows;
$DB->Disconnect();
if ($IPNum!=0) {
	echo 'a';
	exit;
}
$DB2=new Database;
$DB2->Connect();
$DB2->Select('Hardware','HWID',"UserID=".$UserID);
$HWNum=$DB2->Select_Rows;
$DB2->Disconnect();
if ($HWNum!=0) {
	echo 'b';
	exit;
}
$DB3=new Database;
$DB3->Connect();
$DB3->Select('User','*',"UserID=".$UserID);
if ($DB3->Select_result[0]['NICHDL']!='0')
{
$string="DATA=
person: ".$DB3->Select_result['LatResp']."
address: ".$DB3->Select_result['LatAddress']."
phone: %2B98".$DB3->Select_result['Mob']."
e-mail: ".$DB3->Select_result['Email']."
delete: Finished_Contract
password: ".$MNT_Pass."
mnt-by: ".$MNT."
nic-hdl: ".$DB3->Select_result['NICHDL']."
abuse-mailbox: ".$DB3->Select_result['Email']."
changed: ".$DB3->Select_result['Source']."
source: RIPE";
$c = curl_init();
curl_setopt($c, CURLOPT_URL, 'http://syncupdates.db.ripe.net');
curl_setopt($c, CURLOPT_POST, true);
curl_setopt($c, CURLOPT_RETURNTRANSFER, true);
curl_setopt($c, CURLOPT_POSTFIELDS,$string);
$resul=curl_exec ($c);
curl_close($c);
$num=strripos($resul,'Number of objects processed with errors:');
$failure=substr($resul,$num+42,2); 
	if ($failure=='1')
{
	echo 's';
}
}
$DB3->Disconnect();
$DB4=new Database;
$DB4->Connect();
$update['NDeleted']=0;
$result=$DB4->Update('User',$update,"UserID=".$UserID);
if ($result)
echo 'z';
else echo 'e';
?>