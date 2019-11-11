<?php
$id='P17';
$lv='1';
include "../global/db.php";  
?>
<div class="title_wrapper">
 <h2> </h2>
</div>
<!--[if !IE]>start section inner <![endif]-->
 <div class="section_inner">
<ul class="system_messages">
		<li class="red" id="ER1"><span class="ico"></span><strong class="system_title">وارد کردن CIDR الزامی است!</strong></li>
        <li class="red" id="ER2"><span class="ico"></span><strong class="system_title">CIDR وارده با آدرس همخوانی ندارد!</strong></li>
         
	</ul>
  <form name="Block"  id="auditsearch" method="post" class="search_form general_form">
   <fieldset>
   
   
   
          <!--[if !IE]>start row<![endif]-->
      <div class="row">
        <label>مدیر:</label>
        <div class="inputs"> <span class="input_wrapper blank">
          <?php

$DBS= new Database;
$DBS->Connect();
$DBS->Select('Admin','AID,AUsername');
echo "<select name='Admin'>";
echo "<option value=''>تمامی مدیرها</option>";
	$i=0;
	while ($i < $DBS->Select_Rows) 
		{
	$AdminID=$DBS->Select_Result[$i] ['AID'];
	$AdminName=$DBS->Select_Result[$i] ['AUsername'];
	$i++;
	echo "<option value='",$AdminID,"' >",$AdminName;
		}
echo "</select>";
?>
          </span></div>
          
      </div>
      <!--[if !IE]>end row<![endif]--> 

       <!--[if !IE]>start row<![endif]-->
  <div class="row">
    <label>عنوان:</label>
    <div class="inputs">
      <div align="right"> <span class="input_wrapper blank">
        <select name="Object">
        <option value=''>همه عناوین</option>
        <option value='Admin'>مدیر</option>
        <option value='User'>مشترک</option>
        <option value='Switch'>سوئیج</option>
        <option value='Tower'>مرکز</option>
        <option value='Prefix'>رنج آدرس</option>
        <option value='Hardware'>سخت افزار</option>
        <option value='IP'>IP</option>
        <option value='IP'>سابقه IP</option>
        <option value='Type'>مدل سخت افزار</option>
        </select>
        </span></div>
    </div>
  </div>
  <!--[if !IE]>end row<![endif]--> 
    <!--[if !IE]>start row<![endif]-->
  
  <div class="row">
    <label>از تاریخ:</label>
    <div class="inputs">
      <div align="right"> 
      <span class="input_wrapper ">
        <input class="text" name="StDate" type="text" id="date_input1" />
       </span>
      </div><img src="css/layout/calender.png" id="datebutton1" >
    </div>
    </div>
     <div class="row">
     <label>تا تاریخ:</label>
    <div class="inputs">
      <div align="right"> <span class="input_wrapper"> 
        <input class="text" name="EnDate" type="text" id="date_input2" />
        </span> </div><img src="css/layout/calender.png" id="datebutton2" >
    </div>
  </div>
  
  <!--[if !IE]>end row<![endif]-->
  <script>
Calendar.setup({
    inputField: 'date_input1',
    button: 'datebutton1',
	showsTime :true,
    ifFormat: '%Y-%m-%d %I:%M:%S',
    dateType: 'jalali'
});
</script>
<script>
Calendar.setup({
    inputField: 'date_input2',
    button: 'datebutton2',
	showsTime :true,
    ifFormat: '%Y-%m-%d %I:%M:%S',
    dateType: 'jalali'
});
</script>
      
      
      
      
    <div class="row">
     <hr />
    </div>
          <!--[if !IE]>start row<![endif]-->
  <div class="row">
    <label style="width:50px !important;">مرتب با:</label>
      <span class="input_wrapper blank search2 space_search ">
        <select name="Order">
        <option value="LOGID">شناسه</option>
          <option value="AID">مدیر</option>
          <option value="Object">عنوان</option>
          <option value="Date">تاریخ</option>
          <option value="IP">آدرس مدیر</option>
        </select>
        </span>
       
 
        <span class="space_search ">
          <input name="DESC" value="1" type="checkbox"  />
  </span>
   
  <label style="width:50px !important;">نزولی</label>
     
<span class="input_wrapper blank search space_search ">
        <select name="Limit">
          <option value="10"><?php echo  fdigit('10'); ?></option>
          <option value="20"><?php echo fdigit('20'); ?></option>
          <option value="50"><?php echo fdigit('50'); ?></option>
          <option value="100"><?php echo fdigit('100'); ?></option>
          <option value="500"><?php echo fdigit('500'); ?></option>
          <option value="1000"><?php echo fdigit('1000'); ?></option>
        </select>
        </span> 
        <label>خط در صفحه</label>
                <label style="width:40px;">مشاهده:</label>
        <span class="input_wrapper blank search2 space_search ">
        <select name="Output" id="Output" onchange="ChangeOutput(this)">
          <option value="Web">Web</option>
          <option value="PDF">PDF</option>
          <option value="Excel">Excel</option>
        </select>
        </span> 
        
        
        </div>
  <!--[if !IE]>end row<![endif]--> 
 
 
  <!--[if !IE]>start row<![endif]-->
  <div class="row"  >
    <div class="inputs"> <span class="button2 blue_button search_button"><span><span><em><span class="button_ico"></span>جستجو</em></span></span>
      <input id="www" name="submit" type="submit"  onclick="AuditSearch(this); return false;"/>
      </span> <span class="Ad_loading_button"></span></div>
  </div>
  <!--[if !IE]>end row<![endif]-->
    <!--[if !IE]>end forms<![endif]-->
   </fieldset>
  </form>
 </div>
<!--[if !IE]>start section inner<![endif]-->
<div class="section_inner" id="TableUser" > </div>
<!--[if !IE]>end pagination<![endif]--> 
<!--[if !IE]>end section inner<![endif]--> 
