<?php
$id='P13';
$lv='1';
$FID='F13';
include "../global/db.php";
$Order=stripslashes(mysql_real_escape_string($_POST['Order']));
if ($_POST['DESC']==1)
	$DE='DESC';	
else $DE='ASC';
$Limit=stripslashes(mysql_real_escape_string($_POST['Limit']));
if (!empty($_POST['Port']))
	{
		$Port=stripslashes(mysql_real_escape_string($_POST['Port']));
		$Port="and Port.PNum=$Port";
	}
if (!empty($_POST['SWID']))
	{
		$PName=stripslashes(mysql_real_escape_string($_POST['SWID']));
		$SWID="and Hardware.SWID=$PName";
	}
	else $SWID=' ';
$query="select * from Hardware join Type on Hardware.Model=Type.TID join Port on Hardware.Port=Port.PortID where Hardware.Searchable=1 ".SearchSingle(TWID)." ".$SWID." ".SearchSingle(VLAN)." ".SearchSingle(Type)." ".SearchSingle(Model)." ".SearchSingle(Brand)." ".SearchEqual(Hostname)." ".SearchEqual(IP)." ".SearchEqual(MAC)." ".SearchEqual(Username)." ".SearchEqual(Password)." ".SearchEqual(SNMP)." ".SearchEqual(Secret)." ".$Port."order by ".$Order." ".$DE; 
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
{ 
//---------------Excel output-----------
	$filename = "Hardware";
	header('Content-Encoding: UTF-8');
	header('Content-type: text/csv; charset=UTF-8');
	header('Content-Disposition: attachment; filename="'.$filename.'.csv'.'"'); 
	echo "\xef\xbb\xbf";
    echo "#,شناسه";
	if ($_POST['DHostname']==1) echo ',Hostname';
	if ($_POST['DIP']==1) echo ',IP';
	if ($_POST['DMAC']==1) echo ',مک آدرس';
	if ($_POST['DTWID']==1)echo ',مرکز';
	if ($_POST['DSWID']==1) echo ',سوئیچ';
	if ($_POST['DPort']==1) echo ',پورت';
	if ($_POST['DVLAN']==1) echo ',VLAN';
 	if ($_POST['DType']==1) echo ',نوع';
	if ($_POST['DBrand']==1) echo ',برند';
	if ($_POST['DModel']==1) echo ',مدل';
	if ($_POST['DUsername']==1) echo ',نام کاربری';
	if ($_POST['DPassword']==1) echo ',رمز عبور';
	if ($_POST['DSecret']==1) echo ',کلید رمز';
	if ($_POST['DSNMP']==1) echo ',SNMP';
	echo "\n";
    for($i=0; $i<$num; $i++)
    {
	$HWID=mysql_result($result,$i,'HWID');
	$Hostname=mysql_result($result,$i,'Hostname');
	$result4=mysql_query("select * from IP where Object='Hardware' and UserID=$HWID"); 
	$array4=mysql_fetch_array($result4);
	$IP=$array4['Oct1'].".".$array4['Oct2'].".".$array4['Oct3'].".".$array4['Oct4'];
	$TWID=mysql_result($result,$i,'TWID');
	$Tower=mysql_result(mysql_query("select Name from Tower where TWID=$TWID"),0,'Name');
	$SWID=mysql_result($result,$i,'SWID');
	$Switch=mysql_result(mysql_query("select Hostname from Switch where SWID=$SWID"),0,'Hostname');
	$TID=mysql_result($result,$i,'TID');
	$result25=mysql_query("select * from Type where TID=$TID");
	$Model=mysql_result($result25,0,'Model');
	$Type=mysql_result($result25,0,'Type');
	$Brand=mysql_result($result25,0,'Brand');
	$Port=mysql_result($result,$i,'Port');
	$PNum=mysql_result(mysql_query("select PNum from Port where PortID=$Port"),0,'PNum');
	$VLAN=mysql_result($result,$i,'VLAN');
	$Username=mysql_result($result,$i,'Username');
	$Password=mysql_result($result,$i,'Password');
	$Secret=mysql_result($result,$i,'Secret');
	$SNMP=mysql_result($result,$i,'SNMP');
	$MAC=mysql_result($result,$i,'MAC');
	$j=$i+1;
	echo $j.",".$HWID;
	if ($_POST['DHostname']==1) echo ",".$Hostname;
	if ($_POST['DIP']==1) echo ",".$IP;
	if ($_POST['DMAC']==1) echo ",".$MAC;
	if ($_POST['DTWID']==1) echo ",".$Tower;
	if ($_POST['DSWID']==1) echo ",".$Switch;
	if ($_POST['DPort']==1) echo ",".$PNum;
	if ($_POST['DVLAN']==1) echo ",".$VLAN;
	if ($_POST['DType']==1) echo ",".$Type;
	if ($_POST['DBrand']==1) echo ",".$Brand;
	if ($_POST['DModel']==1) echo ",".$Model;
	if ($_POST['DUsername']==1) echo ",".$Username;
	if ($_POST['DPassword']==1) echo ",".$Password;
	if ($_POST['DSecret']==1) echo ",".$Secret;
	if ($_POST['DSNMP']==1) echo ",".$SNMP;
	 echo "\n";
    }
//----------End Excel output-------------------	
}
else if ($_POST['Output']=='PDF') 
{
	require_once('global/fpdf.php');
	class PDF extends FPDF
{
	// Colored table
function FancyTable($header, $data)
{
    // Colors, line width and bold font
    $this->SetFillColor(255,0,0);
    $this->SetTextColor(255);
    $this->SetDrawColor(128,0,0);
    $this->SetLineWidth(.3);
    $this->SetFont('','B');
    // Header
    $w = array(40, 35, 40, 45);
    for($i=0;$i<count($header);$i++)
        $this->Cell($w[$i],7,$header[$i],1,0,'C',true);
    $this->Ln();
    // Color and font restoration
    $this->SetFillColor(224,235,255);
    $this->SetTextColor(0);
    $this->SetFont('');
    // Data
    $fill = false;
    foreach($data as $row)
    {
        $this->Cell($w[0],6,$row[0],'LR',0,'L',$fill);
        $this->Cell($w[1],6,$row[1],'LR',0,'L',$fill);
        $this->Cell($w[2],6,number_format($row[2]),'LR',0,'R',$fill);
        $this->Cell($w[3],6,number_format($row[3]),'LR',0,'R',$fill);
        $this->Ln();
        $fill = !$fill;
    }
    // Closing line
    $this->Cell(array_sum($w),0,'','T');
}
}
$pdf = new PDF();
// Column headings
$header = array('Country', 'Capital', 'Area (sq km)', 'Pop. (thousands)');
// Data loading
$data = $pdf->LoadData('countries.txt');
$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->FancyTable($header,$data);
$pdf->Output();	
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
									<th  style='width:18px;'>#</th>
									<th>شناسه</th>";
									if ($_POST['DHostname']==1) echo '<th>Hostname</th>';
									if ($_POST['DIP']==1) echo '<th>IP</th>';
									if ($_POST['DMAC']==1) echo '<th>مک آدرس</th>';
									if ($_POST['DTWID']==1) echo '<th>مرکز</th>';
									if ($_POST['DSWID']==1) echo '<th>سوئیچ</th>';
									if ($_POST['DPort']==1) echo '<th>پورت</th>';
									if ($_POST['DVLAN']==1) echo '<th>VLAN</th>';
									if ($_POST['DType']==1) echo '<th>نوع</th>';
									if ($_POST['DBrand']==1) echo '<th>برند</th>';
									if ($_POST['DModel']==1) echo '<th>مدل</th>';
									if ($_POST['DUsername']==1) echo '<th>نام کاربری</th>';
									if ($_POST['DPassword']==1) echo '<th>رمز عبور</th>';
									if ($_POST['DSecret']==1) echo '<th>کلید رمز</th>';
									if ($_POST['DSNMP']==1) echo '<th>SNMP</th>';
									echo "<th style='width: 12px;'>دستورها</th>
								</tr>
								</thead><tbody>";
while ($i < $num) {
	$HWID=mysql_result($result,$i,'HWID');
	$UserID=mysql_result($result,$i,'UserID');
	$Hostname=mysql_result($result,$i,'Hostname');
		$result4=mysql_query("select * from IP where Object='Hardware' and UserID=$HWID"); 
	$array4=mysql_fetch_array($result4);
	$IP=$array4['Oct1'].".".$array4['Oct2'].".".$array4['Oct3'].".".$array4['Oct4'];
	$TWID=mysql_result($result,$i,'TWID');
	$Tower=fdigit(mysql_result(mysql_query("select Name from Tower where TWID=$TWID"),0,'Name'));
	$SWID=mysql_result($result,$i,'SWID');
	$Switch=mysql_result(mysql_query("select Hostname from Switch where SWID=$SWID"),0,'Hostname');
	$TID=mysql_result($result,$i,'TID');
	$result25=mysql_query("select * from Type where TID=$TID");
	$Model=mysql_result($result25,0,'Model');
	$Type=mysql_result($result25,0,'Type');
	$Brand=mysql_result($result25,0,'Brand');
	$Port=mysql_result($result,$i,'Port');
	$PNum=mysql_result(mysql_query("select PNum from Port where PortID=$Port"),0,'PNum');
	$VLAN=mysql_result($result,$i,'VLAN');
	$Username=mysql_result($result,$i,'Username');
	$Password=mysql_result($result,$i,'Password');
	$Secret=mysql_result($result,$i,'Secret');
	$SNMP=mysql_result($result,$i,'SNMP');
	$MAC=mysql_result($result,$i,'MAC');
	$j=$i+1;
	echo "<tr id='tr_".$j."' class='first"; 
	if ($PStart>$j||$j>$PEnd)
	{
		echo " rowhide";
	}
	
	echo "'><td>",fdigit($j),"</td>";
	echo "<td>",fdigit($HWID),"</td>";
	if ($_POST['DHostname']==1) echo "<td>",$Hostname,"</td>";
	if ($_POST['DIP']==1) echo "<td>",$IP,"</td>";
	if ($_POST['DMAC']==1) echo '<td>',$MAC,'</td>';
	if ($_POST['DTWID']==1) echo '<td>',$Tower,'</td>';
	if ($_POST['DSWID']==1) echo '<td>',$Switch,'</td>';
	if ($_POST['DPort']==1) echo '<td>',$PNum,'</td>';
	if ($_POST['DVLAN']==1) echo '<td>',$VLAN,'</td>';
	if ($_POST['DType']==1) echo '<td>',$Type,'</td>';
	if ($_POST['DBrand']==1) echo '<td>',$Brand,'</td>';
	if ($_POST['DModel']==1) echo '<td>',$Model,'</td>';
	if ($_POST['DUsername']==1) echo '<td>',$Username,'</td>';
	if ($_POST['DPassword']==1) echo '<td>',$Password,'</td>';
	if ($_POST['DSecret']==1) echo '<td>',$Secret,'</td>';
	if ($_POST['DSNMP']==1) echo '<td>',$SNMP,'</td>';
	  echo "<td>
		  <div  class='actions' style='width:48px !important;'>
			  <ul>
			  <li><a class='Accopen' id='".$HWID."' href='javascript:ViewHardware(".$HWID.",".$UserID.");' title='مشاهده'></a></li>
				  
			  </ul>
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
