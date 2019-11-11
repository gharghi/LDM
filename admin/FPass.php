<?php 
$FID='F14';
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
$to=$DBS->Select_Result[0]['Email'];
$subject = $EmailSubject;
$message = _PASS_EMAIL.$Key;
$headers = 'From: '.$EmailAccount . "\r\n" .
    'Reply-To: '.$EmailAccount . "\r\n" .
    'X-Mailer: PHP/' . phpversion().
	'MIME-Version: 1.0' . "\r\n" . 'Content-type: text/plain; charset=UTF-8' . "\r\n";
$sentemail=mail($to, $subject, $message, $headers);
?>
<div >
<p style="color:#03F; "> <?php echo _PASS_EMAIL_SENT; ?><br />
	<?php echo _ENTER_NEW_PASS; ?><br />
	<?php echo _CHECK_SPAM; ?></p>
<form id="newpass" method="post" action="javascript:ForgetPass3();">
	<h3><?php echo _REG_NEW_PASS; ?></h3>
	<div id='Error_Pass' style='margin-left:38px; padding-bottom:12px; display:none;'>
		<ul class='system_messages'>
			<li class='red'><span class='ico'></span><strong class='system_title'><?php echo _CHANGE_PASS_ERROR; ?></strong></li>
		</ul>
	</div>
	<div id='Error_Key' style='margin-left:38px; padding-bottom:12px; display:none;'>
		<ul class='system_messages'>
			<li class='red'><span class='ico'></span><strong class='system_title'><?php echo _CHANGE_KEY_ERROR; ?></strong></li>
		</ul>
	</div>
	<input type="hidden" name="User" value="<?php echo $AdminID; ?>"  />
	<div class="row_pass">
		<div class="label_pass">
			<label><?php echo _CHANGE_KEY; ?>:</label>
		</div>
		<span class="input_pass">
		<input  name="Key" type="text"/>
		</span> </div>
	<div class="row_pass">
		<div class="label_pass">
			<label><?php echo _CHANGE_NEW_PASS; ?>:</label>
		</div>
		<span class="input_pass">
		<input id="<?php echo $FID.'pass'; ?>" name="Pass" type="password" onblur="Validatepass(this,'<?php echo $FID.'3'; ?>');"/>
		</span> <span id="<?php echo $FID.'3'; ?>" class="system positive" >&nbsp;</span> <span id="<?php echo $FID.'3L'; ?>" class="system negative"  ><?php echo _CHANGE_PASS_LEN; ?></span> <span id="<?php echo $FID.'3N'; ?>" class="system negative"  ><?php echo _CHANGE_PASS_COMP; ?></span> <span id="<?php echo $FID.'3E'; ?>" class="system negative"  ><?php echo _CHANGE_PASS_EMPTY; ?></span> </div>
	<div class="row_pass">
		<div class="label_pass">
			<label ><?php echo _CHANGE_CONF_PASS; ?>:</label>
		</div>
		<span class="input_pass">
		<input name="Conf" type="password" onblur="Confirmpass(this,'<?php echo $FID.'4'; ?>','<?php echo $FID.'pass'; ?>');"/>
		</span> <span id="<?php echo $FID.'4'; ?>" class="system positive" >&nbsp;</span> <span id="<?php echo $FID.'4'; ?>" class="system negative"  ><?php echo _CHANGE_PASS_NOT_COMPAT; ?></span> <span id="<?php echo $FID.'4E'; ?>" class="system negative"  ><?php echo _CHANGE_PASS_EMPTY; ?></span> </div>
	
	<!--[if !IE]>start row<![endif]-->
	
	<div class="row">
		<div class="inputs small_inputs marginbtn"> <span class="button2 blue_button unlock_button" ><span onclick="ForgetPass3();"><span><em><?php echo _CHANGE_CHANGE_PASS; ?><span class="button_ico"></span></em></span></span>
			<input name="login" type="submit" />
			</span> </div>
	</div>
	<!--[if !IE]>end row<![endif]-->
	</div>
	<!--[if !IE]>end forms<![endif]-->
</form>
<!--[if !IE]>end forms<![endif]--> 