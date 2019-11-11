<?php
$id='P12';
$lv='2';
include "../global/db.php";
$Size=stripslashes(mysql_real_escape_string($_POST['Size']));
?>
<label>محدوده آدرسها:</label>
<div class="thin_input"> <span class="input_wrapper blank  medium_input">
<select name="PID" onchange="AddIP2(this,'<?php echo $Size; ?>');" style='text-align:left; direction:ltr;'>
<option selected></option>
<?php
$DB=new Database;
$DB->Connect();
$DB->Select('Prefix','*',$Size=1);
$num=$DB->Select_Rows;
$i=0;
$c=1;
	while ($i < $num) {
	$PID=$DB->Select_Result[$i]["PID"];
	$Oct1=$DB->Select_Result[$i]["Oct1"];
	$Oct2=$DB->Select_Result[$i]["Oct2"];
	$Oct3=$DB->Select_Result[$i]["Oct3"];
	$DB->Disconnect();
	$DB2=new Database;
	$DB2->Connect();
	$DB2->Select('IP','count(IPID) as Fil','Oct1='.$Oct1.' and Oct2='.$Oct2.' and Oct3='.$Oct3);
	$Fil=$DB2->Select_Result[$i]['Fil'];  
if ($Fil<256)
{
	echo "<option style='text-align:left; direction:ltr;' value='",$PID,"'>",$Oct1.".".$Oct2.".".$Oct3.".X","</option>";
}
	$c++;
	$i++;
	}	
?>
  </select>
  </span> </div>