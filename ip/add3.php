<?php
$id='P12';
$lv='2';
include "../global/db.php";
$PID=stripslashes(mysql_real_escape_string($_POST['PID']));
$subnet=stripslashes(mysql_real_escape_string($_POST['CIDR']));
?> 
 <label>آدرسها:</label>
 <div class="thin_input"> <span class="input_wrapper blank  medium_input">
          <select name="Oct4"  style='text-align:left; direction:ltr;'>
          <option value="b" selected></option>
<?php
$DB=new Database;
$DB->Connect();
$DB->Select('Prefix','*','PID='.$PID);
$Oct1=$DB->Select_Result[0]['Oct1'];
$Oct2=$DB->Select_Result[0]['Oct2'];
$Oct3=$DB->Select_Result[0]['Oct3'];
$DB2=new Database;
$DB2->Connect();
$DB2->Select('IP','Oct4','Oct1='.$Oct1.' and Oct2='.$Oct2.' and Oct3='.$Oct3);
$num=$DB2->Select_Rows;
array($array2);
for ($i=0;$i<$num;$i++)
{
	$array2[$i]=$DB2->Select_Result[$i]['Oct4'];	
}
$max=254;
$size=$subnet;
$FCIDR=pow(2,(32-$size));
$i=0;
if ($i==0&&$size==32) {
	$i=1;
	$max=255;
}
while ($i < $max)
	{
	$n=0;
	for ($j=$i;$j<=($i+$FCIDR)-1;$j++)
		{	
			unset($key);
			$key = array_search($j , $array2);
			if (empty($key))	$n++;
		}
	if ($n==$FCIDR)
	 echo "<option value=",$i," >",$Oct1,".",$Oct2,".",$Oct3,".",$i,"/",$size,"</option>";
	$i=$i+$FCIDR;
	}
?>   
          </select>
          </span> </div> 