<?php 
$id='P13';
$lv='1';
$FID='F13';
include "../global/db.php";
$ID=stripslashes(mysql_real_escape_string($_POST['ID']));
$result=mysql_query("select * from DHardware inner join Hardware on DHardware.ID=Hardware.HWID where HWID=$ID order by DHardware.DHWID");
$num=mysql_num_rows($result);
?>
<!--[if !IE]>start section inner<![endif]-->
  <div class="section_inner" id="tablehardware">
 <!--[if !IE]>start table_wrapper<![endif]-->
  <div class="table_wrapper">
<?php
$i=0;
echo "<div class='table_wrapper_inner'>
							<table cellpadding='0' cellspacing='0' width='100%' id='aaa'>
								<thead><tr>
									<th  style='width:18px;'>#</th>
									<th><a href=' '>Hostname</a></th>
									<th><a href=' '>IP Address</a></th>
									<th><a href=' '>مدل</a></th>
									<th><a href=' '>مرکز</a></th>
									<th><a href=' '>سوئیچ</a></th>
									<th style='width: 12px;'>دستورها</th>
								</tr>
								</thead>";
while ($i < $num) {
	$Hostname=mysql_result($result,$i,'Hostname');
	$HWID=mysql_result($result,$i,'HWID');
	$result4=mysql_query("select * from IP where Object='Hardware' and UserID=$HWID"); 
	$array4=mysql_fetch_array($result4);
	$IP=$array4['Oct1'].".".$array4['Oct2'].".".$array4['Oct3'].".".$array4['Oct4'];
	$Model=mysql_result($result,$i,'Model');
	$Model=mysql_result(mysql_query("select Model from Type where TID=$Model"),0,'Model');
	$TWID=mysql_result($result,$i,'TWID');
	$Tower=mysql_result(mysql_query("select Name from Tower where TWID=$TWID"),0,'Name');
	$SWID=mysql_result($result,$i,'SWID');
	$Switch=mysql_result(mysql_query("select Hostname from Switch where SWID=$SWID"),0,'Hostname');
	$j=$i+1;
	echo "<tbody><tr class='first' id='$HWID'>
	  <td>$j</td>
	  <td>$Hostname</td>
	  <td>$IP</td>
	  <td>$Model</td>
	  <td>$Tower</td>
	  <td>$Switch</td>
	  <td>
		  <div  class='actions' style='width:48px !important;'>
			  <ul>
			  <li><a class='Accopen' id='$SWID' href='javascript:ViewHardware($HWID,$UserID);' title='مشاهده'></a></li>
			  <li><a class='Accdelete' id='$SWID' href='javascript:DelHardware($HWID);' title='پاک کردن' ></a></li>
		  
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
  <!--[if !IE]>end table_wrapper<![endif]--> 
   </div>
  <!--[if !IE]>end section inner<![endif]--> 