<?php
$id='P13';
$lv='1';
$FID='F13';
include "../global/db.php";
$Brand=stripslashes(mysql_real_escape_string($_POST['Brand']));
$Type=stripslashes(mysql_real_escape_string($_POST['Type']));
?>
        <label>مدل:</label>
        <div class="inputs"> <span class="input_wrapper blank">
          <?php
$query1="select TID,Model from Type where Brand='$Brand' and Type='$Type'";
$result1=mysql_query($query1);
$num2=mysql_num_rows($result1);
echo "<select name='Model'>";
	$i=0;
	while ($i < $num2) 
		{
	$Model=mysql_result($result1,$i,'Model');
	$TID=mysql_result($result1,$i,'TID');
	$i++;
	echo "<option value='",$TID,"'>",$Model,"</option>";
		}
echo "</select>";
?>
          </span> </div>
 