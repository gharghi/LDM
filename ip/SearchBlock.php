<script language="javascript">
$(document).ready(function() { 
        $("#ResultTable").tablesorter(); 	
});

</script>
<?php
$id='P12';
$lv='1';
$FID='F12';
include "../global/db.php";
$Order=stripslashes(mysql_real_escape_string($_POST['Order']));
if ($_POST['DESC']==1)
	$DE='DESC';	
else $DE='ASC';
$Limit=stripslashes(mysql_real_escape_string($_POST['Limit']));
$Oct1=stripslashes(mysql_real_escape_string($_POST['Oct1'])); if (empty($_POST['Oct1'])) $Oct1=0;
$Oct2=stripslashes(mysql_real_escape_string($_POST['Oct2'])); if (empty($_POST['Oct2'])) $Oct2=0;
$Oct3=stripslashes(mysql_real_escape_string($_POST['Oct3'])); if (empty($_POST['Oct3'])) $Oct3=0;
$Oct4=stripslashes(mysql_real_escape_string($_POST['Oct4'])); if (empty($_POST['Oct4'])) $Oct4=0; 
 if (isset($_POST['CIDR']))
  {
	 $CIDR=stripslashes(mysql_real_escape_string($_POST['CIDR']));
 } 
 else 
  {
	  echo 'a'; 
	  exit;
	  }
if ($CIDR<=32&&$CIDR>=24)
{
	if ($Oct4 %( pow(2,(32-$CIDR)))!=0)
	{
		echo 'b';
		exit;
	}
	else
	{
		$Endmask=$Oct4+(pow(2,(32-$CIDR)));
		$query="select * from IP where Oct1=$Oct1 and Oct2=$Oct2 and Oct3=$Oct3 and ( Oct4>=$Oct4 and Oct4<$Endmask ) order by IPID";
	}
}
else if ($CIDR<=23&&$CIDR>=16)
{
	if ($Oct4 %( pow(2,(32-$CIDR)))!=0)
	{
		echo 'b';
		exit;
	}
	else
	{
		$CCIDR=$CIDR+8;
		$Endmask=$Oct3+(pow(2,(32-$CCIDR)));
		$query="select * from IP where Oct1=$Oct1 and Oct2=$Oct2 and  ( Oct3>=$Oct3 and Oct3<$Endmask ) order by IPID";
	}
}
else if ($CIDR<=15&&$CIDR>=8)
{
	if ($Oct4 %( pow(2,(32-$CIDR)))!=0)
	{
		echo 'b';
		exit;
	}
	else {
  		$CCIDR=$CIDR+16;
		$Endmask=$Oct2+(pow(2,(32-$CCIDR)));
		$query="select * from IP where Oct1=$Oct1 and  ( Oct2>=$Oct2 and Oct2<$Endmask ) order by IPID";
	}
}
else if ($CIDR<=7&&$CIDR>=0)
{
	if ($Oct4 %( pow(2,(32-$CIDR)))!=0)
	{
		echo 'b';
		exit;
	}
	else {
		$CCIDR=$CIDR+24;
		$Endmask=$Oct1+(pow(2,(32-$CCIDR)));
		$query="select * from IP where Oct1>=$Oct1 and Oct1<$Endmask order by IPID";
	}
}
$result33=mysql_query($query);
$num=mysql_num_rows($result33);
if ($num==0)
{
	echo "<p style='color:red;'> جستجو نتیجه ای در بر نداشت!</p>";
	exit;	
}
$i=0;
$k=0;
while ($i < $num) {
	
	$CIDR=mysql_result($result33,$i,'CIDR');
	$i=$i+(pow(2,(32-$CIDR)));
	$k++;
	}	
