<?php 
$id='P16';
$lv='0';
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
		session_register("UserName");
		session_register("AID");
		session_register("Prm");
		session_register("AName");
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
$query = "select * from Admin where AID=$NAID";
$result=mysql_query($query);
$array=mysql_fetch_array($result);
extract($array);
ALog('Admin',$NAID,'View');
?> 
						
					
				
			
						<div class="dialog_inner_edit">
        
					<ul class="system_messages">
		<li class="red" id="1"><span class="ico"></span><strong class="system_title">وارد کردن نام الزامی است!</strong></li>
        <li class="red" id="2"><span class="ico"></span><strong class="system_title">وارد کردن نام کاربری الزامی است!</strong></li>
        <li class="red" id="3"><span class="ico"></span><strong class="system_title">این نام پیش تر انتخاب شده است!</strong></li>
        <li class="red" id="4"><span class="ico"></span><strong class="system_title">این نام کاربری پیش تر انتخاب شده است!</strong></li>
        <li class="red" id="5"><span class="ico"></span><strong class="system_title">خطا در پر کردن فرم رخ داده است!</strong></li>
        <li class="red" id="6"><span class="ico"></span><strong class="system_title">رمز عبور وارد شده صحیح نیست!</strong></li>
         <li class='green' id='passsuccess'><span class='ico'></span><strong class='system_title'>رمز عبور با موفقیت تغییر یافت.</strong></li>
	</ul>
						<!--[if !IE]>start forms<![endif]-->
						<form action="#" class="search_form general_form">
							<!--[if !IE]>start fieldset<![endif]-->
							<fieldset>
								<!--[if !IE]>start forms<![endif]-->
								<div class="forms">
						<!--[if !IE]>start row<![endif]-->
								<div class="row">
									<label>شناسه مدیر:</label>
									
										<div align="right"><span  >
									    <?php echo $NAID; ?>
										  </span>
										
                                    </div>
								</div>
								<!--[if !IE]>end row<![endif]-->
								<!--[if !IE]>start row<![endif]-->
								<div class="row">
									<label>نام مدیر:</label>
									
										<div align="right"><span >
									    <?php echo $Name; ?>
										  </span>
										
                                    </div>
								</div>
								<!--[if !IE]>end row<![endif]-->
							
								<!--[if !IE]>start row<![endif]-->
								<div class="row">
									<label>نام کاربری:</label>
									
										<span ><?php echo $AUsername; ?></span>
									
								</div>
								<!--[if !IE]>end row<![endif]-->
								
								<!--[if !IE]>start row<![endif]-->
								<div class="row">
									<label>موبایل:</label>
									
										<span><?php echo $Mob; ?></span>
									
								</div>
								<!--[if !IE]>end row<![endif]-->
								<!--[if !IE]>start row<![endif]-->
								<div class="row">
									<label>ایمیل:</label>
									
										<span><?php echo $Email; ?></span>
									
								</div>
								<!--[if !IE]>end row<![endif]-->
                                
								<!--[if !IE]>start row<![endif]-->
		<div class="row">
			<div class="inputs">
			<span class="button2 blue_button edit_button"><span><span><span class="button_ico"></span><em>ویرایش</em></span></span><input name="submit" type="submit" id="<?php echo $AID; ?>" onclick="AdminEditCurrent(this); return false;"/></span>
            <span class="button2 blue_button edit_button"><span><span><span class="button_ico"></span><em>تغییر رمز عبور</em></span></span><input name="submit" type="submit" id="<?php echo $AID; ?>" onclick="ChangePassCurrent(this); return false;"/></span>
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