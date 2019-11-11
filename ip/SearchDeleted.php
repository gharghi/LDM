<?php
$id='P12';
$lv='1';
$FID='F12';
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
  <form name="Block"  id="DeletedIP" method="post" class="search_form general_form">
   <fieldset>
   
   
   
    <!--[if !IE]>start row<![endif]-->
    
    <div class="row" >
     <label> آدرس:</label>
     <div class="inputs" style="width:240px !important;">
      <div align="right" style="float:right;">
       <div class="IP">
        <ul>
         <li> <span class="input_wrapper small_input">
          <input class="text" name="Oct1" id="11" type="text" on onkeyup="validatePrefix(this);" />
          </span></li>
         <li>.</li>
         <li> <span class="input_wrapper small_input">
          <input class="text" name="Oct2" id="12" type="text" onkeyup="validatePrefix(this);" />
          </span></li>
         <li>.</li>
         <li> <span class="input_wrapper small_input">
          <input class="text" name="Oct3" id="13" type="text" onkeyup="validatePrefix(this);" />
          </span></li>
         <li>.</li>
         <li> <span class="input_wrapper small_input">
          <input class="text" name="Oct4" id="14" type="text" onkeyup="validatePrefix(this);" />
          </span></li>
        
         
        </ul>
       </div>
      </div>
     </div>
    </div>
   
         <!--[if !IE]>start row<![endif]-->
    <div class="row">
     <hr />
    </div>
    <!--[if !IE]>start row<![endif]-->
    <div class="row">
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
     </span> </div>
    
    <!--[if !IE]>end row<![endif]-->
    <div class="row"  >
     <div class="inputs"> <span class="button2 blue_button search_button"><span><span><em><span class="button_ico"></span>جستجو</em></span></span>
      <input form="Block" name="submit" type="submit"  onclick="DeletedIP(this); return false;"/>
      </span> <span class="Ad_loading_button"></span> </div>
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
