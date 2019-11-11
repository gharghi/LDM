<?php
//------------Functions------------
//------------Yes Audit log ---------------
function ALog($Object,$OID,$Action)
{
	require_once("jdatetime.class.php");
	$date = new jDateTime(false, true, 'Asia/Tehran');
	$FDate=$date->date("Y-m-d H:i:s");
	$IP=$_SERVER['REMOTE_ADDR']; 
	$AID=$_SESSION['AID'];
	$qlog="insert into Audit (Object,OID,Action,AID,IP,Date) value ('$Object','$OID','$Action','$AID','$IP','$FDate')";
	$rlog=mysql_query($qlog);
}
//--------resolve user's name from UserID---------
function NameUser($UserID)
{
	$DB=new Database;
	$DB->Connect();
	$DB->Select('User','*','UserID='.$UserID);
	$Name=$DB->Select_Result[0]['Name'];
	$DB->Disconnect();
	return($Name);
}
//--------resolve Admin's name from AID---------
function NameAdmin($a)
{
	$query="select Name from Admin where AID='$a'";
	$result=mysql_query($query);
	$array=mysql_fetch_array($result);
	$num=mysql_num_rows($result);
	if ($num==0) {
		return "{شناسه مدیر:".$a."}";
	}
	else {
	$Name=$array['Name'];
	return($Name);
	}
}
//--------convert digit to persian
function fdigit($string) {
  //arrays of persian and latin numbers
  $persian_num = array('۰', '۱', '۲', '۳', '۴', '۵', '۶', '۷', '۸', '۹');
  $latin_num = range(0, 9);
   
  $string = str_replace($latin_num, $persian_num, $string);
   
  return $string;
}
//--------convert digit to persian
function fdates($string) {
  $persian_num = '/';
  $latin_num = '-';
  $string = str_replace($latin_num, $persian_num, $string);
   
  return $string;
}
//---------------Resole IP from IPID
function IP($IPID) {
	$query2="select * from IP where IPID=$IPID";
	$result2=mysql_query($query2);
	$array2=mysql_fetch_array($result2);
	$Oct1=$array2['Oct1'];
	$Oct2=$array2['Oct2'];
	$Oct3=$array2['Oct3'];
	$Oct4=$array2['Oct4'];
	return "$Oct1.$Oct2.$Oct3.$Oct4";	
}
function FDate() {
	require_once("jdatetime.class.php");
	$date = new jDateTime(false, true, 'Asia/Tehran');
	$FDate=$date->date("Y-m-d H:i:s");
	return $FDate;
}
function SearchEqual($Name) { 
$PName=stripslashes(mysql_real_escape_string($_POST[$Name]));
$a=$Name.'Equal';
$NameEqual=stripslashes(mysql_real_escape_string($_POST[$a]));
switch ($NameEqual){
	case 'in':
		$QName="and $Name like '%$PName%'";
		break;
	case 'st':
		$QName="and $Name like '$PName%'";
		break;	
	case 'en':
		$QName="and $Name like '%$PName'";
		break;
	default:
		$QName="and $Name ='$PName'";
		
}
if (!empty($_POST[$Name]))
{
	
return $QName;
}
}
//for select menu search option
function SearchSingle($Name) { 
	if (!empty($_POST[$Name]))
	{
		$PName=stripslashes(mysql_real_escape_string($_POST[$Name]));
		$QName="and $Name like '%$PName%'";
		return $QName;
	}
}
function html_to_pdf($html , $page = 'A4')
{
    //Now generate pdf from html
    include("../mpdf/mpdf.php");
$mpdf=new mPDF('fa-ir','A4','','',10,10,10,10,6,3); 
$mpdf->SetDirectionality('rtl');
$mpdf->mirrorMargins = true;
$mpdf->SetDisplayMode('fullpage');

// LOAD a stylesheet
$stylesheet = file_get_contents('../css/tables.css');
$mpdf->WriteHTML($stylesheet,1);

$mpdf->WriteHTML($html,2);

$mpdf->Output('LDM.pdf','D');
}

function SecureData($data){
		if(is_array($data)){
			foreach($data as $key=>$val){
				if(!is_array($data[$key])){
					$data[$key] = mysql_real_escape_string($data[$key]);
				}
			}
		}else{
			$data = mysql_real_escape_string($data);
		}
		return $data;
	}
?>