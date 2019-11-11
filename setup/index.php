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
<?php if (isset($_GET['E'])) echo "
<script type='text/javascript'>
$(document).ready(function() {
$('li.red#Ea').show().delay(2000).fadeOut(4000);
});
</script>
"; ?>
</head>
<body>
<!--[if !IE]>start wrapper<![endif]-->
<div id="wrapper">  
 <!--[if !IE]>start head<![endif]--> 
 <div id="head">
  <div class="inner">
   <h1 id="logo"><a href="home.php">خانه</a></h1>   
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
       <li class="red" id="Ea" ><span class="ico"></span><strong class="system_title">امکان اتصال یه دیتابیس وجود ندارد!</strong></li>
       
      </ul>      
      <!--[if !IE]>start forms<![endif]-->      
      <form id="Setup" method="post" action="step1.php" class="search_form general_form">       
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
            <input class="text" name="DBserver" type="text" value="localhost" />
            </span> <span style="padding-right:10px; color:#039;">آدرس سرور دیتابیس </span> </div>
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
            <input class="text" name="DBpass"  type="password"/>
            </span><span style="padding-right:10px; color:#039;">رمز عبور دیتابیس ساخته شده</span> </div>
          </div>
         </div>         
         <!--[if !IE]>end row<![endif]--> 
        
         <!--[if !IE]>start row<![endif]-->         
         <div class="row">
          <div class="inputs"> <span class="button2 blue_button search_button"><span><span><span class="button_ico"><em></span>چک کردن نیاز مندی ها</em></span></span>
           <input name="submit" type="submit" />
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
