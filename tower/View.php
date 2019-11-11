<?php
$id='P15';
$lv='2';
$Faction='tower/Edit.php';
$FID='F15';
include "../global/db.php";
$TWID=stripslashes(mysql_real_escape_string($_POST['TWID']));
$array=mysql_fetch_array(mysql_query("select * from Tower where TWID=$TWID"));
extract($array);
$empty='-----';
?>
<!--[if !IE]>start section inner <![endif]-->
<div class="section_inner">
  <ul class="system_messages">
    <li class="red" id="1"><span class="ico"></span><strong class="system_title">وارد کردن نام الزامی است!</strong></li>
    <li class="red" id="2"><span class="ico"></span><strong class="system_title">وارد کردن تلفن الزامی است!</strong></li>
    <li class="red" id="3"><span class="ico"></span><strong class="system_title">این نام پیش تر انتخاب شده است!</strong></li>
    <li class="red" id="4"><span class="ico"></span><strong class="system_title">این تلفن پیش تر انتخاب شده است!</strong></li>
    <li class="red" id="5"><span class="ico"></span><strong class="system_title">خطا در پر کردن فرم رخ داده است!</strong></li>
    <li class="green" id="1gren"><span class="ico"></span><strong class="system_title">مرکز با موفقیت ویرایش گردید.</strong></li>
  </ul>
  
  <!--[if !IE]>start forms<![endif]-->
  <form id="<?php echo $FID; ?>" method="post" class="search_form general_form">
    <!--[if !IE]>start fieldset<![endif]-->
    <fieldset>
      <input type="hidden" name="TWID" value="<?php echo $TWID; ?>"  />
      <!--[if !IE]>start forms<![endif]-->
      <div class="forms">
        <h3>مرکز</h3>
        <!--[if !IE]>start row<![endif]-->
        <div class="row">
          <label>شناسه :</label>
          <div class="inputs">
            <div align="right"><span class="view_wrapper" id="ID"> <?php echo fdigit($TWID); ?> </span> </div>
          </div>
        </div>
        <!--[if !IE]>end row<![endif]--> 
 
        <!--[if !IE]>start row<![endif]-->
      <div class="row">
        <label>نام مرکز:</label>
        <div class="inputs">
          <div align="right"><span class="view_wrapper">
            <input class="inputview" id="<?php echo $FID.'1'; ?>" name="Name" type="text" readonly="readonly" value="<?php echo $Name; ?>" onclick="EditInline(this,'<?php echo $FID.'1'; ?>'); return false;"/>
            
            </span> 
            <span id="<?php echo $FID.'1'; ?>" class="system positive" >&nbsp;</span> 
               <span id="<?php echo $FID.'1'; ?>" class="system negative"  >نام وارد شده تکراری است</span> 
               <span id="<?php echo $FID.'1E'; ?>" class="system negative"  >این فیلد نمیتواند خالی باشد</span> </div>
            </div>
        </div>
      </div>
      <!--[if !IE]>end row<![endif]--> 
         <!--[if !IE]>start row<![endif]-->
      <div class="row">
        <label>صاحب ملک:</label>
        <div class="inputs">
          <div align="right"><span class="view_wrapper">
            <input class="inputview" id="<?php echo $FID.'2'; ?>" name="Resp" type="text" readonly="readonly" value="<?php echo $Resp; ?>" onclick="EditInline(this,'<?php echo $FID.'2'; ?>'); return false;"/>
            
            </span> 
            </div>
        </div>
      </div>
      <!--[if !IE]>end row<![endif]-->
      <!--[if !IE]>start row<![endif]-->
      <div class="row">
        <label>تلفن:</label>
        <div class="inputs">
          <div align="right"><span class="view_wrapper">
            <input class="inputview" id="<?php echo $FID.'3'; ?>" name="Tel" type="text" readonly="readonly" value="<?php if (empty($Tel)) echo 0; else echo $Tel; ?>" onclick="IEditInline(this,'<?php echo $FID.'3'; ?>'); return false;"/>
            
            </span>
            
             </div>
        </div>
      </div>
      <!--[if !IE]>end row<![endif]--> 
      <!--[if !IE]>start row<![endif]-->
      <div class="row">
        <label>ارتفاع:</label>
        <div class="inputs">
          <div align="right"><span class="view_wrapper">
            <input class="inputview" id="<?php echo $FID.'4'; ?>" name="Height" type="text" readonly="readonly" value="<?php if (empty($Height)) echo 0; else echo $Height; ?>" onclick="NEditInline(this,'<?php echo $FID.'12'; ?>'); return false;"/>
            
            </span> 
             </div>
        </div>
      </div>
      <!--[if !IE]>end row<![endif]-->  
    <!--[if !IE]>start row<![endif]-->
		<div class="row">
			<label>آدرس:</label>
			<div class="inputs">
				<div align="right"><span class="view_wrapper">
				<textarea class='areaview' name='Address' readonly="readonly" id="<?php echo $FID.'8'; ?>"  onclick="TAreaEditInline(this,'<?php echo $FID.'8'; ?>'); return false;" ><?php if (empty($Address)) echo $empty; else echo $Address; ?></textarea>
				</span>
                </div>
            </div>
		</div>
		<!--[if !IE]>end row<![endif]-->
     
        <!--[if !IE]>start row<![endif]-->
        <div class="row" id="editbtn" style="display:none;">
          <div class="inputs"> <span class="button2 blue_button save_button"><span><span><span class="button_ico"></span><em>ذخیره</em></span></span>
            <input name="submit" type="submit" onclick="SaveForm('<?php echo $FID; ?>','<?php echo $Faction; ?>'); return false;"/>
            </span> <span class="loading_button"></span> <span class="button2 blue_button renew_button"><span><span><span class="button_ico"></span><em>از نو</em></span></span>
            <input name="submit" type="submit" onclick="LoadTower(<?php echo $TWID; ?>); return false;"/>
            </span> </div>
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
