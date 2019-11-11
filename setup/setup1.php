<?php 
//if (file_exists('../global/config.php'))
//header('location:../login.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="rtl">
<head>
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8" />
<title>مدیریت اسناد لیمو -- نصب</title>
<link rel="stylesheet" type="text/css" href="../css/meta-admin.css" />
<link rel="icon" type="image/ico" href="../favicon.ico" />
<link rel="stylesheet" type="text/css" href="../css/green-theme.css" />
<link rel="stylesheet" href="../global/jalalijscalendar/skins/calendar-green.css">
<link rel="stylesheet" type="text/css" href="../css/ui/jquery-ui-1.10.0.custom.css" />
<!--[if lte IE 6]><link media="screen" rel="stylesheet" type="text/css" href="css/ie.css" /><![endif]-->
<script type="text/javascript" src="../scripts/jquery-1.9.0.js"></script>
<script type="text/javascript" src="../scripts/jquery-ui-1.10.0.custom.js"></script>
<script type="text/javascript" src="../scripts/css.js"></script>
<script type="text/javascript" src="../scripts/behaviour.js"></script>
<script type="text/javascript" src="../scripts/functions.js"></script>
<script src="../global/jalalijscalendar/jalali.js"></script>
<script src="../global/jalalijscalendar/calendar.js"></script>
<script src="../global/jalalijscalendar/calendar-setup.js"></script>
<script src="../global/jalalijscalendar/lang/calendar-fa.js"></script>
</head>
<body>
<div id="dialog"></div>
<!--[if !IE]>start wrapper<![endif]-->
<div id="wrapper"> 
 
 <!--[if !IE]>start head<![endif]-->
 
 <div id="head">
  <div class="inner">
   <h1 id="logo"><a href="home.php">LDM control Adminstration Panel</a></h1>
   
   <!--[if !IE]>start user details<![endif]--> 
   
   <!--[if !IE]>end user details<![endif]--> 
   
   <!--[if !IE]>start main menu<![endif]--> 
   
  </div>
 </div>
 <!--[if !IE]>end head<![endif]--> 
 
 <!--[if !IE]>start content<![endif]-->
 
 <div id="content"> 
  
  <!--[if !IE]>start content bottom<![endif]-->
  
  <div class="inner"> 
   
   <!--[if !IE]>start info<![endif]--> 
   
   <!--[if !IE]>end section<![endif]-->
   
   <div id="info">
    <div class="section">
     <div class="section_inner">
      <ul class="system_messages">
       <li class="red" id="Ea"><span class="ico"></span><strong class="system_title">امکان اتصال یه دیتابیس وجود ندارد!</strong></li>
       <li class="red" id="Eb"><span class="ico"></span><strong class="system_title">لطفا تمام قیلد ها را پر کنید!</strong></li>
       <li class="red" id="Ec"><span class="ico"></span><strong class="system_title">خطا در ساختن دیتابیس روی داده است!</strong></li>
       <li class="green" id="Ed"><span class="ico"></span><strong class="system_title">راه اندازی با موفقیت انجام گردید!</strong></li>
       <li class="red" id="Ee"><span class="ico"></span><strong class="system_title">خطا در پر کردن فرم رخ داده است!</strong></li>
       <li class="red" id="Ef"><span class="ico"></span><strong class="system_title">خطا در راه اندازی رخ داده است!</strong></li>
      </ul>
      
      <!--[if !IE]>start forms<![endif]-->
      
      <form id="Setup" method="post" class="search_form general_form">
       
       <!--[if !IE]>start fieldset<![endif]-->
       
       <fieldset>
        
        <!--[if !IE]>start forms<![endif]-->
        
        <div class="forms">
         <h3>ورود تنظیمات</h3>
         
         <!--[if !IE]>start row<![endif]-->
         
         <div class="row">
          <label>آدرس سرور:</label>
          <div class="inputs">
           <div align="right"><span class="input_wrapper">
            <input class="text" name="DBserver" type="text" value="127.0.0.1" />
            </span>  </div>
          </div>
         </div>
         
         <!--[if !IE]>end row<![endif]--> 
         <!--[if !IE]>start row<![endif]-->
         
         <div class="row">
          <label>نام دیتابیس:</label>
          <div class="inputs">
           <div align="right"><span class="input_wrapper">
            <input class="text" name="DBname" type="text" placeholder="LDM"/>
            </span> <span style="padding-right:10px; color:#039;">نام دیتا بیس ساخته شده</span> </div>
          </div>
         </div>
         
         <!--[if !IE]>end row<![endif]--> 
         <!--[if !IE]>start row<![endif]-->
         
         <div class="row">
          <label> کاربر :</label>
          <div class="inputs">
           <div align="right"><span class="input_wrapper">
            <input class="text" name="DBuser" type="text" placeholder="ldm" />
            </span><span style="padding-right:10px; color:#039;">نام کاربری دیتا بیس ساخته شده</span> </div>
          </div>
         </div>
         
         <!--[if !IE]>end row<![endif]--> 
         <!--[if !IE]>start row<![endif]-->
         
         <div class="row">
          <label>رمز :</label>
          <div class="inputs">
           <div align="right"><span class="input_wrapper">
            <input class="text" name="DBpass" type="text"/>
            </span><span style="padding-right:10px; color:#039;">رمز عبور دیتابیس ساخته شده</span> </div>
          </div>
         </div>
         
         <!--[if !IE]>end row<![endif]--> 
         <!--[if !IE]>start row<![endif]-->
         
         <div class="row">
          <label>زمان فعالیت:</label>
          <div class="inputs">
           <div align="right"><span class="input_wrapper">
            <input class="text" name="SessTime" type="text" value="900"/>
            </span> <span style="padding-right:10px; color:#039;">مدت زمان بیکاری</span></div>
          </div>
         </div>
         
         <!--[if !IE]>end row<![endif]--> 
         <!--[if !IE]>start row<![endif]-->
         
         <div class="row">
          <label>رمز گذاری ورود:</label>
          <div class="inputs">
           <div align="right"><span class="view_wrapper_boolen"> <span class='approved' id="lok11" onclick="BEditInline(this);">
            <input type="hidden" value="1" name="EncryptLogin"  />
            <a>فعال</a> </span> </div>
          </div>
         </div>
         
         <!--[if !IE]>end row<![endif]--> 
         
         <!--[if !IE]>start row<![endif]-->
         
         <div class="row">
          <label>پست الکترونیک :</label>
          <div class="inputs">
           <div align="right"><span class="input_wrapper">
            <input class="text" name="EmailAccount" type="text" placeholder="LDM@yourcompany.com" />
            </span> <span style="padding-right:10px; color:#039;">پست الکترونیک فرستنده</span></div>
          </div>
         </div>
         
         <!--[if !IE]>end row<![endif]--> 
         <!--[if !IE]>start row<![endif]-->
         
         <div class="row">
          <label>عنوان :</label>
          <div class="inputs">
           <div align="right"><span class="input_wrapper">
            <input class="text" name="EmailSubject" type="text" value="مدیریت اسناد لیمو" />
            </span><span style="padding-right:10px; color:#039;">عنوان پست الکترونیک</span> </div>
          </div>
         </div>
         
         <!--[if !IE]>end row<![endif]--> 
         <!--[if !IE]>start row<![endif]-->
         
         <div class="row">
          <label>mntner نام:</label>
          <div class="inputs">
           <div align="right"><span class="input_wrapper">
            <input class="text" name="MNT" type="text" placeholder="ALS-MNT" />
            </span> <span style="padding-right:10px; color:#039;">mntner Object مربوط به دیتابیس RIPE</span></div>
          </div>
         </div>
         
         <!--[if !IE]>end row<![endif]--> 
         <!--[if !IE]>start row<![endif]-->
         
         <div class="row">
          <label>پیشوند:</label>
          <div class="inputs">
           <div align="right"><span class="input_wrapper">
            <input class="text" name="NIC" type="text" placeholder="ASR" />
            </span><span style="padding-right:10px; color:#039;">پیشوند برای ساخت Person Object</span> </div>
          </div>
         </div>
         
         <!--[if !IE]>end row<![endif]--> 
         <!--[if !IE]>start row<![endif]-->
         
         <div class="row">
          <label>RIPE Email:</label>
          <div class="inputs">
           <div align="right"><span class="input_wrapper">
            <input class="text" name="RIPE_Email" type="text" placeholder="ripe@yourcompany.com" />
            </span><span style="padding-right:10px; color:#039;">پست الکترونیک مورد تایید RIPE برای آپدیت</span> </div>
          </div>
         </div>
         
         <!--[if !IE]>end row<![endif]--> 
         <!--[if !IE]>start row<![endif]-->
         
         <div class="row">
          <label>رمز عبور :</label>
          <div class="inputs">
           <div align="right"><span class="input_wrapper">
            <input class="text" name="MNT_Pass" type="text" />
            </span><span style="padding-right:10px; color:#039;">رمز عبور mntner Object</span> </div>
          </div>
         </div>
         
         <!--[if !IE]>end row<![endif]--> 
         <!--[if !IE]>start row<![endif]-->
         
         <div class="row">
          <div class="inputs"> <span class="button2 blue_button add_button"><span><span><span class="button_ico"><em></span>تایید</em></span></span>
           <input name="submit" type="button" onclick="setup(); return false;"/>
           </span><span id="loading_button" style="display:none;"><img src="../css/layout/load3.gif" /></span> </div>
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
     
    </div>
   </div>
   
   <!--[if !IE]>end info<![endif]--> 
   
  </div>
  
  <!--[if !IE]>end content bottom<![endif]--> 
  
 </div>
 
 <!--[if !IE]>end content<![endif]--> 
 
</div>
<!--[if !IE]>end wrapper<![endif]--> 
</body>
</html>
