<?php
$id='P17';
$lv='1';
include "../global/db.php";
$Limit=20;
$OID=stripslashes(mysql_real_escape_string($_POST['OID']));
$Admin=stripslashes(mysql_real_escape_string($_POST['Admin']));
$Object=stripslashes(mysql_real_escape_string($_POST['Obje']));
if (!empty($Admin)&&$Admin!='Z') $Admin= "and AID=".$Admin; else $Admin=' '; 
if (!empty($Object)&&$Object!='Z') $Object= " and Object='".$Object."' and OID=".$OID; else $Object= ' ';
$query="select * from Audit where Date >= '0000-00-00 00:00:00'".$Admin.$Object." order by LOGID";
$result=mysql_query($query);
$num=mysql_num_rows($result);
if ($num==0)
{
	echo "<p style='color:red;'> جستجو نتیجه ای در بر نداشت!</p>";
	exit;	
} 
$Pages=(int)($num/$Limit);
if (($num%$Limit)!=0) $Pages++;
$PStart=0;
if (!empty($_POST['PStart'])){
	$PStart=$_POST['PStart'];
}
$PEnd=$PStart+$Limit;
if ($_POST['Output']=='Excel')
{}
else if ($_POST['Output']=='PDF') 
{}
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
								echo '<th>انجام دهنده</th>';
								echo '<th>نوع هدف</th>';
								echo '<th>نام هدف</th>';
								echo '<th>تاریخ</th>';
								echo '<th>عملیات</th>';
									echo '<th>آدرس مدیر</th>';
								
								echo "</tr>
								</thead><tbody>";
while ($i < $num) {
	$LOGID=mysql_result($result,$i,'LOGID');
	$Admin=mysql_result($result,$i,'AID');
	$result2=mysql_query("select AUsername from Admin where AID=$Admin");
	$array=mysql_fetch_array($result2);
	$Admin=$array['AUsername'];
	$Object=mysql_result($result,$i,'Object');
	$OID=mysql_result($result,$i,'OID');
	$Object2=$Object;
	switch ($Object) {
		case 'Admin':
			$Object='مدیر';
			$OIDD='AID';
			break;
		case 'User':
			$Object='کاربر';
			$OIDD='UserID';
			break;
		case 'Switch':
			$Object='سوئیچ';
			$OIDD='SWID';
			break;
		case 'Tower':
			$Object='مرکز';
			$OIDD='TWID';
			break;
		case 'Prefix':
			$Object='رنج IP';
			$OIDD='PID';
			break;
		case 'Hardware':
			$Object='سخت افزار';
			$OIDD='HWID';
			break;
		case 'IP':
			$Object='IP';
			$OIDD='IPID';
			break;
		case 'DelIP':
			$Object='سابقه IP';
			$OIDD='DelIPID';
			break;
		case 'Type':
			$Object='مدل سخت افزار';
			$OIDD='TID';
			break;
		default:
		break;
	}
	$OIDID=$OID;
	$result2=mysql_query("select * from $Object2 where $OIDD=$OID"); 
	$array=mysql_fetch_array($result2);
	switch ($Object2) {
		case 'Admin':
			$OID=$array['AUsername'];
			if (empty($OID)) $OID="[ID:[".$OIDID."";
			break;
		case 'User':
			$OID=$array['Name'];
			if (empty($OID)) $OID="[ID:[".$OIDID."";
			break;
		case 'Switch':
			$OID=$array['Hostname'];
			if (empty($OID)) $OID="[ID:[".$OIDID."";
			break;
		case 'Tower':
			$OID=$array['Name'];
			if (empty($OID)) $OID="[ID:[".$OIDID."";
			break;
		case 'Prefix':
			$Oct1=$array['Oct1'];
			$Oct2=$array['Oct2'];
			$Oct3=$array['Oct3'];
			$Oct4=$array['Oct4'];
			$CIDR=$array['CIDR'];
			$OID="$Oct1.$Oct2.$Oct3.$Oct4/$CIDR";
			if (empty($array['Oct1'])) $OID="[ID:[".$OIDID."";
			break;
		case 'Hardware':
			$OID=$array['Hostname'];
			if (empty($OID)) $OID="[ID:[".$OIDID."";
			break;
		case 'IP':
			$Oct1=$array['Oct1'];
			$Oct2=$array['Oct2'];
			$Oct3=$array['Oct3'];
			$Oct4=$array['Oct4'];
			$CIDR=$array['CIDR'];
			$OID="$Oct1.$Oct2.$Oct3.$Oct4/$CIDR";
			if (empty($array['Oct1'])) $OID="[ID:[".$OIDID."";
			break;
		case 'DelIP':
			$Oct1=$array['Oct1'];
			$Oct2=$array['Oct2'];
			$Oct3=$array['Oct3'];
			$Oct4=$array['Oct4'];
			$CIDR=$array['CIDR'];
			$OID="$Oct1.$Oct2.$Oct3.$Oct4/$CIDR";
			if (empty($array['Oct1'])) $OID="[ID:[".$OIDID."";
			break;
		case 'Type':
			$OID=$array['Type'];
			if (empty($OID)) $OID="[ID:[".$OIDID."";
			break;
		default:
		break;
	}
	$Date=mysql_result($result,$i,'Date');
	$Action=mysql_result($result,$i,'Action');
	switch ($Action) {
		case 'Add':
			$Action='افزودن';
			break;
		case 'Delete':
			$Action='حذف';
			break;
		case 'Search':
			$Action='جستجو';
			break;
		case 'Edit':
			$Action='ویرایش';
			break;
		case 'View':
			$Action='مشاهده';
			break;
		case 'Permission':
			$Action='سطح دسترسی';
			break;
		case 'List':
			$Action='مشاهده';
			break;
		case 'Password':
			$Action='تغییر رمز عبور';
			break;
		default:
		break;
	}
	$IP=mysql_result($result,$i,'IP');
	$j=$i+1;
	echo "<tr id='tr_".$j."' class='first"; 
	if ($PStart>$j||$j>$PEnd)
	{
		echo " rowhide";
	}
	
	echo "'><td>",fdigit($j),"</td>";
echo '<td>',$Admin,'</td>';
echo '<td>',$Object,'</td>';
echo '<td>',$OID,'</td>';
echo '<td style="direction:ltr;">',fdates(fdigit($Date)),'</td>';
echo '<td>',$Action,'</td>';
echo '<td>',$IP,'</td>';
	 echo "
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
