<?php
$id='P13';
$lv='1';
$FID='F13';
include "../global/db.php";
$Name=stripslashes(mysql_real_escape_string($_POST['Name']));
?>
        <label>نوع:</label>
        <div class="inputs"> <span class="input_wrapper blank">
          <?php
$query1="select Brand from Type where Type='$Name'";
$result1=mysql_query($query1);
$num2=mysql_num_rows($result1);
echo "<select name='Brand'>";
	$i=0;
	while ($i < $num2) 
		{
	$Brand=mysql_result($result1,$i,'Brand');
	$i++;
	echo "<option value='",$Brand,"'>",$Brand;
		}
echo "</select>";
?>
          </span><span class="loading_select" id="Lselect2"></span> </div>
 