$num2=$k;
$Pages=(int)($num2/$Limit);
if (($num2%$Limit)!=0) $Pages++;
$PStart=0;
if (!empty($_POST['PStart'])){
	$PStart=$_POST['PStart'];
}
$PEnd=$PStart+$Limit; 
if ($_POST['Output']=='Excel')
{ 
$filename = "IPs";
header('Content-Encoding: UTF-8');
header('Content-type: text/csv; charset=UTF-8');
header('Content-Disposition: attachment; filename="'.$filename.'.csv'.'"'); 
echo "\xef\xbb\xbf";
echo "#,شناسه";
echo ',IP';
echo ',بهره بردار';
echo ',نام بهره بردار';
echo ',تاریخ واگذاری';
echo "\n";

$i=0;
$k=0;

while ($i < $num) {
	$IPID=mysql_result($result33,$i,'IPID');
	$UserID=mysql_result($result33,$i,'UserID');
	$Object=mysql_result($result33,$i,'Object');
	$Oct1=mysql_result($result33,$i,'Oct1');
	$Oct2=mysql_result($result33,$i,'Oct2');
	$Oct3=mysql_result($result33,$i,'Oct3');
	$Oct4=mysql_result($result33,$i,'Oct4');
	$CIDR=mysql_result($result33,$i,'CIDR');
	$Date=mysql_result($result33,$i,'Date');
	$j=$k+1;
echo $k+1,",",$IPID,",";
 echo $Oct1,".",$Oct2,".",$Oct3,".",$Oct4,"/",$CIDR;
 switch($Object)
 {
	case 'Hardware':
	   echo ",سخت افزار";	 
	   $result9=mysql_query("select Hostname from Hardware where HWID=$UserID");
	   $array9=mysql_fetch_array($result9);
	   $NameUserID=$array9['Hostname'];
	   break;
	   
	case 'Switch':
	   echo ",سوئیچ";	 
	   $result9=mysql_query("select Hostname from Switch where SWID=$UserID");
	   $array9=mysql_fetch_array($result9);
	   $NameUserID=$array9['Hostname'];
	   break;
	
	case 'User':
	   echo ",مشترک";	 
	   $NameUserID=NameUser($UserID);
	   break;
	   
	default:
	break;
 }

 echo ",",$NameUserID;
echo ',',$Date;



	$i=$i+pow(2,(32-$CIDR));
	$k++;
		echo "\n";
	}	

	echo "\n";
    }
//----------End Excel output------------------

