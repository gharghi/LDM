<?php
$id='P16';
$lv='4';
include "../global/db.php";
$NAID=stripslashes(mysql_real_escape_string($_POST['AID']));
if (isset($_POST['PUs'])) $PUs=stripslashes(mysql_real_escape_string($_POST['PUs'])); else $PUs=0;
if (isset($_POST['PHW'])) $PHW=stripslashes(mysql_real_escape_string($_POST['PHW'])); else $PHW=0;
if (isset($_POST['PIP'])) $PIP=stripslashes(mysql_real_escape_string($_POST['PIP'])); else $PIP=0;
if (isset($_POST['PTw'])) $PTw=stripslashes(mysql_real_escape_string($_POST['PTw'])); else $PTw=0;
if (isset($_POST['PSw'])) $PSw=stripslashes(mysql_real_escape_string($_POST['PSw'])); else $PSw=0;
if (isset($_POST['PAd'])) $PAd=stripslashes(mysql_real_escape_string($_POST['PAd'])); else $PAd=0;
if (isset($_POST['PAu'])) $PAu=stripslashes(mysql_real_escape_string($_POST['PAu'])); else $PAu=0;
if (isset($_POST['PPF'])) $PPF=stripslashes(mysql_real_escape_string($_POST['PPF'])); else $PPF=0;
if (isset($_POST['PT'])) $PT=stripslashes(mysql_real_escape_string($_POST['PT'])); else $PT=0;
if (isset($_POST['PV'])) $PV=stripslashes(mysql_real_escape_string($_POST['PV'])); else $PV=0;
if (isset($_POST['SP'])) $SP=stripslashes(mysql_real_escape_string($_POST['SP'])); else $SP=0;
if (isset($_POST['SF'])) $SF=stripslashes(mysql_real_escape_string($_POST['SF'])); else $SF=0;
$NPrm="P11.$PUs-P12.$PIP-P13.$PHW-P14.$PSw-P15.$PTw-P16.$PAd-P17.$PAu-P18.$PPF-P19.$PV-P20.$PT-P21.$SP-P22.$SF";
$query="update Admin set Prm='$NPrm' where AID=$NAID";
$result=mysql_query($query);
if ($result) 
ALog('Admin',$NAID,'Permission');
?>