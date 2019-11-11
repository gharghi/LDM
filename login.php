<?php
function __autoload($class_name)
    {
        include_once 'inc/class.' . $class_name . '.inc.php';
    }
require_once("global/config.php");
require "lang/".$lang.".php"; 
$error=8;
if (isset($_COOKIE['Login']))
{
	$DBS= new Database;
	$DBS->Connect();
	$DBS->Select('Admin','*',"AUsername='".$_COOKIE['Username']."'");
	if ($_COOKIE['Login']==$DBS->Select_Result[0]['Cookie'])
	{
		session_save_path('tmp');
		session_start();
		$_SESSION['UserName']=$DBS->Select_Result[0]['AUsername'];
		$_SESSION['AID']=$DBS->Select_Result[0]['AID'];
		$_SESSION['Prm']=$DBS->Select_Result[0]['Prm'];
		$_SESSION['AName']=$DBS->Select_Result[0]['Name'];
		$_SESSION['logintime']=time();
	//------Insert Admin login information to database---------
		require_once("global/jdatetime.class.php");
		$date = new jDateTime(false, true, 'Asia/Tehran');
		$FDate=$date->date("Y-m-d H:i:s");
		$AID=$_SESSION['AID'];
		$IP=$_SERVER['REMOTE_ADDR'];
		$Browser=$_SERVER['HTTP_USER_AGENT'];
		$DBS->Insert('AdminKogin','AID,IP,Browser,Date,Salt','('.$AID.','.$IP.','.$Browser.','.$FDate.','.$salt.')');
	//----------------------------------------------------------
		header("location:home/home.php");
	}
}
if (!empty($_POST['Username']))
{
$DB1= new Database;
$DB1->Connect();
$AUsername=$DB1->Escape($_POST['Username']);
$Password=$_POST['Password'];
$DB1->Select('Admin','*',"AUsername='".$AUsername."'");
//------for cookie
$Userpass=$DB1->Select_Result[0]['Password'];
$salt='T'.(int)(time()/10);
$algo='sha512';
$hash2=hash_hmac($algo,$salt,$Userpass);
//------------
if ($EncryptLogin==1)
{
$Userpass=$DB1->Select_Result[0]['Password'];
$salt='T'.(int)(time()/10);
$algo='sha512';
$hash=hash_hmac($algo,$salt,$Userpass);
}
else {
	$hash=$DB1->Select_Result[0]['Password'];
}
if ($AUsername==$DB1->Select_Result[0]['AUsername']&&$Password==$hash&&$DB1->Select_Result[0]['Lok']==1)
{
	if ((isset($_POST['Rem']))&&($_POST['Rem']==1))
	{
		$update['Cookie']=$hash2;
		$DB2= new Database;
		$DB2->Connect();
		$DB2->Update('Admin',$update,"AUsername='".$AUsername."'");
		setcookie('Login',$hash2,time()+$CookieTime);
		setcookie('Username',$DB1->Select_Result[0]['AUsername'],time()+$CookieTime);
	}
	session_save_path('tmp');
	session_start();
	$_SESSION['UserName']=$AUsername; 
	$_SESSION['AID']=$DB1->Select_Result[0]['AID'];
	$_SESSION['Prm']=$DB1->Select_Result[0]['Prm'];
	$_SESSION['AName']=$DB1->Select_Result[0]['Name'];
	$_SESSION['logintime']=time();
//------Insert Admin login information to database---------
 	require_once("global/jdatetime.class.php");
	$date = new jDateTime(false, true, 'Asia/Tehran');
	$FDate=$date->date("Y-m-d H:i:s");
	$AID=$_SESSION['AID'];
	$IP=$_SERVER['REMOTE_ADDR'];
	$Browser=$_SERVER['HTTP_USER_AGENT'];
	$DB3= new Database;
	$DB3->Connect();
	$DB3->Insert('AdminKogin','AID,IP,Browser,Date,Salt','('.$AID.','.$IP.','.$Browser.','.$FDate.','.$salt.')');
//----------------------------------------------------------
	header("location:home/home.php");
}
else {
	$error=1;
}
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" dir="rtl">
<head>
<link rel="icon" type="image/ico" href="favicon.ico" />
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo _LOGINTITLE; ?></title>
<link rel="shortcut icon" href="css/layout/favicon.ico" type="image/x-icon">
<link rel="icon" href="css/layout/favicon.ico" type="image/x-icon">
<link rel="stylesheet" type="text/css" href="css/meta-admin-login.css" />
<link rel="stylesheet" type="text/css" href="css/green-theme-login.css" />
<link rel="stylesheet" type="text/css" href="css/ui/jquery-ui-1.10.0.custom.css" />
<script src="scripts/hmac-sha512.js"></script>
	

<!--[if lte IE 6]><link media="screen" rel="stylesheet" type="text/css" href="css/ie.css" /><![endif]-->
<script type="text/javascript" src="scripts/jquery-1.9.0.js"></script>
<script type="text/javascript" src="scripts/jquery-ui-1.10.0.custom.js"></script>
<script type="text/javascript" src="scripts/jquery.mousewheel-3.0.6.pack.js"></script>

	<!-- Add fancyBox main JS and CSS files -->
	<script type="text/javascript" src="scripts/jquery.fancybox.js?v=2.1.5"></script>
	<link rel="stylesheet" type="text/css" href="css/jquery.fancybox.css?v=2.1.5" media="screen" />
<script src="scripts/login.js"></script>

<!--[if lte IE 6]><link media="screen" rel="stylesheet" type="text/css" href="css/ie-login.css" /><![endif]-->
</head>
<body>
</div>
<!--[if !IE]>start wrapper<![endif]-->
<div id="wrapper"> 
 <!--[if !IE]>start header<![endif]-->
 <div id="header">
  <div class="inner">
   <h1 id="logo"><a href="#"><?php echo _DOCNAME; ?></a></h1>
  </div>
 </div>
 <!--[if !IE]>end header<![endif]--> 
 <!--[if !IE]>start content<![endif]-->
 <div id="content"> 
  <!--[if !IE]>start login_wrapper<![endif]-->
  
  <div id="login_wrapper"> <span class="extra1"></span>
   <div class="title_wrapper">
    <h2><?php echo _LOGIN_TO_SYSTEM; ?></h2>
    <a href="javascript:ForgetPass(this);" ><?php echo _FORGETPASS; ?></a> </div>
   <form action="login.php" method="post" id="loginform" onsubmit="a();">
    <fieldset>
     <?php if ($error==1) echo "<div class='login_error'>
                        <ul class='system_messages'>
                        <li class='red'><span class='ico'></span><strong class='system_title'>"._WRONGPASS."</strong></li>
                        </ul>
                        </div>"; ?>
     <div class="login_error hidden" id="PassChanged">
                        <ul class='system_messages'>
                        <li class='green'><span class='ico'></span><strong class='system_title'><?php echo _PASS_CHANGED; ?></strong></li>
                        </ul>
                        </div>
     <!--[if !IE]>start row<![endif]-->
     
     <div class="row">
      <label><?php echo _USERNAME; ?>:</label>
      <span class="input_wrapper">
      <input id="Usernamefield" class="text" name="Username" type="text" />
      </span> </div>
     
     <!--[if !IE]>end row<![endif]--> 
     
     <!--[if !IE]>start row<![endif]-->
      
     <div class="row">
      <label><?php echo _PASSWORD; ?>:</label>
      <span class="input_wrapper">
      <input class="text" name="Password" type="password" id="password"/>
      </span> </div>
     
     <!--[if !IE]>end row<![endif]--> 
     
     <!--[if !IE]>start row<![endif]-->
     
     <div class="row">
      <label class="inline"><?php echo _REMEMBERME; ?>&nbsp;
       <input class="checkbox" name="Rem" type="checkbox" value="1" />
      </label>
     </div>
     <!--[if !IE]>end row<![endif]--> 
     <!--[if !IE]>start row<![endif]-->
     <div class="row">
      <div class="inputs small_inputs" style="cursor:pointer;"> <span class="button2 blue_button unlock_button" ><span onclick=<?php if ($EncryptLogin==1) echo "'a();'"; else echo "'b();'"; ?>><span><em><?php echo _LOGIN; ?><span class="button_ico"></span></em></span></span>
       <input name="login" type="submit" onclick= <?php if ($EncryptLogin==1) echo "'a(); return false;'"; else echo "'b(); return false;'"; ?>/>
       </span><span id="loading" style="float:right; display:none;"><img src="css/layout/load3.gif" /></span> </div>
     </div>
     <!--[if !IE]>end row<![endif]-->
     </fieldset>
</form>
</div>
  <!--[if !IE]>end login_wrapper<![endif]--> 
  </div>
 <!--[if !IE]>end content<![endif]--> 
 
</div>
<!--[if !IE]>end wrapper<![endif]-->
</body>
</html>
