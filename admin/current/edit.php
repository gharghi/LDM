<?php
$id='P16';
$lv='0';
$FID='F16';
require "../../global/config.php";
require "../../global/functions.php";
//-----------Connecting to Database--------
$con=mysql_connect($DBserver,$DBuser,$DBpass);
if (!$con)
	die('Could not Connect to Database');
mysql_select_db($DBname);
session_start();
if (isset($_COOKIE['Login'])){
//------------------------------------
$result3=mysql_query("select * from Admin where AUsername='".$_COOKIE['Username']."'");
$array3=mysql_fetch_array($result3);
if ($_COOKIE['Login']==$array3['Cookie'])
{ 
if (!isset($_SESSION['UserName']))
	if (!isset($_SESSION['UserName']))
	{
		session_start();
	}
		 $Username=$_SESSION['UserName']=$array3['AUsername']; 
		 $AID=$_SESSION['AID']=$array3['AID'];
		 $Prm=$_SESSION['Prm']=$array3['Prm'];
		 $AName=$_SESSION['AName']=$array3['AName'];
		
}
else {
	echo "<script language='javascript'>RunOut();</script>"; 
		exit;
}
}
else if (isset($_SESSION['UserName'])&&(($_SESSION['logintime']+$SessTime)>time()))
	{ 
		 $Username=$_SESSION['UserName']; 
		 $_SESSION['logintime']=time();
		 $AID=$_SESSION['AID'];
		 $Prm=$_SESSION['Prm'];
		 $AName=$_SESSION['AName'];
	}
else {
	echo "<script language='javascript'>RunOut();</script>"; 
		exit;
}
//-----Checking Permission-------------
$len=strlen($Prm);
$a= array();
$start1=0;
$end1=3;
$start2=4;
$end2=1;
while ($len>=0)
{
$b=substr($Prm,$start1,$end1);
$a[$b]=substr($Prm,$start2,$end2);
$start1=$start1+6;
$start2=$start2+6;
$len--;
}
if ($a[$id]<$lv)
{
	echo "<script language='javascript'> AlertPrm(); </script>";
	exit;
} 
$NAID=$AID;
$query = "select * from Admin where AID='$NAID'";
$result=mysql_query($query);
$array=mysql_fetch_array($result);
$NName=$array['Name'];
$NAUsername=$array['AUsername'];
$NMob=$array['Mob'];
$NEmail=$array['Email'];
?>
<!--[if !IE]>start section inner <![endif]-->
<div class="dialog_inner_edit">
<ul class="system_messages">
		<li class="red" id="1"><span class="ico"></span><strong class="system_title">وارد کردن نام الزامی است!</strong></li>
        <li class="red" id="5"><span class="ico"></span><strong class="system_title">این نام پیش تر انتحاب شده است!</strong></li>
        <li class="red" id="3"><span class="ico"></span><strong class="system_title">خطا در پر کردن فرم رخ داده است!</strong></li>
        <li class='green' id='4'><span class='ico'></span><strong class='system_title'>اطلاعات با موفقیت ویرایش گردید.</strong></li>
	</ul>
	<!--[if !IE]>start forms<![endif]-->
	<form id="EditAdminCurrent"  class="search_form general_form">
	<!--[if !IE]>start fieldset<![endif]-->
    <input type="hidden" name="AID" value="<?php echo $NAID; ?>" />
	<fieldset>
	<!--[if !IE]>start forms<![endif]-->
	<div class="forms">
		<h3>ویرایش<?php echo "&nbsp;",$NName; ?></h3>
		<!--[if !IE]>start row<![endif]-->
		<div class="row" >
			<label>نام مدیر:</label>
			<div class="inputs">
				<div align="right"><span class="input_wrapper">
				<input class="text" name="Name" type="text" value="<?php echo $NName; ?>" onblur="validateDB(this,'<?php echo $FID.'1'; ?>');" />
				</span>
                <span id="<?php echo $FID.'1E'; ?>" class="system negative"  >این فیلد نمیتواند خالی باشد</span>
                <span id="<?php echo $FID.'1'; ?>" class="system negative"  >این نام پیش تر انتخاب شده است!</span>
                </div>
            </div>
		</div>
		<!--[if !IE]>end row<![endif]-->
        <!--[if !IE]>start row<![endif]-->
		<div class="row">
			<label>موبایل:</label>
			<div class="inputs">
				<div align="right"><span class="input_wrapper">
				<input class="text" name="Mob" type="text" value="<?php echo $NMob; ?>" placeholder="نمونه: 9171112244" onblur="ValidateInt(this,'<?php echo $FID.'5'; ?>');"/>
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
				<input class="text" name="Email" type="text" value="<?php echo $NEmail; ?>" placeholder="نمونه: info@domain.com"/>
				</span>
		
                </div>
            </div>
		</div>
		<!--[if !IE]>end row<![endif]-->
		<!--[if !IE]>start row<![endif]-->
		<div class="row">
			<div class="inputs">
			<span class="button2 blue_button ok_button"><span><span><span class="button_ico"></span><em>تایید</em></span></span><input name="submit" type="submit" onclick="EditAdminPostCurrent(); return false;"/></span>
		<span class="button2 blue_button cancel_button"><span><span><span class="button_ico"></span><em>بازگشت</em></span></span><input name="submit" type="submit" onclick="AdminViewCurrent('<?php echo $AID; ?>'); return false;"/></span>
			
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
