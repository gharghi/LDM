<?php
$id='P22';
$lv='1';
include "../global/db.php";
$FDate=FDate();
switch($_POST['Request'])
{
case 1:
	extract($_POST);
	$UserID=stripslashes(mysql_real_escape_string($UserID));
	$Type=stripslashes(mysql_real_escape_string($Type));
	$Problem=str_replace(",","-",(stripslashes(mysql_real_escape_string($Problem))));if(empty($Problem)) $Problem='عنوان نشده';
	$IsProblem=stripslashes(mysql_real_escape_string($IsProblem));if(empty($IsProblem)) $IsProblem=0;
	$Actions=str_replace(",","-",(stripslashes(mysql_real_escape_string($Actions))));if(empty($Actions)) $Actions='عنوان نشده';
	$IsSolved=stripslashes(mysql_real_escape_string($IsSolved));if(empty($IsSolved)) $IsSolved=0;
	$Admin=stripslashes(mysql_real_escape_string($Admin));
	$Descr=str_replace(",","-",(stripslashes(mysql_real_escape_string($Descr))));if(empty($Descr)) $Descr='عنوان نشده';
	$Request=1;
	$Result=mysql_query("insert into Ticket (UserID,Type,Request,IsProblem,Problem,IsSolved,Action,Descr,Date) value ($UserID,$Type,$Request,$IsProblem,'$Problem',$IsSolved,'$Action','$Descr','$FDate')");
	$TKID=mysql_insert_id();
	if (!$Result)
	{
		echo mysql_error();
		exit;
	}
	$SnID=$AID;
	$RcID=$Admin;
	$Result=mysql_query("insert into TicketLog (TKID,SnID,RcID,Descr,Date) value ($TKID,$SnID,$RcID,'$Descr','$FDate')");
	$TLID=mysql_insert_id();
	if (!$Result)
	{
		echo mysql_error();
		exit;
	} 
	else {
		ALog('Support',$TKID,'Add');
		echo 'Ok,'.$TKID;
	}
	break;

case 2:
	extract($_POST);
	$UserID=stripslashes(mysql_real_escape_string($UserID));
	$NewBW=str_replace(",","-",(stripslashes(mysql_real_escape_string($NewBW))));if(empty($NewBW)) $NewBW='نا معلوم';
	$Admin2=stripslashes(mysql_real_escape_string($Admin2));
	$Descr=str_replace(",","-",(stripslashes(mysql_real_escape_string($Descr2))));if(empty($Descr2)) $Descr='عنوان نشده';
	$Request=2;
	$Result=mysql_query("insert into Ticket (UserID,Request,Problem,Descr,Date) value ($UserID,$Request,'$NewBW','$Descr','$FDate')");
	$TKID=mysql_insert_id();
	if (!$Result)
	{
		echo mysql_error();
		exit;
	}
	$SnID=$AID;
	$RcID=$Admin2;
	$Result=mysql_query("insert into TicketLog (TKID,SnID,RcID,Descr,Date) value ($TKID,$SnID,$RcID,'$Descr','$FDate')");
	$TLID=mysql_insert_id();
	if (!$Result)
	{
		echo mysql_error();
		exit;
	} 
	else {
		ALog('Support',$TKID,'Add');
		echo 'Ok2,'.$TKID;
	}
	break;

case 3:
	extract($_POST);
	$UserID=stripslashes(mysql_real_escape_string($UserID));
	$Request3=stripslashes(mysql_real_escape_string($Request3));
	if ($Request3==1) {
		$Increase=stripslashes(mysql_real_escape_string($Increase));if(empty($Increase)) $Increase='نا معلوم';
		$Problem='افزایش پهنای باند به مقدار '.$Increase.' مگابیت';
	}
	else if($Request3==2) {
		$Decrease=stripslashes(mysql_real_escape_string($Decrease));if(empty($Decrease)) $Decrease='نا معلوم';
		$Problem='کاهش پهنای باند به مقدار '.$Decrease.' مگابیت';
	}
	else if ($Request3==3) {
		$Change=stripslashes(mysql_real_escape_string($Change));if(empty($Change)) $Change='نا معلوم';
		$Problem='تغییر سرویس به سرویس  '.$Change;
	}
	$Admin3=stripslashes(mysql_real_escape_string($Admin3));
	$Descr=str_replace(",","-",(stripslashes(mysql_real_escape_string($Descr3))));if(empty($Descr3)) $Descr='عنوان نشده';
	$Request=3;
	$Result=mysql_query("insert into Ticket (UserID,Request,Problem,Descr,Date) value ($UserID,$Request,'$Problem','$Descr','$FDate')");
	$TKID=mysql_insert_id();
	if (!$Result)
	{
		echo mysql_error();
		exit;
	}
	$SnID=$AID;
	$RcID=$Admin3;
	$Result=mysql_query("insert into TicketLog (TKID,SnID,RcID,Descr,Date) value ($TKID,$SnID,$RcID,'$Descr','$FDate')");
	$TLID=mysql_insert_id();
	if (!$Result)
	{
		echo mysql_error();
		exit;
	} 
	else {
		ALog('Support',$TKID,'Add');
		echo 'Ok3,'.$TKID;
	}
	break;
}
?>