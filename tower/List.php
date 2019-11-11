<?php
$id='P15';
$lv='1';
$FID='F15';
include "../global/db.php";
$result=mysql_query("select * from Tower order by TWID");
$num=mysql_num_rows($result);
?>
<ul class="system_messages">
 <li class="red" id="11"><span class="ico"></span><strong class="system_title">نام میبایست وارد شود!</strong></li>
 <li class="red" id="12"><span class="ico"></span><strong class="system_title">شماره تلفن میبایست وارد شود!</strong></li>
 <li class="red" id="13"><span class="ico"></span><strong class="system_title">خطایی روی داده است!</strong></li>
 <li class="red" id="14"><span class="ico"></span><strong class="system_title">این نام پیشتر ثبت شده است!</strong></li>
 <li class="red" id="15"><span class="ico"></span><strong class="system_title">ابتدا سوئیچ های انتساب یافتع را پاک کنید!</strong></li>
 <li class="green" id="11"><span class="ico"></span><strong class="system_title">مرکز با موفقیت ثبت گردید.</strong></li>
 <li class="green" id="12"><span class="ico"></span><strong class="system_title">Prefix با موفقیت حذف گردید.</strong></li>
</ul>
<!--[if !IE]>start forms<![endif]-->
<form id="Tower" method="post" class="search_form general_form">
 
 <!--[if !IE]>start fieldset<![endif]-->
 
 <fieldset>
  <div class="addicon" onClick="OpenAddTower(this);"> <img src="css/layout/addobject.png"  title="افزودن مرکز تازه"> </div>
  <div id="AddTower" style="display:none;"> 
   <!--[if !IE]>start forms<![endif]-->
   
   <div class="forms">
    <h3>افزودن مرکز</h3>
    
    <!--[if !IE]>start row<![endif]-->
    
    <div class="row">
     <label>نام مرکز:</label>
     <div class="inputs">
      <div align="right"><span class="input_wrapper">
       <input class="text" name="Name" type="text"  />
       </span> </div>
     </div>
    </div>
    
    <!--[if !IE]>end row<![endif]--> 
    
    <!--[if !IE]>start row<![endif]-->
    
    <div class="row">
     <label>نام صاحب ملک:</label>
     <div class="inputs">
      <div align="right"><span class="input_wrapper">
       <input class="text" name="Resp" type="text"  />
       </span> </div>
     </div>
    </div>
    
    <!--[if !IE]>end row<![endif]--> 
    
    <!--[if !IE]>start row<![endif]-->
    
    <div class="row">
     <label>تلفن:</label>
     <div class="inputs">
      <div align="right"><span class="input_wrapper">
       <input class="text" name="Tel" type="text" placeholder="نمونه: <?php  echo fdigit('9171117766');?>" />
       </span>  </div>
     </div>
    </div>
    
    <!--[if !IE]>end row<![endif]--> 
    
    <!--[if !IE]>start row<![endif]-->
    
    <div class="row">
     <label>ارتفاع:</label>
     <div class="inputs">
      <div align="right"><span class="input_wrapper">
       <input class="text" name="Height" type="text"/>
       </span> </div>
     </div>
    </div>
    
    <!--[if !IE]>end row<![endif]--> 
    
    <!--[if !IE]>start row<![endif]-->
    
    <div class="row">
     <label>آدرس:</label>
     <div class="inputs"> <span class="input_wrapper textarea_wrapper">
      <textarea rows="" cols="" class="text" name="Address"></textarea>
      </span> </div>
    </div>
    
    <!--[if !IE]>end row<![endif]--> 
    
    <!--[if !IE]>start row<![endif]-->
    
    <div class="row">
     <div class="inputs"> <span class="button2 blue_button add_button"><span><span><span class="button_ico"></span><em>تایید</em></span></span>
      <input name="submit" type="submit" onclick="AddTower(this); return false;"/>
      </span> <span class="loading_button"> </span> </div>
    </div>
    
    <!--[if !IE]>end row<![endif]--> 
    
   </div>
  </div>
  
  <!--[if !IE]>end forms<![endif]-->
  
 </fieldset>
 
 <!--[if !IE]>end fieldset<![endif]-->
 
</form>
<!--[if !IE]>end forms<![endif]-->
</ul>
</div>
<div class="title_wrapper">
 <h2>مرکز ها</h2>
</div>
<!--[if !IE]>start section inner<![endif]-->
<div class="section_inner" id="tabletower"> 
 
 <!--[if !IE]>start table_wrapper<![endif]-->
 
 <div class="table_wrapper">
  <?php
$i=0;
echo "<div class='table_wrapper_inner'>
							<table cellpadding='0' cellspacing='0' width='100%' id='aaa'>
								<thead><tr>
									<th  style='width:18px;'>#</th>
									<th>نام مرکز</th>
									<th>نام صاحب ملک</th>
									<th>تلفن</th>
									<th>ارتفاع</th>
									
									<th style='width: 12px;'>دستورها</th>
								</tr>
								</thead>";
while ($i < $num) {
	$TWID=mysql_result($result,$i,'TWID');
	$Name=mysql_result($result,$i,'Name');
	$Resp=mysql_result($result,$i,'Resp');
	$Tel=mysql_result($result,$i,'Tel');
	$Address=mysql_result($result,$i,'Address');
	$Height=mysql_result($result,$i,'Height');
	$j=$i+1;
 
	echo "<tbody><tr class='first' id='$TWID'>
 
									<td>".fdigit($j)."</td>
									<td>".fdigit($Name)."</td>
									<td>$Resp</td>
									<td>".fdigit($Tel)."</td>
									<td>".fdigit($Height)." متر</td> 
 
									<td>
										<div  class='actions' style='width:40px !important;'> 
											<ul> 
											
												<li><a class='Accdelete' id='$TWID' href='javascript:DelTower($TWID);' title='پاک کردن' ></a></li>
												<li><a class='Accopen' id='$TWID'  href='javascript:ViewTower($TWID);' title='مشاهده' ></a></li>
											</ul>
										</div>
									</td>
								</tr>";
	$i++;
	}	
?>
  </tbody>
  </table>
 </div>
 
 <!--[if !IE]>end table_wrapper<![endif]--> 
 
</div>
<!--[if !IE]>end section inner<![endif]-->
</div>
