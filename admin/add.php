<?php
$id='P16';
$lv='3';
$FID='F16';
$Faction='../admin/addproc.php';
$Fcomplete='../admin/list.php';
include "../global/db.php";
?>
<div class="title_wrapper">
<h2> </h2>
</div>
<!--[if !IE]>start section inner <![endif]-->
<div class="section_inner">
	<ul class="system_messages">
		<li class="red" id="1"><span class="ico"></span><strong class="system_title">وارد کردن نام الزامی است!</strong></li>
        <li class="red" id="2"><span class="ico"></span><strong class="system_title">وارد کردن نام کاربری الزامی است!</strong></li>
        <li class="red" id="3"><span class="ico"></span><strong class="system_title">این نام پیش تر انتخاب شده است!</strong></li>
        <li class="red" id="4"><span class="ico"></span><strong class="system_title">این نام کاربری پیش تر انتخاب شده است!</strong></li>
        <li class="red" id="5"><span class="ico"></span><strong class="system_title">خطا در پر کردن فرم رخ داده است!</strong></li>
        <li class="red" id="6"><span class="ico"></span><strong class="system_title">رمز عبور وارد شده صحیح نیست!</strong></li>
	</ul>
	<!--[if !IE]>start forms<![endif]-->
	<form id="<?php echo $FID; ?>" method="post" class="search_form general_form">
	<!--[if !IE]>start fieldset<![endif]-->
	<fieldset>
	<!--[if !IE]>start forms<![endif]-->
	<div class="forms">
		<h3>ایجاد مدیر تازه</h3>
		<!--[if !IE]>start row<![endif]-->
		<div class="row">
			<label>نام مدیر:</label>
			<div class="inputs">
				<div align="right"><span class="input_wrapper">
				<input class="text" name="Name" type="text" onblur="validateDB(this,'<?php echo $FID.'1'; ?>');" />
				</span>
				<span id="<?php echo $FID.'1'; ?>" class="system positive" >&nbsp;</span>
                <span id="<?php echo $FID.'1'; ?>" class="system negative"  >نام وارد شده تکراری است</span>
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
				<input class="text" name="AUsername" type="text" onblur="AdminValidateDB(this,'<?php echo $FID.'2'; ?>');"/>
				</span>
				<span id="<?php echo $FID.'2'; ?>" class="system positive" >&nbsp;</span>
                <span id="<?php echo $FID.'2'; ?>" class="system negative"  >نام کاربری وارد شده تکراری است</span>
                <span id="<?php echo $FID.'2E'; ?>" class="system negative"  >این فیلد نمیتواند خالی باشد</span>
                <span id="<?php echo $FID.'2L'; ?>" class="system negative"  >نام کاربری میبایست لاتین باشد</span>
                </div>
            </div>
		</div>
		<!--[if !IE]>end row<![endif]-->
        <!--[if !IE]>start row<![endif]-->
		<div class="row">
			<label>رمز عبور:</label>
			<div class="inputs">
				<div align="right"><span class="input_wrapper">
				<input class="text" id="<?php echo $FID.'pass'; ?>" name="Password" type="password" onblur="Validatepass(this,'<?php echo $FID.'3'; ?>');"/>
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
				<input class="text" name="conf" type="password" onblur="Confirmpass(this,'<?php echo $FID.'4'; ?>','<?php echo $FID.'pass'; ?>');"/>
				</span>
				<span id="<?php echo $FID.'4'; ?>" class="system positive" >&nbsp;</span>
                <span id="<?php echo $FID.'4'; ?>" class="system negative"  >تکرار رمز عبور با رمز واره شده نا متقارن است</span>
                <span id="<?php echo $FID.'4E'; ?>" class="system negative"  >این فیلد نمیتواند خالی باشد</span>
                </div>
            </div>
		</div>
		<!--[if !IE]>end row<![endif]-->
        <!--[if !IE]>start row<![endif]-->
		<div class="row">
			<label>موبایل:</label>
			<div class="inputs">
				<div align="right"><span class="input_wrapper">
				<input class="text" name="Mob" type="text" placeholder="نمونه: <?php echo fdigit('9171112244'); ?>" onblur="ValidateInt(this,'<?php echo $FID.'5'; ?>');"/>
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
				<input class="text" name="Email" type="text" placeholder="نمونه: info@domain.com"/>
				</span>
		
                </div>
            </div>
		</div>
		<!--[if !IE]>end row<![endif]-->
		<!--[if !IE]>start row<![endif]-->
		<div class="row">
			<label>وضعیت مدیر:</label>
			<div class="inputs">
				<div align="right"><span class="view_wrapper_boolen">
                <span class='approved' id="lok11" onclick="BEditInline(this);">
                <input type="hidden" value="1" name="Lok"  />
                
				<a>فعال</a>
				</span>
                </div>
            </div>
		</div>
		<!--[if !IE]>end row<![endif]-->	
		<!--[if !IE]>start row<![endif]-->
		<div class="row">
			<div class="inputs">
			<span class="button2 blue_button add_button"><span><span><span class="button_ico"></span><em>تایید</em></span></span><input name="submit" type="submit" onclick="ValidateformAdmin('<?php echo $FID; ?>','<?php echo $Faction; ?>','<?php echo $Fcomplete; ?>','NAID'); return false;"/></span>
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
