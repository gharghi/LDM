<?php
$id='P11';
$lv='1';
$FID='F11';
include "../global/db.php";
$Order=stripslashes(mysql_real_escape_string($_POST['Order']));
if ($_POST['DESC']==1)
	$DE='DESC';	
else $DE='ASC';
$Limit=stripslashes(mysql_real_escape_string($_POST['Limit']));
if ($_POST['Status']==1)
	{
		$Status="and Status=1";
	}
else if ($_POST['Status']==0)
	{
		$Status="and Status=0";
	}
	else $Status=" ";
$DB=new Database;
$DB->Connect();
$DB->Select('User','*',"Searchable=1 ".SearchEqual(Name)." ".SearchEqual(Email)." ".SearchEqual(Cont)." ".SearchEqual(Tel)." ".SearchEqual(Mob)." ".SearchEqual(Resp)." ".SearchEqual(BW)." ".SearchEqual(Address)." ".SearchEqual(Descrip)." ".$Status." and NDeleted=1",$Order." ".$DE);
$num=$DB->Select_Rows;
if ($num==0)
{
	echo "<p style='color:red;'>",_SEARCH_NORESULT,"</p>";
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
$filename = "Users";
header('Content-Encoding: UTF-8');
header('Content-type: text/csv; charset=UTF-8');
header('Content-Disposition: attachment; filename="'.$filename.'.csv'.'"'); 
echo "\xef\xbb\xbf";
    echo '#,',_SEARCH_ID;
	if ($_POST['DName']==1) echo ','._SEARCH_NAME;
	if ($_POST['DLatName']==1) echo ','._SEARCH_REG_NAME;
	if ($_POST['DCont']==1) echo ','._SEARCH_CONT;
	if ($_POST['DResp']==1) echo ','._SEARCH_RESP;
	if ($_POST['DLatResp']==1) echo ','._SEARCH_REG_RESP;
	if ($_POST['DEmail']==1) echo ','._SEARCH_EMAIL;
	if ($_POST['DTel']==1) echo ','._SEARCH_TEL;
	if ($_POST['DMob']==1) echo ','._SEARCH_MOB;
	if ($_POST['DBW']==1) echo ','._SEARCH_BW;
	if ($_POST['DStatus']==1) echo ','._SEARCH_STATUS;
	if ($_POST['DAddress']==1) echo ','._SEARCH_ADDRESS;
	if ($_POST['DLatAddress']==1) echo ','._SEARCH_REG_ADDRESS;
	if ($_POST['DDescrip']==1) echo ','._SEARCH_DESCR;
	echo "\n";
	if ($Limit<$num) $num=$Limit;
    for($i=0; $i<$num; $i++)
    {
	$UserID=$DB->Select_Result[$i]['UserID'];
	$Name=$DB->Select_Result[$i]['Name'];
	$LatName=$DB->Select_Result[$i]['LatName'];
	$Cont=$DB->Select_Result[$i]['Cont'];
	$Resp=$DB->Select_Result[$i]['Resp'];
	$LatResp=$DB->Select_Result[$i]['LatResp'];
	$Email=$DB->Select_Result[$i]['Email'];
	$Tel=$DB->Select_Result[$i]['Tel'];
	$Mob=$DB->Select_Result[$i]['Mob'];
	$BW=$DB->Select_Result[$i]['BW'];
	$Status=$DB->Select_Result[$i]['Status'];if ($Status==1) $Status=_USER_ACTIVE; else if ($Status==0) $Status=_USER_DISABLE; 
	$Address=$DB->Select_Result[$i]['Address'];
	$LatAddress=$DB->Select_Result[$i]['LatAddress'];
	$Descrip=$DB->Select_Result[$i]['Descrip'];
	$j=$i+1;
	echo $j.",".$UserID;
	if ($_POST['DName']==1) echo ",",$Name;
	if ($_POST['DLatName']==1) echo ",",$LatName;
	if ($_POST['DCont']==1) echo ",",$Cont;
	if ($_POST['DResp']==1) echo ',',$Resp;
	if ($_POST['DLatResp']==1) echo ',',$LatResp;
	if ($_POST['DEmail']==1) echo ',',$Email;
	if ($_POST['DTel']==1) echo ',',$Tel;
	if ($_POST['DMob']==1) echo ',',$Mob;
	if ($_POST['DBW']==1) echo ',',$BW ,' مگا بیت';
	if ($_POST['DStatus']==1) echo ',',$Status;
	if ($_POST['DAddress']==1) echo ',',$Address;
	if ($_POST['DLatAddress']==1) echo ',',$LatAddress;
	if ($_POST['DDescrip']==1) echo ',',$Descrip;
	echo "\n";
    }
//----------End Excel output-------------------	
}
else if ($_POST['Output']=='PDF') 
{
$i=0;
$html="
<div class='title_wrapper' >
<h2>"._SEARCH_RESULT."</h2>
<a  class='view_all_orders'>"._SEARCH_ALLRECORDS.": ".$num."</a>
</div>
<div class='table_wrapper'>
<div class='table_wrapper_inner2'>
<table cellpadding='0' cellspacing='0' width='100%' id='aaa'>
<thead><tr>
<th  style='width:18px;'><a  >#</a></th>
<th><a>"._SEARCH_ID."</a></th>";
if ($_POST['DName']==1) $html.= '<th><a  >'._SEARCH_NAME.'</a></th>';
if ($_POST['DLatName']==1) $html.= '<th><a  >'._SEARCH_REG_NAME.'</a></th>';
if ($_POST['DCont']==1) $html.= '<th><a >'._SEARCH_CONT.'</a></th>';
if ($_POST['DResp']==1) $html.= '<th><a  >'._SEARCH_RESP.'</a></th>';
if ($_POST['DLatResp']==1) $html.= '<th><a  >'._SEARCH_REG_RESP.'</a></th>';
if ($_POST['DEmail']==1) $html.= '<th><a >'._SEARCH_EMAIL.'</a></th>';
if ($_POST['DTel']==1) $html.= '<th><a >'._SEARCH_TEL.'</a></th>';
if ($_POST['DMob']==1) $html.= '<th><a >'._SEARCH_MOB.'</a></th>';
if ($_POST['DBW']==1) $html.= '<th><a >'._SEARCH_BW.'</a></th>';
if ($_POST['DStatus']==1) $html.= '<th><a  >'._SEARCH_STATUS.'</a></th>';
if ($_POST['DAddress']==1) $html.= '<th><a  >'._SEARCH_ADDRESS.'</a></th>';
if ($_POST['DLatAddress']==1) $html.= '<th><a >'._SEARCH_REG_ADDRESS.'</a></th>';
if ($_POST['DDescrip']==1) $html.= '<th><a >'._SEARCH_DESCR.'</a></th>';
$html.= "</tr>
</thead><tbody>";
if ($Limit<$num) $num=$Limit;
while ($i < $num) {
$UserID=$DB->Select_Result[$i]['UserID'];
$Name=$DB->Select_Result[$i]['Name'];
$Cont=$DB->Select_Result[$i]['Cont'];
$Resp=$DB->Select_Result[$i]['Resp'];
$Tel=$DB->Select_Result[$i]['Tel'];
$Mob=$DB->Select_Result[$i]['Mob'];
$BW=$DB->Select_Result[$i]['BW'];
$LatName=$DB->Select_Result[$i]['LatName'];
$LatAddress=$DB->Select_Result[$i]['LatAddress'];
$LatResp=$DB->Select_Result[$i]['LatResp'];
$Email=$DB->Select_Result[$i]['Email'];
$Status=$DB->Select_Result[$i]['Status']; if ($Status==1) $Status='<span style="color:#74A436;">'._USER_ACTIVE.'</span>'; else if ($Status==0) $Status='<span style="color:red;">'._USER_DISABLE.'</span>';
$Address=$DB->Select_Result[$i]['Address'];
$Descrip=$DB->Select_Result[$i]['Descrip'];
$j=$i+1;
$html.= "<tr id='tr_".$j."' class='first"; 


$html.= "'><td>".$j."</td>";
$html.= "<td>".$UserID."</td>";
if ($_POST['DName']==1) $html.= "<td>".$Name."</td>";
if ($_POST['DLatName']==1) $html.= "<td>".$LatName."</td>";
if ($_POST['DCont']==1) $html.= "<td>".$Cont."</td>";
if ($_POST['DResp']==1) $html.= '<td>'.$Resp.'</td>';
if ($_POST['DLatResp']==1) $html.= '<td>'.$LatResp.'</td>';
if ($_POST['DEmail']==1) $html.= '<td>'.$Email.'</td>';
if ($_POST['DTel']==1) $html.= '<td>'.$Tel.'</td>';
if ($_POST['DMob']==1) $html.= '<td>'.$Mob.'</td>';
if ($_POST['DBW']==1) $html.= '<td>'.$BW .' مگا بیت</td>';
if ($_POST['DStatus']==1) $html.= '<td>'.$Status.'</td>';
if ($_POST['DAddress']==1) $html.= '<td>'.$Address.'</td>';
if ($_POST['DLatAddress']==1) $html.= '<td>'.$LatAddress.'</td>';
if ($_POST['DDescrip']==1) $html.= '<td>'.$Descrip.'</td>';
$html.= "<td>
 </td>
  </tr>";
	$i++;
	}		
	$html.="
    </tbody>
    </table>
</div>";					

echo html_to_pdf($html);
	}
