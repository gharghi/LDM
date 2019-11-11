<?php
$id='P13';
$lv='1';
$FID='F13';
include "../global/db.php";
$UserID=stripslashes(mysql_real_escape_string($_POST['ID']));
$result=mysql_query("select * from Hardware where UserID=$UserID order by HWID");
$num=mysql_num_rows($result);
?>
<!--[if !IE]>start section inner <![endif]-->

<div class="section_inner">
  <ul class="system_messages">
    <li class="red" id="6"><span class="ico"></span><strong class="system_title">لطفا ابتدا آدرسهای اختصاص داده شده را حذف نمایید!</strong></li>
    <li class="red" id="7"><span class="ico"></span><strong class="system_title">لطفا ابتدا سخت افزارهای اختصاص داده شده را حذف نمایید!</strong></li>
    <li class="red" id="5"><span class="ico"></span><strong class="system_title">خطا در حذف مشترک رخ داده است!</strong></li>
    <li class="red" id="11"><span class="ico"></span><strong class="system_title">Hostname میبایست وارد شود!</strong></li>
    <li class="red" id="12"><span class="ico"></span><strong class="system_title">IP میبایست وارد شود!</strong></li>
    <li class="red" id="15"><span class="ico"></span><strong class="system_title">آدرس وارده پیشتر ثبت گردیده است!</strong></li>
    <li class="red" id="13"><span class="ico"></span><strong class="system_title">خطایی روی داده است!</strong></li>
    <li class="red" id="14"><span class="ico"></span><strong class="system_title">این نام پیشتر ثبت شده است!</strong></li>
    <li class="red" id="16"><span class="ico"></span><strong class="system_title">یک سوئیچ باید انتخاب شود!</strong></li>
    <li class="red" id="17"><span class="ico"></span><strong class="system_title">یک مدل سخت افزار باید انتخاب شود!</strong></li>
    <li class="red" id="18"><span class="ico"></span><strong class="system_title">IP به درستی وارد نشده است</strong></li>
    <li class="red" id="19"><span class="ico"></span><strong class="system_title">IP پیشتر ثبت گردیده است</strong></li>
    <li class="green" id="11"><span class="ico"></span><strong class="system_title">سخت افزار با موفقیت ثبت گردید.</strong></li>
    <li class="green" id="12"><span class="ico"></span><strong class="system_title">سخت افزار با موفقیت حذف گردید.</strong></li>
  </ul>
  <!--[if !IE]>start forms<![endif]-->
  <form id="dHardware" method="post" class="search_form general_form">
    
    <!--[if !IE]>start fieldset<![endif]-->
    
    <fieldset>
      <input type="hidden" name="UserID" value="<?php echo $UserID; ?>" />
      
      <!--[if !IE]>start forms<![endif]-->
      
      <div class="forms">
        <h3>افزودن سخت افزار</h3>
        
        <!--[if !IE]>start row<![endif]-->
        
        <div class="row">
          <label>نوع:</label>
          <div class="inputs"> <span class="input_wrapper blank">
            <?php
$query1="select distinct Type from Type";
$result1=mysql_query($query1);
$num2=mysql_num_rows($result1);
echo "<select name='Type' onchange='TypeSelect2(this);'>";
echo "<option>انتخاب کنید</option>";
	$i=0;
	while ($i < $num2) 
		{
	$Type=mysql_result($result1,$i,'Type');
	$i++;
	echo "<option value='",$Type,"' >",$Type;
		}
