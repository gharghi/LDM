<?php
$id='P22';
$lv='1';
include "../global/db.php";
$TKID=stripslashes(mysql_real_escape_string($_GET['TKID']));
$TLID=stripslashes(mysql_real_escape_string($_GET['TLID']));
$result=mysql_query("select * from Ticket where TKID=$TKID");
$array=mysql_fetch_array($result);
$UserID=$array['UserID'];
$result2=mysql_query("select * from User where UserID=".$UserID);
$array2=mysql_fetch_array($result2);
$result4=mysql_query("select * from TicketLog where TKID=".$TKID);
$array4=mysql_fetch_array($result4);
$result5=mysql_query("select Name from Admin where AID=".$array4['RcID']);
$array5=mysql_fetch_array($result5);
$RcID=$array4['RcID'];
$TLID=$array4['TLID'];
if (!empty($_GET['TLID'])&&($AID==$RcID))
{
	$result=mysql_query("update TicketLog set Read1=$AID where TLID=$TLID");

}

?>
<!--[if !IE]>start table_wrapper<![endif]-->
<div class="Table_Print" id="Table_Print">

<div class="table_wrapper">
<div class='table_wrapper_inner'>
	<table cellpadding='0' cellspacing='0' width='100%' id='aaa'>
		<thead>
			<tr>
				<th colspan="4">فرم رفع اشکال </th>
			</tr>
		</thead>
		<tbody>
			<tr >
				<td colspan="3" ><span class="IN_Table">نام مشترک: </span>  <?php echo $array2['Name']; ?></td>
				<td><span class="IN_Table">شماره فرم: </span>  <?php echo fdigit($TKID); ?></td>
			</tr>
			<tr >
				<td colspan="2"><span class="IN_Table">نام و نام خانوادگی رابط: </span><?php echo $array2['Resp']; ?></td>
				<td><span class="IN_Table">تلفن همراه: </span><?php echo fdigit($array2['Mob']); ?></td>
				<td> <span class="IN_Table">پهنای باند: </span><?php echo fdigit($array2['BW']); ?> مگابایت</td>
			</tr>
			<tr>
				<td colspan="4"><span class="IN_Table">آدرسها: </span><?php $query="select * from IP where UserID=$UserID and Object='User' order by IPID desc";
$result=mysql_query($query);
$num=mysql_num_rows($result);
if ($num==0)
{
	echo "<span>هیچ آدرسی به کاربر اختصتص نیافته است!</span>";
	exit;	
}

$i=0;

								
while ($i < $num) {
	
	$IPID=mysql_result($result,$i,'IPID');
	$Oct1=mysql_result($result,$i,'Oct1');
	$Oct2=mysql_result($result,$i,'Oct2');
	$Oct3=mysql_result($result,$i,'Oct3');
	$Oct4=mysql_result($result,$i,'Oct4');
	$CIDR=mysql_result($result,$i,'CIDR');
	if ($Oct4%(pow(2,(32-$CIDR)))==0){
	echo "<input type='hidden' name='IPID".$i."' value='$IPID'>";
	echo "--
									
									$Oct1.$Oct2.$Oct3.$Oct4/$CIDR
								";
	}
	$i++;
	}
	echo "--";
	 ?>	</td>
				
			</tr>
			
			<tr >
				<td colspan="3"><span class="IN_Table">آدرس: </span><?php echo fdigit($array2['Address']); ?></td>
				<td><span class="IN_Table"> تاریخ: </span><?php echo fdigit($array['Date']); ?> </td>
			</tr>
			<tr >
				<td colspan="4"><span class="IN_Table">مشکل عنوان شده: </span><?php echo $array['Problem']; ?></td>
			</tr>
			<tr >
				<td colspan="4"><span class="IN_Table">توضیحات:</span> <?php echo $array['Descr']; ?></td>
			</tr>
			<tr >
				<td colspan="4"><span class="IN_Table">کارشناس: </span> <?php echo $array5['Name']; ?></td>
			</tr>
			</tbody>
		
	</table>
</div>
<!--[if !IE]>end table_wrapper<![endif]--> 
</div>
</div>
<br>
<!--[if !IE]>start row<![endif]-->
						<div class="row" id="Print_Button">
							<div class="inputs"> <span class="button2 blue_button print_button"><span><span><span class="button_ico"></span><em id="Button_Value">چاپ</em></span></span>
								<input name="submit" type="submit" onclick="printDiv('Table_Print'); return false;"/>
								</span> <span class="loading_button"></span> </div>
						</div>
						<!--[if !IE]>end row<![endif]-->
