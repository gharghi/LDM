<?php
$id='P11';
$lv='1';
$Faction='proc/UserEdit.php';
$FID='F10';
include "../global/db.php";
$UserID=stripslashes(mysql_real_escape_string($_POST['UserID']));
$result44=mysql_query("select * from User where UserID=$UserID ");
$array=mysql_fetch_array($result44);
$num=mysql_num_rows($result44);
if ($num==0)
echo 'e';
else 
{
extract($array);
$empty='-----';
?>
<div class="title_wrapper"> </div>
<!--[if !IE]>start section inner <![endif]-->
<div class="section_inner">
  
  <!--[if !IE]>start forms<![endif]-->
  
  <form id="<?php echo $FID; ?>" method="post" class="search_form general_form">
    
    <!--[if !IE]>start fieldset<![endif]-->
    
    <fieldset>
      <input type="hidden" name="UserID" value="<?php echo $UserID; ?>"  />
      
      <!--[if !IE]>start forms<![endif]-->
      
      <div class="forms">
        <h3>مشخصات مشترک</h3>
        
        <!--[if !IE]>start row<![endif]-->
        
        <div class="row">
          <label>شناسه مشترک:</label>
          <div class="inputs">
            <div align="right"><span class="view_wrapper" id="ID"> <?php echo fdigit($UserID); ?> </span> </div>
          </div>
        </div>
        
        <!--[if !IE]>end row<![endif]--> 
        
        <!--[if !IE]>start row<![endif]-->
        
        <div class="row">
          <label>نام مشترک:</label>
          <div class="inputs">
            <div align="right"><span class="view_wrapper">
             <?php if (empty($Name)) echo $empty; else echo $Name; ?>
              </span>  </div>
          </div>
        </div>
        
        <!--[if !IE]>end row<![endif]--> 
        
        <!--[if !IE]>start row<![endif]-->
        
        <div class="row">
          <label>شماره قرارداد:</label>
          <div class="inputs">
            <div align="right"><span class="view_wrapper">
             <?php if (empty($Cont)) echo $empty; else echo $Cont; ?>
              </span>  </div>
          </div>
        </div>
        
        <!--[if !IE]>end row<![endif]--> 
        
        <!--[if !IE]>start row<![endif]-->
        
        <div class="row">
          <label>تلفن:</label>
          <div class="inputs">
            <div align="right"><span class="view_wrapper">
             <?php if (empty($Tel)) echo $empty; else echo $Tel; ?>
              </span>  </div>
          </div>
        </div>
        
        <!--[if !IE]>end row<![endif]--> 
        
        <!--[if !IE]>start row<![endif]-->
        
        <div class="row">
          <label>موبایل:</label>
          <div class="inputs">
            <div align="right"><span class="view_wrapper">
             <?php if (empty($Mob)) echo $empty; else echo $Mob; ?>
              </span>  </div>
          </div>
        </div>
        
        <!--[if !IE]>end row<![endif]--> 
        
        <!--[if !IE]>start row<![endif]-->
        
        <div class="row">
          <label>فرد پاسخگو:</label>
          <div class="inputs">
            <div align="right"><span class="view_wrapper">
             <?php if (empty($Resp)) echo $empty; else echo $Resp; ?>
              </span> </div>
          </div>
        </div>
        
        <!--[if !IE]>end row<![endif]--> 
        
        <!--[if !IE]>start row<![endif]-->
        
        <div class="row">
          <label>پهنای باند</label>
          <div class="inputs">
            <div align="right"><span class="view_wrapper">
             <?php if (empty($BW)) echo $empty; else echo $BW; ?>
              </span> </div>
          </div>
        </div>
        
        <!--[if !IE]>end row<![endif]--> 
        
        
        
        <!--[if !IE]>start row<![endif]-->
        
        <div class="row">
          <label>آدرس:</label>
          <div class="inputs">
            <div align="right"><span class="view_wrapper">
              <?php if (empty($Address)) echo $empty; else echo $Address; ?>
              </span> </div>
          </div>
        </div>
        
        <!--[if !IE]>end row<![endif]--> 
        
        <!--[if !IE]>start row<![endif]-->
        
        <div class="row">
          <label>توضیحات:</label>
          <div class="inputs">
            <div align="right"><span class="view_wrapper">
         <?php if (empty($Descrip)) echo $empty; else echo $Descrip; ?>
              </span> </div>
          </div>
        </div>
        
        <!--[if !IE]>end row<![endif]--> 
        
        <!--[if !IE]>start row<![endif]-->
        
        <div class="row" id="editbtn" style="display:none;">
          <div class="inputs"> <span class="button2 blue_button save_button"><span><span><span class="button_ico"></span><em>ذخیره</em></span></span>
            <input name="submit" type="submit" onclick="SaveForm('<?php echo $FID; ?>','<?php echo $Faction; ?>'); return false;"/>
            </span> <span class="loading_button"></span> <span class="button2 blue_button renew_button"><span><span><span class="button_ico"></span><em>از نو</em></span></span>
            <input name="submit" type="submit" onclick="loaduserprofile(<?php echo $UserID; ?>); return false;"/>
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
<?php
 }
?>
