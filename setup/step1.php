<?php 
//if (file_exists('../global/config.php'))
//header('location:../login.php');
$error=9;
extract($_POST);
$con=mysql_connect($DBserver,$DBuser,$DBpass);
if (!$con)
{
	$error=1;
	header('location:index.php?E=1');
}
else $error=0;
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
</head>
<body>
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
       <li class="red" id="Ea" <?php if ($error==1) echo "style='display:block;'"; ?> ><span class="ico"></span><strong class="system_title">امکان اتصال یه دیتابیس وجود ندارد!</strong></li>
      </ul>
      <!--[if !IE]>start forms<![endif]-->
      <form name="setup" id="Setup" method="post" class="search_form general_form" action="step2.php">
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
            <input <?php if ($error==0) echo "disabled='disabled'"; ?>  class="text"  type="text" value="<?php echo $DBserver; ?>" />
            </span>  </div>
          </div>
         </div>
         
         <!--[if !IE]>end row<![endif]--> 
         <!--[if !IE]>start row<![endif]-->
         
         <div class="row">
          <label>نام دیتابیس:</label>
          <div class="inputs">
           <div align="right"><span class="input_wrapper">
            <input <?php if ($error==0) echo "disabled='disabled'"; ?> class="text"  type="text" placeholder="LDM" value="<?php echo $DBname; ?>"/>
            </span> <span style="padding-right:10px; color:#039;">نام دیتا بیس ساخته شده</span> </div>
          </div>
         </div>
         
         <!--[if !IE]>end row<![endif]--> 
         <!--[if !IE]>start row<![endif]-->
         
         <div class="row">
          <label> کاربر :</label>
          <div class="inputs">
           <div align="right"><span class="input_wrapper">
            <input <?php if ($error==0) echo "disabled='disabled'"; ?> class="text"  type="text" placeholder="ldm" value="<?php echo $DBuser; ?>"/>
            </span><span style="padding-right:10px; color:#039;">نام کاربری دیتا بیس ساخته شده</span> </div>
          </div>
         </div>
         
         <!--[if !IE]>end row<![endif]--> 
         <!--[if !IE]>start row<![endif]-->
         
         <div class="row">
          <label>رمز :</label>
          <div class="inputs">
           <div align="right"><span class="input_wrapper">
            <input <?php if ($error==0) echo "disabled='disabled'"; ?> class="text"  type="text" value="پنهان شده"/>
            </span><span style="padding-right:10px; color:#039;">رمز عبور دیتابیس ساخته شده</span> </div>
          </div>
         </div>
         
         <!--[if !IE]>end row<![endif]--> 
         <input type="hidden" value="<?php echo $DBserver; ?>" name="DBserver"  />
         <input type="hidden" value="<?php echo $DBuser; ?>" name="DBuser"  />
         <input type="hidden" value="<?php echo $DBpass; ?>" name="DBpass"  />
         <input type="hidden" value="<?php echo $DBname; ?>" name="DBname"  />
       
         <?php
		 if (version_compare(phpversion(), '5.2.10', '<')) {
		 echo "
        
			
			<!--[if !IE]>start row<![endif]-->
         <div class='row'>
          <label>نسخه PHP:</label>
          <div class='inputs'>
           <div align='right'><span class='view_wrapper_boolen'> <span class='declined' id='lok11' >
		   <input type='hidden' />
            <a>نسخه PHP قدیمی است</a> </span> </div>
          </div>
         </div>
         <!--[if !IE]>end row<![endif]-->
         
         ";
		 $check1=0;
		 }
		 else {
			echo "
			 <!--[if !IE]>start row<![endif]-->
         <div class='row'>
          <label>نسخه PHP:</label>
          <div class='inputs'>
           <div align='right'><span class='view_wrapper_boolen'> <span class='approved' id='lok11' >
		   <input type='hidden' />
            <a>سازگار</a> </span> </div>
          </div>
         </div>
         <!--[if !IE]>end row<![endif]--> 
			 
         
         "; 
		 $check1=1;
		 }
         ?>
         <?php
		 if ((substr(sprintf('%o', fileperms('../global')), -3))==777) {
		 echo "
         <!--[if !IE]>start row<![endif]-->
         <div class='row'>
          <label>پوشه global:</label>
          <div class='inputs'>
           <div align='right'><span class='view_wrapper_boolen'> <span class='approved' id='lok11' >
		   <input type='hidden' />
            <a>پوشه global قابل ویرایش است</a> </span> </div>
          </div>
         </div>
         <!--[if !IE]>end row<![endif]-->        
         ";
		 $check2=1;
		 }
		 else {
			echo "
		 <!--[if !IE]>start row<![endif]-->
         <div class='row'>
          <label>پوشه global:</label>
          <div class='inputs'>
           <div align='right'><span class='view_wrapper_boolen'> <span class='declined' id='lok11' >
		   <input type='hidden' />
            <a>پوشه global قابل ویرایش نیست</a> </span> </div>
          </div>
         </div>
         <!--[if !IE]>end row<![endif]-->         
         "; 
		 $check1=0;
		 }
         ?>
         
             <?php
		 if ((substr(sprintf('%o', fileperms('../tmp')), -3))==777) {
		 echo "
         <!--[if !IE]>start row<![endif]-->
         <div class='row'>
          <label>پوشه tmp:</label>
          <div class='inputs'>
           <div align='right'><span class='view_wrapper_boolen'> <span class='approved' id='lok11' >
		   <input type='hidden' />
            <a>پوشه tmp قابل ویرایش است</a> </span> </div>
          </div>
         </div>
         <!--[if !IE]>end row<![endif]-->        
         ";
		 $check3=1;
		 }
		 else {
			echo "
		 <!--[if !IE]>start row<![endif]-->
         <div class='row'>
          <label>پوشه tmp:</label>
          <div class='inputs'>
           <div align='right'><span class='view_wrapper_boolen'> <span class='declined' id='lok11' >
		   <input type='hidden' />
            <a>پوشه tmp قابل ویرایش نیست</a> </span> </div>
          </div>
         </div>
         <!--[if !IE]>end row<![endif]-->         
         "; 
		 $check1=0;
		 }
         ?>
         
         <?php 
		 if ($check1==1&&$check2==1&&$check3==1)
		 {
			 echo "
			 <script language='javascript'>
			 	 document.setup.action ='step2.php';
			 </script>
			 ";
			 echo "
         <!--[if !IE]>start row<![endif]-->
         
         <div class='row'>
          <div class='inputs'> <span class='button blue_button add_button'><span><span><span class='button_ico'><em></span>تائید و ادامه</em></span></span>
           <input name='submit' type='submit' />
           </span><span id='loading_button' style='display:none;'><img src='../css/layout/load3.gif' /></span> </div>
         </div>
         
         <!--[if !IE]>end row<![endif]--> 
		 ";
		 }
		 else {
			 echo "
			 <script language='javascript'>
			 	 document.setup.action ='step1.php';
			 </script>
			 ";
			echo "
			<!--[if !IE]>start row<![endif]-->
         
         <div class='row'>
          <div class='inputs'> <span class='button blue_button search_button'><span><span><span class='button_ico'><em></span>بررسی مجدد</em></span></span>
           <input name='submit' type='submit'/>
           </span><span id='loading_button' style='display:none;'><img src='../css/layout/load3.gif' /></span> </div>
         </div>
         
         <!--[if !IE]>end row<![endif]-->
			"; 
		 }
         ?>
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
