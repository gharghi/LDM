<?php
$id='P16';
$lv='5';
$FID='F163';
include "../global/db.php";
$NAID=$Password=stripslashes(mysql_real_escape_string($_POST['AID']));
$query="select Name from Admin where AID=$NAID";
$result=mysql_query($query);
$array=mysql_fetch_array($result);
$NName=$array['Name'];
?>
<!--[if !IE]>start section inner <![endif]-->
<div class="section_inner">
	<ul class="system_messages">
        <li class="red" id="<?php echo $FID.'2'; ?>"><span class="ico"></span><strong class="system_title">رمز عبور جدید صحیح نیست!</strong></li>
    </ul>
	<!--[if !IE]>start forms<![endif]-->
	<form id="<?php echo $FID; ?>" method="post" class="search_form  ">
    <input type="hidden" name="AID" value="" id="chngphid" />
	<!--[if !IE]>start fieldset<![endif]-->
	<fieldset>
	<!--[if !IE]>start forms<![endif]-->
	<div class=" dialog">
		<h3>تغییر رمز عبور <?php echo $NName; ?></h3>
        <!--[if !IE]>start row<![endif]-->
		<div class="row">
			<label>رمز عبور:</label>
			<div class="inputs">
				<div align="right"><span class="input_wrapper">
				<input class="text" id="ChngPP" name="Password" type="password" onblur="Validatepass(this,'<?php echo $FID.'3'; ?>');"/>
				</span>
				<span id="<?php echo $FID.'3'; ?>" class="system positive" >&nbsp;</span>
                <span id="<?php echo $FID.'3L'; ?>" class="system negative"  >رمز عبور باید بیشتر از 7 حرف باشد</span>
                <span id="<?php echo $FID.'3N'; ?>" class="system negative"  >رمز عبور باید شامل حرف و عدد باشد</span>
                <span id="<?php echo $FID.'3E'; ?>" class="system negative"  >این فیلد نمیتواند خالی باشد</span>
                </div>
            </div>
		</div>
		<!--[if !IE]>end row<![endif]-->
        <!--[if !IE]>start row<![endif]-->
		<div class="row">
			<label>تکرار رمز عبور:</label>
			<div class="inputs">
				<div align="right"><span class="input_wrapper">
				<input class="text" name="conf" type="password" onblur="Confpass(this,'<?php echo $FID.'4'; ?>');"/>
				</span>
				<span id="<?php echo $FID.'4'; ?>" class="system positive" >&nbsp;</span>
                <span id="<?php echo $FID.'4'; ?>" class="system negative"  >رمز وارده صحیح نیست</span>
                <span id="<?php echo $FID.'4E'; ?>" class="system negative"  >این فیلد نمیتواند خالی باشد</span>
                </div>
            </div>
		</div>
		<!--[if !IE]>end row<![endif]-->
       	<!--[if !IE]>start row<![endif]-->
		<div class="row">
			<div class="inputs">
			<span class="button2 blue_button ok_button"><span><span><span class="button_ico"></span><em>تایید</em></span></span><input name="submit" type="submit" onclick="ChPassPost('<?php echo $FID; ?>'); return false;"/></span>
			</div>
		</div>
		<!--[if !IE]>end row<![endif]-->
	</div>
	<!--[if !IE]>end forms<![endif]-->
	</fieldset>
	<!--[if !IE]>end fieldset<![endif]-->
	</form>
	<!--[if !IE]>end forms<![endif]-->
</div>
<!--[if !IE]>end section inner<![endif]-->
