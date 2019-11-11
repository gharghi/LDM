<?php
$id='P16';
$lv='0';
$FID='F163';
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
$query="select Name from Admin where AID=$AID";
$result=mysql_query($query);
$array=mysql_fetch_array($result);
$NName=$array['Name'];
?>
<!--[if !IE]>start section inner <![endif]-->
<div class="section_inner">
	<ul class="system_messages">
		<li class="red" id="<?php echo $FID.'1'; ?>"><span class="ico"></span><strong class="system_title">رمز عبور وارده اشتیاه است!</strong></li>
        <li class="red" id="<?php echo $FID.'2'; ?>"><span class="ico"></span><strong class="system_title">رمز عبور جدید صحیح نیست!</strong></li>
    </ul>
	<!--[if !IE]>start forms<![endif]-->
	<form id="<?php echo $FID; ?>" method="post" class="search_form  ">
    <input type="hidden" name="AID" value="<?php echo $AID; ?>" id="chngphid" />
	<!--[if !IE]>start fieldset<![endif]-->
	<fieldset>
	<!--[if !IE]>start forms<![endif]-->
	<div class=" dialog">
		<h3>تغییر رمز عبور <?php echo $NName; ?></h3>
	 <!--[if !IE]>start row<![endif]-->
		<div class="row">
			<label>رمز عبور پیشین:</label>
			<div class="inputs">
				<div align="right"><span class="input_wrapper">
				<input class="text" id="<?php echo $FID.'pass'; ?>" name="old" type="password"/>
				</span>
			    </div>
            </div>
		</div>
		<!--[if !IE]>end row<![endif]-->
        <!--[if !IE]>start row<![endif]-->
		<div class="row">
			<label>رمز عبور:</label>
			<div class="inputs">
				<div align="right"><span class="input_wrapper">
				<input class="text" id="ChngPP" name="Password" type="password" onblur="Validatepass(this,'<?php echo $FID.'3'; ?>');"/>
				</span>
				<span id="<?php echo $FID.'3'; ?>" class="system positive" >&nbsp;</span>
                <span id="<?php echo $FID.'3L'; ?>" class="system negative"  >رمز عبور باید بیشتر از 7 حرف باشد</span>
                <span id="<?php echo $FID.'3N'; ?>" class="system negative"  >رمز عبور باید شامل حرف و عدد باشد</span>
                <span id="<?php echo $FID.'3E'; ?>" class="system negative"  >این فیلد نمیتواند خالی باشد</span>
                </div>
            </div>
		</div>
		<!--[if !IE]>end row<![endif]-->
        <!--[if !IE]>start row<![endif]-->
		<div class="row">
			<label>تکرار رمز عبور:</label>
			<div class="inputs">
				<div align="right"><span class="input_wrapper">
				<input class="text" name="conf" type="password" onblur="Confpass(this,'<?php echo $FID.'4'; ?>');"/>
				</span>
				<span id="<?php echo $FID.'4'; ?>" class="system positive" >&nbsp;</span>
                <span id="<?php echo $FID.'4'; ?>" class="system negative"  >رمز وارده صحیح نیست</span>
                <span id="<?php echo $FID.'4E'; ?>" class="system negative"  >این فیلد نمیتواند خالی باشد</span>
                </div>
            </div>
		</div>
		<!--[if !IE]>end row<![endif]-->
       	<!--[if !IE]>start row<![endif]-->
		<div class="row">
			<div class="inputs">
			<span class="button2 blue_button ok_button"><span><span><span class="button_ico"></span><em>تایید</em></span></span><input name="submit" type="submit" onclick="ChPassPostCurrent('<?php echo $FID; ?>'); return false;"/></span>
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
