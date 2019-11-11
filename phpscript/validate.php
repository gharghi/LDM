<?php
$id='P11';
$lv='1'; 
include "../global/db.php";
$Fno=stripslashes(mysql_real_escape_string($_POST['Fno']));
$VValue=stripslashes(mysql_real_escape_string($_POST['VValue']));
$field=stripslashes(mysql_real_escape_string($_POST['Field']));
//----Determining Table and field name--------------
$tableid=substr($Fno,1,2);
$fieldid=substr($Fno,3,1);
//----------Table--------------
if ($tableid==10) {
	$table="User";
//	if ($fieldid==1) $field="Name";
//	if ($fieldid==2) $field="LatName";
//	if ($fieldid==3) $field="Cont";
}
if ($tableid==11) {
	$table="IP";
}
if ($tableid==12) {
	$table="Radio";
}
if ($tableid==13) {
	$table="Hardware";
}
if ($tableid==14) {
	$table="Switch";
	if ($fieldid==1) $field="Hostname";
	if ($fieldid==2) $field="IP";
}
if ($tableid==15) {
	$table="Tower";
	if ($fieldid==1) $field="Name";
}
if ($tableid==16) {
	$table="Admin";
	if ($fieldid==1) $field="Name";
	if ($fieldid==2) $field="AUsername";
}
//--------checking ind database-------------
$DB=new Database;
$DB->Connect();
$DB->Select($table,$field,$field."='".$VValue."'");
$num=$DB->Select_Rows;
if ($num==0)
echo 1;
else echo 0;
?>
