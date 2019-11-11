<?php
$id='P12';
$lv='2';
$FID='F12';
include('../global/header.php'); ?>

<span class="pages" id="MN22"></span>
<?php
$UserID=stripslashes(mysql_real_escape_string($_GET['UserID']));
$DB= new Database;
$DB->Connect();
NameUser($UserID);
$DB->Select('IP','*',"UserID=".$UserID." and Object='User' order by IPID desc");
$num=$DB->Select_Rows;

?>
<script language="javascript">
//-----------------------------------------------------
//fill the second field
function AddIP1(ID){
	var value=$(ID).val();
	$('.row#IP2').html(loading4);
	$.post('../ip/add2.php',{Size:value},function(data){
		$('.row#IP2').hide().html(data).fadeIn('slow');
		});
}
//-----------------------------------------------------
//-----------------------------------------------------
//fill the third field
function AddIP2(ID,Size){
	var value=$(ID).val();
	$('.row#IP3').html(loading4);
	Size=Size.substring(1);
	$.post('../ip/add3.php',{PID:value,CIDR:Size},function(data){
		$('.row#IP3').hide().html(data).fadeIn('slow');
		$('#editbtn').delay(300).fadeIn('slow');
		});
}
//-----------------------------------------------------
//-----------------------------------------------------
//Add IP's into Database
function AddIP3(ID,UserID){
	var FID='#'+ID;
	var value=$(FID).serialize();
	$('.loading_button').html(loading4).show();
	$.post('../ip/reg.php',value,function(data){
		if(data==1)
		{
			loadpage('../ip/add.php?UserID='+UserID);
		}
		else if (data=='a')
		{
			$('.loading_button').hide();
			$(".red#3").show().delay(2000).fadeOut(4000);
		}
		else if (data=='g')
		{
			$('.loading_button').hide();
			$("#EF").show().delay(2000).fadeOut(4000);
		}
		else
		{
			$('.loading_button').hide();
			$(".red#2").show().delay(2000).fadeOut(4000);
			
		}
		});
}
//-----------------------------------------------------
</script>
 <!--[if !IE]>start info<![endif]-->
<div id="info"> 
  <!--[if !IE]>start section<![endif]-->
  <div class="section">
<!--[if !IE]>start section inner <![endif]-->
<div class="section_inner">
	<ul class="system_messages">
<li class="green" id="1gren"><span class="ico"></span><strong class="system_title">آدرس با موفقیت ثبت شد.</strong></li>
<li class="green" id="IPDelete"><span class="ico"></span><strong class="system_title">آدرس با موفقیت حذف شد.</strong></li>
<li class="red" id="IPDeleteError"><span class="ico"></span><strong class="system_title">خطا در پاک کردن رخ داده است.</strong></li>
<li class="red" id="2"><span class="ico"></span><strong class="system_title">خطا رخ داده است!</strong></li>
<li class="red" id="3"><span class="ico"></span><strong class="system_title">این آدرس پیشتر ثبت شده است!</strong></li>
<li class="red" id="6"><span class="ico"></span><strong class="system_title">لطفا ابتدا آدرسهای اختصاص داده شده را حذف نمایید!</strong></li>
<li class="red" id="IPD"><span class="ico"></span><strong class="system_title">ابتدا میبایست آدرس ها را از RIPE DB حذف نمائید! </strong></li>
<li class="red" id="7"><span class="ico"></span><strong class="system_title">لطفا ابتدا سخت افزارهای اختصاص داده شده را حذف نمایید!</strong></li>
<li class="red" id="5"><span class="ico"></span><strong class="system_title">خطا در حذف مشترک رخ داده است!</strong></li>
<li class="green" id="PSuc"><span class="ico"></span><strong class="system_title">آدرس با موفقیت در RIPE DB ثبت گردید.</strong></li>
<li class="green" id="PDSuc"><span class="ico"></span><strong class="system_title">آدرس با موفقیت در RIPE DB حذف گردید.</strong></li>
<li class="red" id="PUnk"><span class="ico"></span><strong class="system_title">در ثبت اطلاعات مشکلی رخ داده است!</strong></li>
<li class="red" id="PDUnk"><span class="ico"></span><strong class="system_title">در حذف اطلاعات مشکلی رخ داده است!</strong></li>
<li class="red" id="PExs"><span class="ico"></span><strong class="system_title">این کاربر پیشتر در RIPE DB ثبت شده است!</strong></li>
<li class="red" id="PDExs"><span class="ico"></span><strong class="system_title">این آدرس در RIPE DB وجود ندارد!</strong></li>
<li class="red" id="EF"><span class="ico"></span><strong class="system_title">لطفا تمام فیلد ها را پر نمائید!</strong></li>
<li class="red" id="PExs2"><span class="ico"></span><strong class="system_title">ابتدا میبایست Person Object را ایجاد نمائید!</strong></li>
	</ul>
    <div class="thin_wrapper1">

	<!--[if !IE]>start forms<![endif]-->
	<form id="<?php echo $FID; ?>" method="post" class="search_form general_form">
	<!--[if !IE]>start fieldset<![endif]-->
	<fieldset>
    <input type="hidden" name="UserID" value="<?php echo $UserID; ?>" />
	<!--[if !IE]>start forms<![endif]-->
	<div class="forms">
		<h3>افزودن IP به <?php echo NameUser($UserID); ?></h3>
		<!--[if !IE]>start row<![endif]-->
      <div class="row">
        <label>تعداد آدرسها:</label>
 <div class="thin_input" > <span class="input_wrapper blank medium_input">
          <select name="count" onchange='AddIP1(this);'>
 
          	<option  selected>&nbsp;</option>
            <option value="S32"><?php echo 'یکی'; ?></option>
            <option value="S30"><?php echo 'بین 1 تا 2'; ?></option>
            <option value="S29"><?php echo 'بین 3 تا 6'; ?></option>
            <option value="S28"><?php echo 'بین 7 تا 14'; ?></option>
            <option value="S27"><?php echo 'بین 15 تا 30'; ?></option>
            <option value="S26"><?php echo 'بین 31 تا 62'; ?></option>
            <option value="S25"><?php echo 'بین 63 تا 126'; ?></option>
            <option value="S24"><?php echo 'بین 127 تا 254'; ?></option>
          </select>
          </span> </div>
      </div>
      <!--[if !IE]>end row<![endif]-->
      
			<!--[if !IE]>start row<![endif]-->
      <div class="row" id="IP2">
      </div>
      <!--[if !IE]>end row<![endif]-->
      <!--[if !IE]>start row<![endif]-->
      <div class="row" id="IP3">
      </div>
      <!--[if !IE]>end row<![endif]-->
      <!--[if !IE]>start row<![endif]-->
  <div class="row" id="editbtn">
   <div class="inputs"> <span class="button2 blue_button add_button"><span><span><em><span class="button_ico"></span><?php echo _IP_ADD; ?></em></span></span>
    <input id="UserButton" name="submit" type="submit" onclick="AddIP3('<?php echo $FID; ?>','<?php echo $UserID; ?>'); return false;"/>
    </span> <span class="Ad_loading_button"></span></div>
  </div>
  <!--[if !IE]>end row<![endif]-->
		
	</div>
	<!--[if !IE]>end forms<![endif]-->
	</fieldset>
	<!--[if !IE]>end fieldset<![endif]-->
	</form>
	<!--[if !IE]>end forms<![endif]-->
    </div>
    <div class="thin_wrapper2">
    
    
    
    <div class="title_wrapper">
    <h2>لیست IP</h2>
    </div>
    
    <!--[if !IE]>start table_wrapper<![endif]-->
    <div class="table_wrapper">
      <?php
