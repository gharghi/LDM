<?php
$id='P16';
$lv='2';
$FID='F16';
$Faction='../admin/addproc.php';
$Fcomplete='../admin/profile.php';
include "../global/db.php";
$NAID=stripslashes(mysql_real_escape_string($_POST['AID']));
$query = "select * from Admin where AID='$NAID'";
$result=mysql_query($query);
$array=mysql_fetch_array($result);
$NName=$array['Name'];
$NAUsername=$array['AUsername'];
$NMob=$array['Mob'];
$NEmail=$array['Email'];
$NLok=$array['Lok'];
?>
<!--[if !IE]>start section inner <![endif]-->
<div class="dialog_inner_edit">
	<ul class="system_messages">
		<li class="red" id="1"><span class="ico"></span><strong class="system_title">وارد کردن نام الزامی است!</strong></li>
        <li class="red" id="2"><span class="ico"></span><strong class="system_title">وارد کردن نام کاربری الزامی است!</strong></li>
        <li class="red" id="3"><span class="ico"></span><strong class="system_title">این نام پیش تر انتخاب شده است!</strong></li>
        <li class="red" id="4"><span class="ico"></span><strong class="system_title">این نام کاربری پیش تر انتخاب شده است!</strong></li>
        <li class="red" id="5"><span class="ico"></span><strong class="system_title">خطا در پر کردن فرم رخ داده است!</strong></li>
        <li class="red" id="6"><span class="ico"></span><strong class="system_title">رمز عبور وارد شده صحیح نیست!</strong></li>
	</ul>
	<!--[if !IE]>start forms<![endif]-->
	<form id="EditAdmin" method="post" class="search_form general_form">
	<!--[if !IE]>start fieldset<![endif]-->
    <input type="hidden" name="AID" value="<?php echo $NAID; ?>" />
	<fieldset>
	<!--[if !IE]>start forms<![endif]-->
	<div class="forms">
		<h3>ویرایش<?php echo "&nbsp;",$NName; ?></h3>
		<!--[if !IE]>start row<![endif]-->
		<div class="row" >
			<label>نام مدیر:</label>
			<div class="inputs">
				<div align="right"><span class="input_wrapper">
				<input class="text" name="Name" type="text" value="<?php echo $NName; ?>" onblur="validateDB(this,'<?php echo $FID.'1'; ?>');" />
				</span>
                <span id="<?php echo $FID.'1E'; ?>" class="system negative"  >این فیلد نمیتواند خالی باشد</span>
                </div>
            </div>
		</div>
		<!--[if !IE]>end row<![endif]-->
		<!--[if !IE]>start row<![endif]-->
		<div class="row">
			<label>نام کاربری:</label>
			<div class="inputs">
				<div align="right"><span class="input_wrapper">
				<input class="text" name="AUsername" type="text" value="<?php echo $NAUsername; ?>" onblur="AdminValidateDB(this,'<?php echo $FID.'2'; ?>');"/>
				</span>
                <span id="<?php echo $FID.'2E'; ?>" class="system negative"  >این فیلد نمیتواند خالی باشد</span>
                </div>
            </div>
		</div>
		<!--[if !IE]>end row<![endif]-->
        <!--[if !IE]>start row<![endif]-->
		<div class="row">
			<label>موبایل:</label>
			<div class="inputs">
				<div align="right"><span class="input_wrapper">
				<input class="text" name="Mob" type="text" value="<?php echo $NMob; ?>" placeholder="نمونه: 9171112244" onblur="ValidateInt(this,'<?php echo $FID.'5'; ?>');"/>
				</span>
				<span id="<?php echo $FID.'5'; ?>" class="system positive">&nbsp;</span>
                <span id="<?php echo $FID.'5'; ?>" class="system negative">شماره وارد شده صحیح نیست</span>
                </div>
            </div>
		</div>
		<!--[if !IE]>end row<![endif]-->
		<!--[if !IE]>start row<![endif]-->
		<div class="row">
			<label>پست الکترونیک:</label>
			<div class="inputs">
				<div align="right"><span class="input_wrapper">
				<input class="text" name="Email" type="text" value="<?php echo $NEmail; ?>" placeholder="نمونه: info@domain.com"/>
				</span>
		
                </div>
            </div>
		</div>
		<!--[if !IE]>end row<![endif]-->
		<!--[if !IE]>start row<![endif]-->
		<div class="row">
		<label>وضعیت مدیر:</label>
			<div class="inputs">
			<ul class="inline">
				<li> <input class="checkbox" name="Lok" value="1" type="checkbox" <?php if ($NLok==1) echo 'checked';  ?> /> اکتیو</li>
			</ul>
			</div>
		</div>
		<!--[if !IE]>end row<![endif]-->
		<!--[if !IE]>start row<![endif]-->
		<div class="row">
			<div class="inputs">
			<span class="button2 blue_button edit_button"><span><span><span class="button_ico"></span><em>ویرایش</em></span></span><input name="submit" type="submit" onclick="EditAdminPost(); return false;"/></span>
		
			<span class="button gray_button cancel_button"><span><span><span class="button_ico"></span><em>بازگشت</em></span></span><input name="submit" type="submit" onclick="loadpage('admin/list.php'); return false;"/></span>
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
