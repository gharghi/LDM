<?php
$id='P22';
$lv='1';
include "../global/db.php";
?>
 <!--[if !IE]>start table_wrapper<![endif]-->
  <div class="table_wrapper">
<?php
$result2=mysql_query("select * from TicketLog A inner join Ticket B on A.TKID=B.TKID where A.RcID=$AID and B.CLose=0");
$num=mysql_num_rows($result2);
$i=0;
echo "<div class='table_wrapper_inner'>
							<table cellpadding='0' cellspacing='0' width='100%' id='aaa'>
								<thead><tr>
									<th  style='width:18px;'>#</th>
									<th><a href=' '>شماره تیکت</a></th>
									<th><a href=' '>نوع درخواست</a></th>
									<th><a href=' '>فرستنده</a></th>
									<th style='width: 12px;'>دستورها</th>
								</tr>
								</thead><tbody>";
while ($i < $num) {
	$MRead=0;
	$TKID=mysql_result($result2,$i,'TKID');
	$TLID=mysql_result($result2,$i,'TLID');
	$result=mysql_query("select * from Ticket where TKID=$TKID");
	$Request=mysql_result($result,0,'Request');
	if ($Request==1) $Requestt='پشتیبانی';
	else if ($Request==2) $Requestt='بازدید';
	else if ($Request==3) $Requestt='تغییر پهنای باند';
	$SnID=mysql_result($result2,0,'SnID');
	$Read=mysql_result($result2,$i,'Read1');
	if ($Read==$AID) $MRead=1;
	$result3=mysql_query("select Name from Admin where AID=$SnID");
	$array5=mysql_fetch_array($result3);
	$SnID=$array5['Name'];
	$j=$i+1;
	echo "<tr class='first' id='LK".$TLID."'"; if($MRead==0) echo " style='color:red;'"; echo ">
	  <td>$j</td>
	  <td>$TKID</td>
	  <td>$Requestt</td>
	  <td>$SnID</td>
	  <td>
		  <div  class='actions' style='width:48px !important;'>
			  <ul>
			  <li><a class='Accopen' id='$TLID' href='javascript:ViewTicket($Request,$TKID,$TLID);' title='مشاهده'></a></li>
			  <li><a class='Accdelete' id='$TLID' href='javascript:CloseTicket($Request,$TKID,$TLID);' title='بستن'></a></li>
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