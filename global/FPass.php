<?php 
function __autoload($class_name)
    {
        include_once '../inc/class.' . $class_name . '.inc.php';
    }
require "../global/config.php";
require "../global/functions.php";
require "../lang/".$lang.".php"; 
//-----------Connecting to Database--------
$DBS= new Database;
$DBS->Connect();
$User=$DBS->Escape($_POST['User']);
$DBS->Select('Admin','*',"AUsername='".$User."'");
$AdminID=$DBS->Select_Result[0]['AID'];
$Key=rand();
session_start();
$_SESSION['Key3']=$Key;
$to=$DBS->Select_Result[0]['Email'];echo $to;
$subject = $EmailSubject;
$message = "
مدیرت اسناد لیمو
\r\n
این پیغام به درخواست شما برای تغییر رمز عبور ارسال شده است\r\n
لطفا کد زیر را درون پورتال وارد کرده و رمز عبور جدید را وارد نمایید.\r\n
کلید تائید:
".$Key;
$headers = 'From: '.$EmailAccount . "\r\n" .
    'Reply-To: '.$EmailAccount . "\r\n" .
    'X-Mailer: PHP/' . phpversion().
	'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/plain; charset=UTF-8' . "\r\n";
$sentemail=mail($to, $subject, $message, $headers);
?>
<div >
<p style="color:#03F; "> کلید تائید به آدرس ایمیل شما ارسال شده است. <br />
	لطفا کلید تائید و رمز عبور جدید را وارد نمایید. <br />
	(   لطفا در صورت عدم مشاهده ایمیل پوشه Spam را نیز کنترل نمایید.) </p>
<form id="newpass" method="post">
	<h3>ثبت رمز عبور جدید</h3>
	<div id='Error_Pass' style='margin-left:38px; padding-bottom:12px; display:none;'>
		<ul class='system_messages'>
			<li class='red'><span class='ico'></span><strong class='system_title'>رمز عبور وارده صحیح نیست.</strong></li>
		</ul>
	</div>
	<div id='Error_Key' style='margin-left:38px; padding-bottom:12px; display:none;'>
		<ul class='system_messages'>
			<li class='red'><span class='ico'></span><strong class='system_title'>کلید تائید وارده صحیح نیست.</strong></li>
		</ul>
	</div>
	<input type="hidden" name="User" value="<?php echo $AdminID; ?>"  />
	<div class="row_pass">
		<div class="label_pass">
			<label>کلید تائید:</label>
		</div>
		<span class="input_pass">
		<input  name="Key" type="text"/>
		</span> </div>
	<div class="row_pass">
		<div class="label_pass">
			<label>رمز عبور جدید:</label>
		</div>
		<span class="input_pass">
		<input id="<?php echo $FID.'pass'; ?>" name="Pass" type="password" onblur="Validatepass(this,'<?php echo $FID.'3'; ?>');"/>
		</span> <span id="<?php echo $FID.'3'; ?>" class="system positive" >&nbsp;</span> <span id="<?php echo $FID.'3L'; ?>" class="system negative"  >رمز عبور باید بیشتر از 7 حرف باشد</span> <span id="<?php echo $FID.'3N'; ?>" class="system negative"  >رمز عبور باید شامل حرف و عدد باشد</span> <span id="<?php echo $FID.'3E'; ?>" class="system negative"  >این فیلد نمیتواند خالی باشد</span> </div>
	<div class="row_pass">
		<div class="label_pass">
			<label >تکرار رمز عبور:</label>
		</div>
		<span class="input_pass">
		<input name="Conf" type="password" onblur="Confirmpass(this,'<?php echo $FID.'4'; ?>','<?php echo $FID.'pass'; ?>');"/>
		</span> <span id="<?php echo $FID.'4'; ?>" class="system positive" >&nbsp;</span> <span id="<?php echo $FID.'4'; ?>" class="system negative"  >تکرار رمز عبور نا متقارن است</span> <span id="<?php echo $FID.'4E'; ?>" class="system negative"  >این فیلد نمیتواند خالی باشد</span> </div>
	
	<!--[if !IE]>start row<![endif]-->
	
	<div class="row">
		<div class="inputs small_inputs"> <span class="button2 blue_button unlock_button" ><span onclick="ForgetPass3();"><span><em>تغییر رمز<span class="button_ico"></span></em></span></span>
			<input name="login" type="submit" onclick="a();"/>
			</span> </div>
	</div>
	<!--[if !IE]>end row<![endif]-->
	</div>
	<!--[if !IE]>end forms<![endif]-->
</form>
<!--[if !IE]>end forms<![endif]--> 