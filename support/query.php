<?php
$id='P22';
$lv='1';
include "../global/db.php";
extract($_POST);
$Name=stripslashes(mysql_real_escape_string($Username));
$result=mysql_query("select * from User where Name='$Name'");
$array=mysql_fetch_array($result);
if (!$result)
{
	echo 5;
	echo mysql_error();
	exit;
}
$UserID=$array['UserID'];
$Name=$array['Name'];
$Cont=$array['Cont'];
$Status=$array['Status'];
$Descrip=$array['Descrip'];
$Address=$array['Address'];
$BW=$array['BW'];
$Email=$array['Email'];
$Mob=$array['Mob'];
$Tel=$array['Tel'];
$Resp=$array['Resp'];

echo "
<input type='hidden' name='UserID' value='$UserID'>
";


?>
<div class="Print_Info">

<div class="Print_Row">
<span class="Print_Info_Label">نام کاربر:</span><span><span class="Print_Info_Value"><?php echo fdigit($Name); ?></span></span>
</div>
<div class="Print_Row">
<span class="Print_Info_Label">شماره قرارداد:</span><span><span class="Print_Info_Value"><?php echo fdigit($Cont); ?></span></span>
</div>
<div class="Print_Row">
<span class="Print_Info_Label">نماینده:</span><span><span class="Print_Info_Value"><?php echo fdigit($Resp); ?></span></span>
</div>
<div class="Print_Row">
<span class="Print_Info_Label">تلفن:</span><span><span class="Print_Info_Value"><?php echo fdigit($Tel); ?></span></span>
</div>
<div class="Print_Row">
<span class="Print_Info_Label">موبایل:</span><span><span class="Print_Info_Value"><?php echo fdigit($Mob); ?></span></span>
</div>
<div class="Print_Row">
<span class="Print_Info_Label">پست الکترونیک:</span><span><span class="Print_Info_Value"><?php echo $Email; ?></span></span>
</div>
<div class="Print_Row">
<span class="Print_Info_Label">پهنای باند:</span><span><span class="Print_Info_Value"><?php echo fdigit($BW); ?>&nbsp;مگا بیت</span></span>
</div>
<div class="Print_Row">
<span class="Print_Info_Label">آدرس:</span><span><span class="Print_Info_Value"><?php echo fdigit($Address); ?></span></span>
</div>
<div class="Print_Row">
<span class="Print_Info_Label">توضیحات:</span><span><span class="Print_Info_Value"><?php echo fdigit($Descrip); ?></span></span>
</div>
<div class="Print_Row" id="IP_Result">
<span class="Print_Info_Label"></span><span>
<span id="Dedicate_Button" style="cursor:pointer; margin-right:10px;" onClick="Load_IP(<?php echo $UserID; ?>);"><img src="css/layout/retrieve.png" />مشاهده آدرسهای کاربر</span> </span>
</div>
</div>

        