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
$query="select * from DelIP where Oct1=$Oct1 and Oct2=$Oct2 and Oct3=$Oct3 and  Oct4=$Oct4 order by DelDate";
$result33=mysql_query($query);
$num=mysql_num_rows($result33);
$Pages=(int)($num/$Limit);
if (($num%$Limit)!=0) $Pages++;
$PStart=0;
if (!empty($_POST['PStart'])){
	$PStart=$_POST['PStart'];
}
$PEnd=$PStart+$Limit; 
if ($_POST['Output']=='Excel')
{ 
	
//----------End Excel output-------------------	
}
else if ($_POST['Output']=='PDF') 
{
	
}
else {
?>
<div class="title_wrapper">
 <h2>نتیجه جستجو </h2>
 <a href="#" class="view_all_orders">نعداد رکورد ها: <?php echo fdigit($num); ?></a> </div>
<!--[if !IE]>start table_wrapper<![endif]-->
<div class="table_wrapper">
 <?php
$i=0;
echo "<div class='table_wrapper_inner2'>
							<table cellpadding='0' cellspacing='0' width='100%' id='aaa'>
								<thead><tr>
									<th  style='width:18px;'>#</th>";
									 echo '<th>IP</th>';
									 echo '<th>بهره بردار</th>';
									 echo '<th>نام بهره بردار</th>';
									 echo '<th>تاریخ واگذاری</th>';
									 echo '<th>تاریخ آزاد سازی </th>';
									 echo "<th style='width: 12px;'>دستورها</th>
								</tr>
								</thead><tbody>";
$IPID=mysql_result($result33,$i,'IPID');								
Alog('DelIP',$IPID,'Search');
while ($i < $num) {
	$IPID=mysql_result($result33,$i,'IPID');
	$UserID=mysql_result($result33,$i,'UserID');
	$Object=mysql_result($result33,$i,'Object');
	$Oct1=mysql_result($result33,$i,'Oct1');
	$Oct2=mysql_result($result33,$i,'Oct2');
	$Oct3=mysql_result($result33,$i,'Oct3');
	$Oct4=mysql_result($result33,$i,'Oct4');
	$CIDR=mysql_result($result33,$i,'CIDR');
	$CreDate=mysql_result($result33,$i,'CreDate');
	$DelDate=mysql_result($result33,$i,'DelDate');
	$CountIP=pow(2,(32-$CIDR));
	$S=(int)($Oct4/$CIDR);
	$Oct4=$S*$CountIP;
	$j=$i+1;
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
	   if (empty($NameUserID)) $NameUserID="[ID:[$UserID";
	   break;
	   
	case 'Switch':
	   echo "سوئیچ";	 
	   $result9=mysql_query("select Hostname from Switch where SWID=$UserID");
	   $array9=mysql_fetch_array($result9);
	   $NameUserID=$array9['Hostname'];
	   if (empty($NameUserID)) $NameUserID="[ID:[$UserID";
	   break;
	
	case 'User':
	   echo "مشترک";	 
	   $NameUserID=NameUser($UserID);
	   if (empty($NameUserID)) $NameUserID="[ID:[$UserID";
	   break;
	   
	default:
	break;
 }
 echo "</td>";
 echo "<td>",$NameUserID,"</td>";
echo '<td style="direction:ltr;">',fdates(fdigit($CreDate)),'</td>';
echo '<td  style="direction:ltr;">',fdates(fdigit($DelDate)),'</td>';
	  echo "<td>";
	  $result=mysql_query("select NDeleted from User where UserID=$UserID");
	  $array=mysql_fetch_array($result);
	  $NDeleted=$array['NDeleted'];
	  if ($NDeleted==1)
	  {
		  echo "
		  <div  class='actions' style='width:48px !important;'>
			  <ul>
			  <li><a class='Accopen' id='".$UserID."' href='javascript:loaduserprofile(".$UserID.");' title='مشاهده'></a></li>";
				 
	  }
	  else echo "
		  <div  class='actions' style='width:48px !important;'>
			  <ul>
			  <li><a class='Accopendeleted' id='".$UserID."' href='javascript:loaddeletedprofile(".$UserID.");' title='مشاهده'></a></li>";
			 echo "</ul>
		  </div>
	  </td>
  </tr>";
	$i++;
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
