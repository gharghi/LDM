<?php
$id='P16';
$lv='4';
$FID='F16';
include "../global/db.php";
$NAID=stripslashes(mysql_real_escape_string($_POST['AID']));
$query = "select * from Admin where AID='$NAID'";
$result=mysql_query($query);
$array=mysql_fetch_array($result);
$NName=$array['Name'];
$NAUsername=$array['AUsername'];
$NMob=$array['Mob'];
$NEmail=$array['Email'];
$NLok=$array['Lok'];
$NPrm=$array['Prm'];
//-----Checking Permission-------------
$Nlen=strlen($NPrm);
$Na= array();
$Nstart1=0;
$Nend1=3;
$Nstart2=4;
$Nend2=1;
while ($Nlen>=0)
{
$Nb=substr($NPrm,$Nstart1,$Nend1);
$Na[$Nb]=substr($NPrm,$Nstart2,$Nend2);
$Nstart1=$Nstart1+6;
$Nstart2=$Nstart2+6;
$Nlen--;
}
?>
<!--[if !IE]>start section inner <![endif]-->
<div class="dialog_inner_edit">
	<!--[if !IE]>start forms<![endif]-->
	<form id="PrmAdmin" method="post" class="search_form general_form">
	<!--[if !IE]>start fieldset<![endif]-->
    <input type="hidden" name="AID" value="<?php echo $NAID; ?>" />
	<fieldset>
	<!--[if !IE]>start forms<![endif]-->
	<div class="forms">
		<h3>دسترسی های<?php echo "&nbsp;",$NName; ?></h3>
		<!--[if !IE]>start row<![endif]-->
		<div class="row" >
			<label>کاربر</label>
			<div class="inputs">
				<div align="right"><span class="input_wrapper_checkbox">
									<ul class="inline">
											<li><input id="PUs1" class="checkbox" name="<?php if ($Na['P11']==1) echo 'PUs'; ?>" value="1" type="checkbox" onchange="PrmChk('PUs','1'); return false;" <?php if ($Na['P11']>=1) echo 'checked'; ?>/> نمایش
											&nbsp;&nbsp;<input id="PUs2" class="checkbox" name="<?php if ($Na['P11']==2) echo 'PUs'; ?>" value="2" type="checkbox" onchange="PrmChk('PUs','2'); return false;" <?php if ($Na['P11']>=2) echo 'checked'; ?>/> افزودن
											&nbsp;&nbsp;<input id="PUs3" class="checkbox" name="<?php if ($Na['P11']==3) echo 'PUs'; ?>" value="3" type="checkbox" onchange="PrmChk('PUs','3'); return false;" <?php if ($Na['P11']>=3) echo 'checked'; ?>/> ویرایش
											&nbsp;&nbsp;<input id="PUs4" class="checkbox" name="<?php if ($Na['P11']==4) echo 'PUs'; ?>" value="4" type="checkbox" onchange="PrmChk('PUs','4'); return false;" <?php if ($Na['P11']>=4) echo 'checked'; ?>/> حذف
                                            
                                            &nbsp;&nbsp;<input id="PUs5" class="checkbox" name="<?php if ($Na['P11']==5) echo 'PUs'; ?>" value="5" type="checkbox" onchange="PrmChk('PUs','5'); return false;" <?php if ($Na['P11']>=5) echo 'checked'; ?>/> RIPE DB 
                                            
                                            </li>
										</ul>
				</span>
               
                </div>
            </div>
		</div>
		<!--[if !IE]>end row<![endif]-->
				<!--[if !IE]>start row<![endif]-->
		<div class="row" >
			<label>سخت افزار</label>
			<div class="inputs">
				<div align="right"><span class="input_wrapper_checkbox">
									<ul class="inline">
											<li><input id="PHW1" class="checkbox" name="<?php if ($Na['P13']==1) echo 'PHW'; ?>" value="1" type="checkbox" onchange="PrmChk('PHW','1'); return false;" <?php if ($Na['P13']>=1) echo 'checked'; ?> /> نمایش
											&nbsp;&nbsp;<input id="PHW2" class="checkbox" name="<?php if ($Na['P13']==2) echo 'PHW'; ?>" value="2" type="checkbox" onchange="PrmChk('PHW','2'); return false;" <?php if ($Na['P13']>=2) echo 'checked'; ?>/> افزودن
											&nbsp;&nbsp;<input id="PHW3" class="checkbox" name="<?php if ($Na['P13']==3) echo 'PHW'; ?>" value="3" type="checkbox" onchange="PrmChk('PHW','3'); return false;" <?php if ($Na['P13']>=3) echo 'checked'; ?>/> ویرایش
											&nbsp;&nbsp;<input id="PHW4" class="checkbox" name="<?php if ($Na['P13']==4) echo 'PHW'; ?>" value="4" type="checkbox" onchange="PrmChk('PHW','4'); return false;" <?php if ($Na['P13']>=4) echo 'checked'; ?>/> حذف</li>
										</ul>
				</span>
               
                </div>
            </div>
		</div>
		<!--[if !IE]>end row<![endif]-->
        		<!--[if !IE]>start row<![endif]-->
		<div class="row" >
			<label>آدرسها</label>
			<div class="inputs">
				<div align="right"><span class="input_wrapper_checkbox">
									<ul class="inline">
											<li><input id="PIP1" class="checkbox" name="<?php if ($Na['P12']==1) echo 'PIP'; ?>" value="1" type="checkbox" onchange="PrmChk('PIP','1'); return false;" <?php if ($Na['P12']>=1) echo 'checked'; ?> /> نمایش
											&nbsp;&nbsp;<input id="PIP2" class="checkbox" name="<?php if ($Na['P12']==2) echo 'PIP'; ?>" value="2" type="checkbox" onchange="PrmChk('PIP','2'); return false;" <?php if ($Na['P12']>=2) echo 'checked'; ?>/> افزودن
											&nbsp;&nbsp;<input id="PIP3" class="checkbox" name="<?php if ($Na['P12']==3) echo 'PIP'; ?>" value="3" type="checkbox" onchange="PrmChk('PIP','3'); return false;" <?php if ($Na['P12']>=3) echo 'checked'; ?>/> حذف</li>
										</ul>
				</span>
               
                </div>
            </div>
		</div>
		<!--[if !IE]>end row<![endif]-->
        		<!--[if !IE]>start row<![endif]-->
		<div class="row" >
			<label>دکل</label>
			<div class="inputs">
				<div align="right"><span class="input_wrapper_checkbox">
									<ul class="inline">
											<li><input id="PTw1" class="checkbox" name="<?php if ($Na['P15']==1) echo 'PTw'; ?>" value="1" type="checkbox" onchange="PrmChk('PTw','1'); return false;"  <?php if ($Na['P15']>=1) echo 'checked'; ?>/> نمایش
											&nbsp;&nbsp;<input id="PTw2" class="checkbox" name="<?php if ($Na['P15']==2) echo 'PTw'; ?>" value="2" type="checkbox" onchange="PrmChk('PTw','2'); return false;" <?php if ($Na['P15']>=2) echo 'checked'; ?>/> افزودن
											&nbsp;&nbsp;<input id="PTw3" class="checkbox" name="<?php if ($Na['P15']==3) echo 'PTw'; ?>" value="3" type="checkbox" onchange="PrmChk('PTw','3'); return false;" <?php if ($Na['P15']>=3) echo 'checked'; ?>/> ویرایش
											&nbsp;&nbsp;<input id="PTw4" class="checkbox" name="<?php if ($Na['P15']==4) echo 'PTw'; ?>" value="4" type="checkbox" onchange="PrmChk('PTw','4'); return false;" <?php if ($Na['P15']>=4) echo 'checked'; ?>/> حذف</li>
										</ul>
				</span>
               
                </div>
            </div>
		</div>
		<!--[if !IE]>end row<![endif]-->
        		<!--[if !IE]>start row<![endif]-->
		<div class="row" >
			<label>سوییچ</label>
			<div class="inputs">
				<div align="right"><span class="input_wrapper_checkbox">
									<ul class="inline">
											<li><input id="PSw1" class="checkbox" name="<?php if ($Na['P14']==1) echo 'PSw'; ?>" value="1" type="checkbox" onchange="PrmChk('PSw','1'); return false;" <?php if ($Na['P14']>=1) echo 'checked'; ?> /> نمایش
											&nbsp;&nbsp;<input id="PSw2" class="checkbox" name="<?php if ($Na['P14']==2) echo 'PSw'; ?>" value="2" type="checkbox" onchange="PrmChk('PSw','2'); return false;" <?php if ($Na['P14']>=2) echo 'checked'; ?>/> افزودن
											&nbsp;&nbsp;<input id="PSw3" class="checkbox" name="<?php if ($Na['P14']>=3) echo 'PSw'; ?>" value="3" type="checkbox" onchange="PrmChk('PSw','3'); return false;" <?php if ($Na['P14']>=3) echo 'checked'; ?>/> ویرایش
											&nbsp;&nbsp;<input id="PSw4" class="checkbox" name=" <?php if ($Na['P14']>=4) echo 'PSw'; ?>" value="4" type="checkbox" onchange="PrmChk('PSw','4'); return false;" <?php if ($Na['P14']>=4) echo 'checked'; ?>/> حذف</li>
										</ul>
				</span>
               
                </div>
            </div>
		</div>
		<!--[if !IE]>end row<![endif]-->
        		<!--[if !IE]>start row<![endif]-->
		<div class="row" >
			<label>مدیر</label>
			<div class="inputs">
				<div align="right"><span class="input_wrapper_checkbox">
									<ul class="inline">
											<li><input id="PAd1" class="checkbox" name="<?php if ($Na['P16']==1) echo 'PAd'; ?>" value="1" type="checkbox" onchange="PrmChk('PAd','1'); return false;" <?php if ($Na['P16']>=1) echo 'checked'; ?> /> نمایش 
											&nbsp;&nbsp;<input id="PAd2" class="checkbox" name="<?php if ($Na['P16']==2) echo 'PAd'; ?>" value="2" type="checkbox" onchange="PrmChk('PAd','2'); return false;" <?php if ($Na['P16']>=2) echo 'checked'; ?>/> ویرایش 
                                            &nbsp;&nbsp;<input id="PAd3" class="checkbox" name="<?php if ($Na['P16']==3) echo 'PAd'; ?>" value="3" type="checkbox" onchange="PrmChk('PAd','3'); return false;" <?php if ($Na['P16']>=3) echo 'checked'; ?>/> تغییر رمز عبور</li>
                                            <li><input id="PAd4" class="checkbox" name="<?php if ($Na['P16']==4) echo 'PAd'; ?>" value="4" type="checkbox" onchange="PrmChk('PAd','4'); return false;" <?php if ($Na['P16']>=4) echo 'checked'; ?>/> مشاهده پسوردها </li>
											<li><input id="PAd5" class="checkbox" name="<?php if ($Na['P16']==5) echo 'PAd'; ?>" value="5" type="checkbox" onchange="PrmChk('PAd','5'); return false;" <?php if ($Na['P16']>=5) echo 'checked'; ?>/> دسترسی کامل</li>
										</ul>
				</span>
               
                </div>
            </div>
		</div>
		<!--[if !IE]>end row<![endif]-->
        <!--[if !IE]>start row<![endif]-->
		<div class="row" >
			<label>گزارش ها</label>
			<div class="inputs">
				<div align="right"><span class="input_wrapper_checkbox">
									<ul class="inline">
											<li><input id="PAu1" class="checkbox" name="<?php if ($Na['P17']==1) echo 'PAu'; ?>" value="1" type="checkbox" onchange="PrmChk('PAu','1'); return false;"  <?php if ($Na['P17']>=1) echo 'checked'; ?>/> جستجو
											&nbsp;&nbsp;<input id="PAu2" class="checkbox" name="<?php if ($Na['P17']==2) echo 'PAu'; ?>" value="2" type="checkbox" onchange="PrmChk('PAu','2'); return false;" <?php if ($Na['P17']>=2) echo 'checked'; ?>/> حذف</li>
										</ul>
				</span>
               
                </div>
            </div>
		</div>
		<!--[if !IE]>end row<![endif]-->
         <!--[if !IE]>start row<![endif]-->
		<div class="row" >
			<label> رنج IP</label>
			<div class="inputs">
				<div align="right"><span class="input_wrapper_checkbox">
									<ul class="inline">
											<li><input id="PPF1" class="checkbox" name="<?php if ($Na['P18']==1) echo 'PPF'; ?>" value="1" type="checkbox" onchange="PrmChk('PPF','1'); return false;"  <?php if ($Na['P18']>=1) echo 'checked'; ?>/> مشاهده
											&nbsp;&nbsp;<input id="PPF2" class="checkbox" name="<?php if ($Na['P18']==2) echo 'PPF'; ?>" value="2" type="checkbox" onchange="PrmChk('PPF','2'); return false;" <?php if ($Na['P18']>=2) echo 'checked'; ?>/> دسترسی کامل</li>
										</ul>
				</span>
               
                </div>
            </div>
		</div>
		<!--[if !IE]>end row<![endif]-->
         <!--[if !IE]>start row<![endif]-->
		<div class="row" >
			<label>پورت و VLAN</label>
			<div class="inputs">
				<div align="right"><span class="input_wrapper_checkbox">
									<ul class="inline">
											<li><input id="PV1" class="checkbox" name="<?php if ($Na['P19']==1) echo 'PV'; ?>" value="1" type="checkbox" onchange="PrmChk('PV','1'); return false;"  <?php if ($Na['P19']>=1) echo 'checked'; ?>/> مشاهده
											&nbsp;&nbsp;<input id="PV2" class="checkbox" name="<?php if ($Na['P19']==2) echo 'PV'; ?>" value="2" type="checkbox" onchange="PrmChk('PV','2'); return false;" <?php if ($Na['P19']>=2) echo 'checked'; ?>/> دسترسی کامل</li>
										</ul>
				</span>
               
                </div>
            </div>
		</div>
		<!--[if !IE]>end row<![endif]-->
         <!--[if !IE]>start row<![endif]-->
		<div class="row" >
			<label>تجهیزات</label>
			<div class="inputs">
				<div align="right"><span class="input_wrapper_checkbox">
									<ul class="inline">
											<li><input id="PT1" class="checkbox" name="<?php if ($Na['P20']==1) echo 'PT'; ?>" value="1" type="checkbox" onchange="PrmChk('PT','1'); return false;"  <?php if ($Na['P20']>=1) echo 'checked'; ?>/> مشاهده
											&nbsp;&nbsp;<input id="PT2" class="checkbox" name="<?php if ($Na['P20']==2) echo 'PT'; ?>" value="2" type="checkbox" onchange="PrmChk('PT','2'); return false;" <?php if ($Na['P20']>=2) echo 'checked'; ?>/> حذف</li>
										</ul>
				</span>
                </div>
            </div>
		</div>
		<!--[if !IE]>end row<![endif]-->
        
		
		         <!--[if !IE]>start row<![endif]-->
		<div class="row" >
			<label>پشتیبانی</label>
			<div class="inputs">
				<div align="right"><span class="input_wrapper_checkbox">
									<ul class="inline">
											<li><input id="SF1" class="checkbox" name="<?php if ($Na['P22']==1) echo 'SF'; ?>" value="1" type="checkbox" onchange="PrmChk('SF','1'); return false;"  <?php if ($Na['P22']>=1) echo 'checked'; ?>/> ثبت
											&nbsp;&nbsp;<input id="SF2" class="checkbox" name="<?php if ($Na['P22']==2) echo 'SF'; ?>" value="2" type="checkbox" onchange="PrmChk('SF','2'); return false;" <?php if ($Na['P22']>=2) echo 'checked'; ?>/> ؟؟؟؟؟؟</li>
										</ul>
				</span>
                </div>
            </div>
		</div>
		<!--[if !IE]>end row<![endif]-->
        
        
        
                 <!--[if !IE]>start row<![endif]-->
		<div class="row" >
			<label> رمزهای عبور</label>
			<div class="inputs">
				<div align="right"><span class="input_wrapper_checkbox">
									<ul class="inline">
	<li><input id="SP1" class="checkbox" name="<?php if ($Na['P21']==1) echo 'SP'; ?>" value="1" type="checkbox" onchange="PrmChk('SP','1'); return false;"  <?php if ($Na['P21']>=1) echo 'checked'; ?>/> مشاهده
											</li>
										</ul>
				</span>
                </div>
            </div>
		</div>
		<!--[if !IE]>end row<![endif]-->
        
        
        
        
        
		<!--[if !IE]>start row<![endif]-->
		<div class="row">
			<div class="inputs">
			<span class="button2 blue_button ok_button"><span><span><span class="button_ico"></span><em>تایید</em></span></span><input name="submit" type="submit" onclick="EditPrm(); return false;"/></span>
		
			<span class="button2 blue_button cancel_button"><span><span><span class="button_ico"></span><em>بازگشت</em></span></span><input name="submit" type="submit" onclick="loadpage('admin/list.php'); return false;"/></span>
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