$i=0;
$j=1;
echo "<div class='table_wrapper_inner'>
							<table cellpadding='0' cellspacing='0' width='100%'>
								<thead><tr>
									<th  style='width:12px;'>#</th>
									<th >IP</th>
									<th style='width: 50px;'>دستورها</th>
								</tr>
								</thead>";
								
while ($i < $num) {
	
	$IPID=$DB->Select_Result[$i]['IPID'];
	$Oct1=$DB->Select_Result[$i]['Oct1'];
	$Oct2=$DB->Select_Result[$i]['Oct2'];
	$Oct3=$DB->Select_Result[$i]['Oct3'];
	$Oct4=$DB->Select_Result[$i]['Oct4'];
	$netname=$DB->Select_Result[$i]['netname'];
	$CIDR=$DB->Select_Result[$i]['CIDR'];
	if ($Oct4%(pow(2,(32-$CIDR)))==0){
	echo "<tbody><tr class='first' id='$IPID'>
									<td>",$j,"</td>
									<td>$Oct1.$Oct2.$Oct3.$Oct4/$CIDR</td>
									<td>
										<div  class='actions' style='width:66px !important;'>
											<ul>
<li><a class='Accopen' id='$IPID' href='javascript:IPOpen($IPID);' title='اطلاعات بیشتر' ></a></li>
<li><a class='Accdelete' id='$IPID' href='javascript:IPDelete($IPID);' title='پاک کردن' ></a></li>
<li id='RipeReg$IPID'"; if ($netname!='0') echo  " style='display:none;'";
echo "><a class='Accreg' id='$IPID' href='javascript:IPReg($IPID);' title='ثبت در RIPE' ></a></li>
<li id='RipeClear$IPID'"; if ($netname=='0') echo  " style='display:none;'";
echo "><a class='Accclear' id='$IPID' href='javascript:IPClear($IPID);' title='حذف از RIPE' ></a></li>
											</ul>
										</div>
									</td>
								</tr>";
	$j++;
	}
	$i++;
	}	
?>
      </tbody>
      </table>
    </div>
</div>
    
</div>
<!--[if !IE]>end section inner<![endif]-->
    </div>
    <!--[if !IE]>end section inner<![endif]-->

    </div>
  <!--[if !IE]>end section<![endif]--> 
  
</div>
<!--[if !IE]>end info<![endif]-->
  <?php  include("../global/footer.php"); ?>