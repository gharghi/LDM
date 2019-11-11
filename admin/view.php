<?php 
$id='P16';
$lv='1';
include "../global/db.php";
$NAID=stripslashes(mysql_real_escape_string($_POST['AID']));
$query = "select * from Admin where AID='$NAID'";
$result=mysql_query($query);
$array=mysql_fetch_array($result);
extract($array);
Alog('Admin',$NAID,'View');
 ?>
<div class="dialog_inner_view"> 
 
 <!--[if !IE]>start forms<![endif]-->
 
 <form action="#" class="search_form ">
  
  <!--[if !IE]>start fieldset<![endif]-->
  
  <fieldset>
   
   <!--[if !IE]>start forms<![endif]-->
   
   <div class="forms"> 
    
    <!--[if !IE]>start row<![endif]-->
    
    <div class="row">
     <label>شناسه مدیر:</label>
     <div align="right"><span class="input_wrapper" > <?php echo $NAID; ?> </span> </div>
    </div>
    
    <!--[if !IE]>end row<![endif]--> 
    
    <!--[if !IE]>start row<![endif]-->
    
    <div class="row">
     <label>نام مدیر:</label>
     <div align="right"><span class="input_wrapper"> <?php echo $Name; ?> </span> </div>
    </div>
    
    <!--[if !IE]>end row<![endif]--> 
    
    <!--[if !IE]>start row<![endif]-->
    
    <div class="row">
     <label>نام کاربری:</label>
     <span class="input_wrapper"><?php echo $AUsername; ?></span> </div>
    
    <!--[if !IE]>end row<![endif]--> 
    
    <!--[if !IE]>start row<![endif]-->
    
    <div class="row">
     <label>موبایل:</label>
     <span class="input_wrapper"><?php echo $Mob; ?></span> </div>
    
    <!--[if !IE]>end row<![endif]--> 
    
    <!--[if !IE]>start row<![endif]-->
    
    <div class="row">
     <label>ایمیل:</label>
     <span class="input_wrapper"><?php echo $Email; ?></span> </div>
    
    <!--[if !IE]>end row<![endif]--> 
    
  
    
    <!--[if !IE]>start row<![endif]-->
    
    <div class="row">
     <label>وضعیت:</label>
      <div align="right">
       <?php if ( $Lok==0) echo "<span class='pending' >غیر فعال</span>"; else echo "<span class='approved' >فعال</span>"; ?>
      
      </div>
    </div>
    
    <!--[if !IE]>end row<![endif]--> 
    
    <!--[if !IE]>start row<![endif]-->
    
    <div class="row">
     <div class="inputs"> <span class="button2 blue_button edit_button"><span><span><span class="button_ico"></span><em>ویرایش</em></span></span>
      <input name="submit" type="submit" id="<?php echo $AID; ?>" onclick="AdminEdit2(this); return false;"/>
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
