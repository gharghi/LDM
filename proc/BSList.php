<?php
$id='P13';
$lv='1';
$FID='F13';
include "../global/db.php";
$result=mysql_query("select * from User");
$num=mysql_num_rows($result);
$num=1;
$Company_Name='راصد مارال آوا جنوب';
$Year='1392';
$Priod='چهارم';
if (TRUE)
{ 
//---------------Excel output-----------
	$filename = "list";
	header('Content-Encoding: UTF-8');
	header('Content-type: application/ms-excel charset=UTF-8');
	header('Content-Disposition: attachment; filename="'.$filename.'.xls'.'"'); 
	echo "\xef\xbb\xbf";
	echo ','.','.','.','.','.','.' گزارش عملکرد شرکت '.$Company_Name;
	echo "\n";
	echo ','.','.','.','.','.' دوره: دوماهه '.$Priod.','.' سال: '.$Year;
	echo "\n";
	
//list foroosh	
	echo 'محدوده IP,'.'نوع دسترسی,'.'شماره قرارداد,'.'نوی پهنای باند,'.'پهنای باند دریافتی بر حسب Mbps,'.'بهره بردار خصوصی,'.'بهره بردار سازمانهای مستقل,'.'بهره بردار دولتی,'.'شهر,'.'استان,'.'ردیف,';
	echo "\n";
echo $contents;
    for($i=0; $i<$num; $i++)
    {
		
	$UserID=mysql_result($result,$i,'UserID');
	$Name=mysql_result($result,$i,'Name');
	$Cont=mysql_result($result,$i,'Cont');
	$Resp=mysql_result($result,$i,'Resp');
	$Tel=mysql_result($result,$i,'Tel');
	$Mob=mysql_result($result,$i,'Mob');
	$BW=mysql_result($result,$i,'BW');
	$LatName=mysql_result($result,$i,'LatName');
	$LatAddress=mysql_result($result,$i,'LatAddress');
	$LatResp=mysql_result($result,$i,'LatResp');
	$Email=mysql_result($result,$i,'Email');
	
	 echo "\n";
    }
}
?>