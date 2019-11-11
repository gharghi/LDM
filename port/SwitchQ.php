<!--[if !IE]>start table_wrapper<![endif]-->
<div class="table_wrapper">
<?php
$id='P19';
$lv='1';
$FID='F19';
include "../global/db.php";
$SWID=stripslashes(mysql_real_escape_string($_POST['SWID']));
$query="select * from Port where SWID=$SWID order by PNum";
$result=mysql_query($query);
$num=mysql_num_rows($result);
$i=0;
echo "<div class='table_wrapper_inner'>
							<table cellpadding='0' cellspacing='0' width='100%' id='aaa'>
								<thead><tr>
									<th  style='width:10px;'>#</th>
									<th  style='width:148px;'>نام سوئیچ</th>
									<th style='width:12px;'>پورت</th>
									<th style='width:12px;'>VLAN</th>
									<th>توضیحات</th>
									<th style='width: 12px;'>دستورها</th>
									<th style='width: 12px;'>وضعیت</th>
								
								</tr>
								</thead><tbody>";
while ($i < $num) {
	$SWID=mysql_result($result,$i,'SWID');
	$Switch=mysql_result(mysql_query("select Hostname from Switch where SWID=$SWID"),'Hostname');
	$PNum=mysql_result($result,$i,'PNum');
	$Describ=mysql_result($result,$i,'Describ');
	$PortID=mysql_result($result,$i,'PortID');
	$Atct=mysql_result($result,$i,'Active');
	$Active=mysql_result($result,$i,'Active');
	$VLAN=mysql_result($result,$i,'VLAN');
	if ($Atct==1) $Atct='<span style="color:red !important;">فعال</span>'; else if ($Atct==0) $Atct='<span style="color:green !important;">آزاد</span>'; else if ($Atct==2) $Atct='<span style="color:#fea703 !important;">خراب</span>';
	$j=$i+1;
	echo "<tr class='first' id='$PortID'>
									<td>$j</td>
									<td>$Switch</td>
									<td>$PNum</td>
									<td>$VLAN</td>
									<td id='portdisabled_describ".$PortID."'>$Describ</td>
 <td><div  class='actions' style='width:18px !important;'>
			  <ul>"; 
			  if ($Active==2)
			  { 
			  echo "<li id='portdisabled".$PortID."' ><a class='Accok' id='$".$PortID."' href='javascript:EnablePort(".$PortID.");' title='فعال' ></a></li>"; 
			  }
			  else if ($Active!=1&&$Active!=2)
			  {
			   echo "<li id='portdisabled".$PortID."' ><a class='Accdelete' id='$SWID' href='javascript:DisablePort($PortID);' title='غیر فعال' ></a></li>";
			   
			  }
			  else echo "<li></li>";
			  echo "
			  
				  
			  </ul>
		  </div>
	  </td>
									<td id='portstatus".$PortID."'>$Atct</td>
									
								</tr>";
	$i++;
	}	
?>
      </tbody>
      </table>
    </div>
  <!--[if !IE]>end table_wrapper<![endif]--> 