echo "</select>";
?>
            </span><span class="loading_select" id="Lselect1"></span> </div>
        </div>
        
        <!--[if !IE]>end row<![endif]--> 
        
        <!--[if !IE]>start row<![endif]-->
        
        <div class="row" style="display:none;" id="Select2"> </div>
        
        <!--[if !IE]>end row<![endif]--> 
        
        <!--[if !IE]>start row<![endif]-->
        
        <div class="row" style="display:none;" id="Select3"> </div>
        
        <!--[if !IE]>end row<![endif]--> 
        
        <!--[if !IE]>start row<![endif]-->
        
        <div class="row">
          <label>Hostname:</label>
          <div class="inputs">
            <div align="right"><span class="input_wrapper">
              <input class="text" name="Hostname" type="text"  />
              </span> </div>
          </div>
        </div>
        
        <!--[if !IE]>end row<![endif]--> 
        
        <!--[if !IE]>start row<![endif]-->
        
        <div class="row" >
          <label>IP:</label>
          <div class="inputs" style="width:240px !important;">
            <div align="right" style="float:right;">
              <div class="IP">
                <ul>
                  <li> <span class="input_wrapper small_input">
                    <input class="text" name="Oct1" id="21" type="text" on onkeyup="validatePrefix(this);" />
                    </span></li>
                  <li>.</li>
                  <li> <span class="input_wrapper small_input">
                    <input class="text" name="Oct2" id="22" type="text" onkeyup="validatePrefix(this);" />
                    </span></li>
                  <li>.</li>
                  <li> <span class="input_wrapper small_input">
                    <input class="text" name="Oct3" id="23" type="text" onkeyup="validatePrefix(this);" />
                    </span></li>
                  <li>.</li>
                  <li> <span class="input_wrapper small_input">
                    <input class="text" name="Oct4" id="24" type="text" onkeyup="validatePrefix(this);" />
                    </span></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        
        <!--[if !IE]>end row<![endif]--> 
        
     
        
        <!--[if !IE]>start row<![endif]-->
        
        <div class="row">
          <label>مک آدرس:</label>
          <div class="inputs">
            <div align="right"><span class="input_wrapper">
              <input class="text" name="MAC" type="text"  />
              </span> </div>
          </div>
        </div>
        
        <!--[if !IE]>end row<![endif]--> 
        
        <!--[if !IE]>start row<![endif]-->
        
        <div class="row">
          <label>نام کاربری:</label>
          <div class="inputs">
            <div align="right"><span class="input_wrapper">
              <input class="text" name="User" type="text"/>
              </span> </div>
          </div>
        </div>
        
        <!--[if !IE]>end row<![endif]--> 
        
        <!--[if !IE]>start row<![endif]-->
        
        <div class="row">
          <label>رمز عبور:</label>
          <div class="inputs">
            <div align="right"><span class="input_wrapper">
              <input class="text" name="Pass" type="text"/>
              </span> </div>
          </div>
        </div>
        
        <!--[if !IE]>end row<![endif]--> 
        
        <!--[if !IE]>start row<![endif]-->
        
        <div class="row">
          <label>کلید رمز:</label>
          <div class="inputs">
            <div align="right"><span class="input_wrapper">
              <input class="text" name="Secret" type="text"/>
              </span> </div>
          </div>
        </div>
        
        <!--[if !IE]>end row<![endif]--> 
        
        <!--[if !IE]>start row<![endif]-->
        
        <div class="row">
          <label>SNMP:</label>
          <div class="inputs">
            <div align="right"><span class="input_wrapper">
              <input class="text" name="SNMP" type="text"/>
              </span> </div>
          </div>
        </div>
        
        <!--[if !IE]>end row<![endif]--> 
        
       
        
        <!--[if !IE]>start row<![endif]-->
        
        <div class="row">
          <div class="inputs"> <span class="button2 blue_button add_button"><span><span><span class="button_ico"></span><em>تایید</em></span></span>
            <input name="submit" type="submit" onclick="AdddHardware(this); return false;"/>
            </span> <span class="loading_button"> </span> </div>
        </div>
        
        <!--[if !IE]>end row<![endif]--> 
        
      </div>
      
      <!--[if !IE]>end forms<![endif]-->
      
    </fieldset>
    
    <!--[if !IE]>end fieldset<![endif]-->
    
  </form>
  
  <!--[if !IE]>end forms<![endif]-->
  
  
</div>
