<?php
$id='P20';
$lv='2';
include "../global/db.php";
$TID=stripslashes(mysql_real_escape_string($_POST['TID']));
$query="select * from Type where TID=$TID";
$result=mysql_query($query);
$array=mysql_fetch_array($result);
?>
<!--[if !IE]>start section inner <![endif]-->
<div class="dialog_inner_edit">
	<ul class="system_messages">
		<li class="red" id="11"><span class="ico"></span><strong class="system_title">وارد کردن نوع الزامی است!</strong></li>
        <li class="red" id="21"><span class="ico"></span><strong class="system_title">وارد کردن برند الزامی است!</strong></li>
        <li class="red" id="31"><span class="ico"></span><strong class="system_title">وارد کردن مدل الزامی است!</strong></li>
        <li class="red" id="41"><span class="ico"></span><strong class="system_title">خطا در پر کردن فرم رخ داده است!</strong></li>
      
	</ul>
	<!--[if !IE]>start forms<![endif]-->
	<form id="EditType" method="post" class="search_form general_form">
	<!--[if !IE]>start fieldset<![endif]-->
    <input type="hidden" name="TID" value="<?php echo $TID; ?>" />
	<fieldset>
	<!--[if !IE]>start forms<![endif]-->
	<div class="forms">
<h3>ویرایش<?php echo "&nbsp;",$NName; ?></h3>
		<!--[if !IE]>start row<![endif]-->
		<div class="row" >
			<label>نوع:</label>
			<div class="inputs">
				<div align="right"><span class="input_wrapper">
				<input class="text" name="Type" type="text" value="<?php echo $array['Type']; ?>" />
				</span>
               
                </div>
            </div>
		</div>
		<!--[if !IE]>end row<![endif]-->
		<!--[if !IE]>start row<![endif]-->
		<div class="row">
			<label>برند:</label>
			<div class="inputs">
				<div align="right"><span class="input_wrapper">
				<input class="text" name="Brand" type="text" value="<?php echo $array['Brand']; ?>" />
				</span>
               
                </div>
            </div>
		</div>
		<!--[if !IE]>end row<![endif]-->
        <!--[if !IE]>start row<![endif]-->
		<div class="row">
			<label>مدل:</label>
			<div class="inputs">
				<div align="right"><span class="input_wrapper">
				<input class="text" name="Model" type="text" value="<?php echo $array['Model']; ?>" />
				</span>
				
                </div>
            </div>
		</div>
		<!--[if !IE]>end row<![endif]-->
		
		<!--[if !IE]>start row<![endif]-->
		<div class="row">
			<div class="inputs">
			<span class="button2 blue_button edit_button"><span><span><span class="button_ico"></span><em>ویرایش</em></span></span><input name="submit" type="submit" onclick="EditTypePost(); return false;"/></span>
			<span class="loading_button"></span>
			<span class="button gray_button cancel_button"><span><span><span class="button_ico"></span><em>بازگشت</em></span></span><input name="submit" type="submit" onclick="loadpage('type/List.php'); return false;"/></span>
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