else {
?>
<script language="javascript">
$(document).ready(function() { 
     $("#aaa").tablesorter(); 	
});
</script>
  <div class="title_wrapper">
						<h2><?php echo _SEARCH_RESULT; ?> </h2>
						<a href="javascript:View_All_Records();" class="view_all_orders"><?php echo _SEARCH_ALLRECORDS; ?>: <?php echo $num; ?></a>
					</div>
  <!--[if !IE]>start table_wrapper<![endif]-->
  <div class="table_wrapper">
    <?php
$i=0;
echo "<div class='table_wrapper_inner2'>
							<table cellpadding='0' cellspacing='0' width='100%' id='aaa'>
								<thead><tr>
									<th  style='width:18px;'><a  href='javascript:void(0);'>#</a></th>
									<th><a  href='javascript:void(0);'>"._SEARCH_ID."</a></th>";
									if ($_POST['DName']==1) echo '<th><a  href="javascript:void(0);">'._SEARCH_NAME.'</a></th>';
									if ($_POST['DLatName']==1) echo '<th><a  href="javascript:void(0);">'._SEARCH_REG_NAME.'</a></th>';
									if ($_POST['DCont']==1) echo '<th><a  href="javascript:void(0);">'._SEARCH_CONT.'</a></th>';
									if ($_POST['DResp']==1) echo '<th><a  href="javascript:void(0);">'._SEARCH_RESP.'</a></th>';
									if ($_POST['DLatResp']==1) echo '<th><a  href="javascript:void(0);">'._SEARCH_REG_RESP.'</a></th>';
									if ($_POST['DEmail']==1) echo '<th><a  href="javascript:void(0);">'._SEARCH_EMAIL.'</a></th>';
									if ($_POST['DTel']==1) echo '<th><a  href="javascript:void(0);">'._SEARCH_TEL.'</a></th>';
									if ($_POST['DMob']==1) echo '<th><a  href="javascript:void(0);">'._SEARCH_MOB.'</a></th>';
									if ($_POST['DBW']==1) echo '<th><a  href="javascript:void(0);">'._SEARCH_BW.'</a></th>';
									if ($_POST['DStatus']==1) echo '<th><a  href="javascript:void(0);">'._SEARCH_STATUS.'</a></th>';
									if ($_POST['DAddress']==1) echo '<th><a  href="javascript:void(0);">'._SEARCH_ADDRESS.'</a></th>';
									if ($_POST['DLatAddress']==1) echo '<th><a  href="javascript:void(0);">'._SEARCH_REG_ADDRESS.'</a></th>';
									if ($_POST['DDescrip']==1) echo '<th><a  href="javascript:void(0);">'._SEARCH_DESCR.'</a></th>';
									
									echo "<th style='width: 12px;'>"._SEARCH_COMANDS."</th>
								</tr>
								</thead><tbody>";
while ($i < $num) {
	$UserID=$DB->Select_Result[$i]['UserID'];
	$Name=$DB->Select_Result[$i]['Name'];
	$Cont=$DB->Select_Result[$i]['Cont'];
	$Resp=$DB->Select_Result[$i]['Resp'];
	$Tel=$DB->Select_Result[$i]['Tel'];
	$Mob=$DB->Select_Result[$i]['Mob'];
	$BW=$DB->Select_Result[$i]['BW'];
	$LatName=$DB->Select_Result[$i]['LatName'];
	$LatAddress=$DB->Select_Result[$i]['LatAddress'];
	$LatResp=$DB->Select_Result[$i]['LatResp'];
	$Email=$DB->Select_Result[$i]['Email'];
	$Status=$DB->Select_Result[$i]['Status']; if ($Status==1) $Status='<span style="color:#74A436;">'._USER_ACTIVE.'</span>'; else if ($Status==0) $Status='<span style="color:red;">'._USER_DISABLE.'</span>';
	$Address=$DB->Select_Result[$i]['Address'];
	$Descrip=$DB->Select_Result[$i]['Descrip'];
	
	$j=$i+1;
	echo "<tr id='tr_".$j."' class='first"; 
	if ($PStart>$j||$j>$PEnd)
	{
		echo " rowhide";
	}
	
	echo "'><td>",$j,"</td>";
	echo "<td>",$UserID,"</td>";
	if ($_POST['DName']==1) echo "<td>",$Name,"</td>";
if ($_POST['DLatName']==1) echo "<td>",$LatName,"</td>";
	if ($_POST['DCont']==1) echo "<td>",$Cont,"</td>";
	if ($_POST['DResp']==1) echo '<td>',$Resp,'</td>';
	if ($_POST['DLatResp']==1) echo '<td>',$LatResp,'</td>';
	if ($_POST['DEmail']==1) echo '<td>',$Email,'</td>';
	if ($_POST['DTel']==1) echo '<td>',$Tel,'</td>';
	if ($_POST['DMob']==1) echo '<td>',$Mob,'</td>';
	if ($_POST['DBW']==1) echo '<td>',$BW ,' مگا بیت</td>';
	if ($_POST['DStatus']==1) echo '<td>',$Status,'</td>';
	if ($_POST['DAddress']==1) echo '<td>',$Address,'</td>';
	if ($_POST['DLatAddress']==1) echo '<td>',$LatAddress,'</td>';
	if ($_POST['DDescrip']==1) echo '<td>',$Descrip,'</td>';
	  echo "<td>
		  <div  class='actions' style='width:48px !important;'>
			  <ul>
			  <li><a class='Accopen' id='".$UserID."' href='javascript:loaduserprofile(".$UserID.");' title='"._SEARCH_VIEW."'></a></li>
				  
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
<span class="page_no">
<span> <?php echo _PAGINATION_PAGE; ?> </span><span id="page_no_first">1 </span><span> <?php echo _PAGINATION_FROM; ?> </span><span> <?php echo $Pages; ?></span></span> 
<span class="page_no2"> 
<span><?php $End_First=$Limit+1; echo "<a href='javascript:Pagination(1,1,".$End_First.",".$Pages.");' class='pag_space'>   "._PAGINATION_FIRST."  </a>"?></span>  
<span id='PA0' class="phide"><?php echo "..."; ?></span> 
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
	echo "'>   ".$k."  </a></span>";
	$St=$St+$Limit;
	$Ed=$Ed+$Limit;
}
$St=$St-$Limit;
$Ed=$Ed-$Limit;
$k--;
?>
<?php if ($Pages>6) echo "<span id='PAE'>...</span> "; ?>
<?php echo "<span id='PA'".$k."><a href='javascript:Pagination(".$k.",".$St.",".$Ed.",".$Pages.");' class='pag_space'>   "._PAGINATION_LAST."  </a>"?></span> 
</span>
<?php
}
?>