else if ($_POST['Output']=='PDF') 
{
	
$i=0;
$k=0;	
	
	$html= "
	
	
	<div class='title_wrapper'>
 <h2>جستجوی IP </h2>
  </div>
<div class='table_wrapper'>
<div class='table_wrapper_inner2'>
							<table cellpadding='0' cellspacing='0' width='100%' id='ResultTable'>
								<thead><tr>
									<th  style='width:18px;'>#</th>
									  <th>IP</th>
									  <th>بهره بردار</th>
									  <th>نام بهره بردار</th>
									  <th>تاریخ واگذاری</th>
									  								</tr>
								</thead><tbody>";
while ($i < $num) {
	$IPID=mysql_result($result33,$i,'IPID');
	$UserID=mysql_result($result33,$i,'UserID');
	$Object=mysql_result($result33,$i,'Object');
	$Oct1=mysql_result($result33,$i,'Oct1');
	$Oct2=mysql_result($result33,$i,'Oct2');
	$Oct3=mysql_result($result33,$i,'Oct3');
	$Oct4=mysql_result($result33,$i,'Oct4');
	$CIDR=mysql_result($result33,$i,'CIDR');
	$Date=mysql_result($result33,$i,'Date');
	$j=$k+1;
	$html=$html."<tr id='tr_".$j."' class='first"; 
	if ($PStart>$j||$j>$PEnd)
	{
		$html=$html." rowhide";
	}
	
	$html=$html."'><td>".fdigit($j)."</td>
 <td>".$Oct1.".".$Oct2.".".$Oct3.".".$Oct4."/".$CIDR."</td>
<td>";
 switch($Object)
 {
	case 'Hardware':
	   $html=$html."سخت افزار";	 
	   $result9=mysql_query("select Hostname from Hardware where HWID=$UserID");
	   $array9=mysql_fetch_array($result9);
	   $NameUserID=$array9['Hostname'];
	   break;
	   
	case 'Switch':
	   $html=$html."سوئیچ";	 
	   $result9=mysql_query("select Hostname from Switch where SWID=$UserID");
	   $array9=mysql_fetch_array($result9);
	   $NameUserID=$array9['Hostname'];
	   break;
	
	case 'User':
	   $html=$html."مشترک";	 
	   $NameUserID=NameUser($UserID);
	   break;
	   
	default:
	break;
 }
 $html=$html."</td>";
 $html=$html."<td>".$NameUserID."</td>
<td>".fdates($Date)."</td>
  </tr>";
	$i=$i+pow(2,(32-$CIDR));
	$k++;
	}	
 $html=$html."
 </tbody>
 </table>
</div>
	";
echo html_to_pdf($html);
	
}
else {
?>
<div class="title_wrapper">
 <h2>نتیجه جستجو </h2>
 <a href="javascript:View_All_Records();" class="view_all_orders">کل رکوردها: <?php echo $num2; ?></a> </div>
<!--[if !IE]>start table_wrapper<![endif]-->
<div class="table_wrapper">
 <?php
$i=0;
$k=0;
echo "<div class='table_wrapper_inner2'>
							<table cellpadding='0' cellspacing='0' width='100%' id='ResultTable'>
								<thead><tr>
									<th  style='width:18px;'>
									<a  href='javascript:void(0);' >#</a></th>";
									 echo "<th><a  href='javascript:void(0);'>IP</a></th>";
									 echo "<th><a href='javascript:void(0);'>بهره بردار</a></th>";
									 echo "<th><a href='javascript:void(0);'>نام بهره بردار</a></th>";
									 echo "<th><a href='javascript:void(0);'>تاریخ واگذاری</a></th>";
									 echo "<th style='width: 12px;'>دستورها</th>
								</tr>
								</thead><tbody>";
while ($i < $num) {
	$IPID=mysql_result($result33,$i,'IPID');
	$UserID=mysql_result($result33,$i,'UserID');
	$Object=mysql_result($result33,$i,'Object');
	$Oct1=mysql_result($result33,$i,'Oct1');
	$Oct2=mysql_result($result33,$i,'Oct2');
	$Oct3=mysql_result($result33,$i,'Oct3');
	$Oct4=mysql_result($result33,$i,'Oct4');
	$CIDR=mysql_result($result33,$i,'CIDR');
	$Date=mysql_result($result33,$i,'Date');
	$j=$k+1;
	echo "<tr id='tr_".$j."' class='first"; 
	if ($PStart>$j||$j>$PEnd)
	{
		echo " rowhide";
	}
	
	echo "'><td>",fdigit($j),"</td>";
 echo "<td>",$Oct1,".",$Oct2,".",$Oct3,".",$Oct4,"/",$CIDR,"</td>";
 echo "<td>";
 switch($Object)
 {
	case 'Hardware':
	   echo "سخت افزار";	 
	   $result9=mysql_query("select Hostname from Hardware where HWID=$UserID");
	   $array9=mysql_fetch_array($result9);
	   $NameUserID=$array9['Hostname'];
	   break;
	   
	case 'Switch':
	   echo "سوئیچ";	 
	   $result9=mysql_query("select Hostname from Switch where SWID=$UserID");
	   $array9=mysql_fetch_array($result9);
	   $NameUserID=$array9['Hostname'];
	   break;
	
	case 'User':
	   echo "مشترک";	 
	   $NameUserID=NameUser($UserID);
	   break;
	   
	default:
	break;
 }
 echo "</td>";
 echo "<td>",$NameUserID,"</td>";
echo '<td>',fdates($Date),'</td>';
	  echo "<td>
		  <div  class='actions' style='width:48px !important;'>
			  <ul>
			  <li><a class='Accopen' id='".$UserID."'";
			  if ($Object=='User')
			  {
					echo "href='javascript:loaduserprofile(".$UserID.");'"; 
			  }
			  else if ($Object=='Hardware') 
			  {
				  $result4=mysql_query("select UserID from Hardware where HWID=$UserID");
				  $array4=mysql_fetch_array($result4);
				  echo "href='javascript:ViewHardware(".$UserID.",".$array4['UserID'].");'";
			  }
			  else if ($Object=='Switch') 
			  {
				  echo "href='javascript:ViewSwitch(".$UserID.");'";
			  }
			  echo "title='مشاهده'></a></li>
				  
			  </ul>
		  </div>
	  </td>
  </tr>";
	$i=$i+pow(2,(32-$CIDR));
	$k++;
	}	
?>
 </tbody>
 </table>
</div>
<!--[if !IE]>start pagination<![endif]-->
<div class="pagination">
<span class="page_no"> <span> صفحه </span><span id="page_no_first"><?php echo fdigit('1'); ?> </span><span> از </span><span> <?php echo fdigit($Pages); ?></span></span> <span class="page_no2"> <span>
<?php $End_First=$Limit+1; echo "<a href='javascript:Pagination(1,1,".$End_First.",".$Pages.");' class='pag_space'>   اولین  </a>"?>
</span> <span id='PA0' class="phide"><?php echo "..."; ?></span>
<?php 
$St=1;
$Ed=$St+$Limit; 
for ($k=1;$k<=$Pages;$k++) 
{
	
	
	echo "<span  id='PA".$k."'";
	if ($k>5)
	{
		echo "class='phide'";
	}
	echo "><a href='javascript:Pagination(".$k.",".$St.",".$Ed.",".$Pages.");' class='pag_space  ";
	if ($k==1) echo "pag_active";
	echo "'>   ".fdigit($k)."  </a></span>";
	$St=$St+$Limit;
	$Ed=$Ed+$Limit;
}
$St=$St-$Limit;
$Ed=$Ed-$Limit;
$k--;
?>
<?php if ($Pages>6) echo "<span id='PAE'>...</span> "; ?>
<?php echo "<span id='PA'".$k."><a href='javascript:Pagination(".$k.",".$St.",".$Ed.",".$Pages.");' class='pag_space'>   آخرین  </a>"?></span> </span>
<?php
}
?>
