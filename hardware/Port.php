<?php 
$id='P13';
$lv='1';
include "../global/db.php";
$SWID=stripslashes(mysql_real_escape_string($_POST['SWID']));
?>
  <label>پورت:</label>
        <div class="inputs"> <span class="input_wrapper blank">
          <?php
$query1="select * from Port where SWID=$SWID and Active=0";
$result1=mysql_query($query1);
$num=mysql_num_rows($result1);
echo "<select name='Port'>";
	$i=0;
	while ($i < $num) 
		{
	$PNum=mysql_result($result1,$i,'PNum');
	$PortID=mysql_result($result1,$i,'PortID');
	$i++;
	echo "<option value='",$PortID,"'>",fdigit($PNum),"</option>";
		}
echo "</select>";
?>
          </span> </div>