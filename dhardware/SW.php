<?php 
$id='P13';
$lv='1';
$FID='F13';
include "../global/db.php";
$TWID=stripslashes(mysql_real_escape_string($_POST['TWID']));
?>
  <label>سوئیج:</label>
        <div class="inputs"> <span class="input_wrapper blank">
          <?php
$query1="select * from Switch where TWID=$TWID";
$result1=mysql_query($query1);
$num=mysql_num_rows($result1);
echo "<select name='SWID' onchange='FillPortHardware(this);'>";
echo "<option>انتخاب کنبد</option>";
	$i=0;
	while ($i < $num) 
		{
	$SName=mysql_result($result1,$i,'Hostname');
	$SWID=mysql_result($result1,$i,'SWID');
	$i++;
	echo "<option value='",$SWID,"'>",$SName,"</option>";
		}
echo "</select>";
?>
          </span> <span class="loading_select" id="Lselect4"></span></div>