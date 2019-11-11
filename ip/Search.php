<?php
$id='P12';
$lv='1';
$FID='F12';
include "../global/db.php"; 
?>
<script language="javascript">
//-----------------------------------------------------
//Select CIDR for Search IP
function IPSearchType(Obj){
	$('.radio').prop('checked', false);
	$('#'+Obj).prop('checked',true);
	if (Obj=='RB1')
	{
		$('#CIDR').removeAttr('readonly');
		$('#14').removeAttr('disabled');
		$('#CIDR').val(32);
		$('#11').val('');
		$('#12').val('');
		$('#13').val('');
		$('#14').val('');
	}
	if (Obj=='RB2')
	{
		$('#CIDR').removeAttr('readonly');
		$('#14').removeAttr('disabled');
		$('#CIDR').val('');
		$('#11').val('');
		$('#12').val('');
		$('#13').val('');
		$('#14').val('');
	}
	if (Obj=='RB3')
	{
		$('#CIDR').removeAttr('readonly');
		$('#14').removeAttr('disabled');
		$('#CIDR').val(0);
		$('#11').val(0);
		$('#12').val(0);
		$('#13').val(0);
		$('#14').val(0);
	}
	if (Obj=='RB4')
	{
		$('#CIDR').val(24).attr('readonly','readonly');
		$('#11').val('');
		$('#12').val('');
		$('#13').val('');
		$('#14').val('').attr('disabled','disabled');
	}
}
//-----------------------------------------------------
//--------Change output type of search User
function ChangeOutputIP(ID)
    {
		var Output=$("#Output").val();
		if (Output=='Excel')
	{
		$('#IPButton').attr("onclick"," ");
	}
	else if (Output=='Web')
	{
		$('#IPButton').attr("onclick","BlockIP(this); return false; ");
		
    }
	else if (Output=='PDF')
	{
		$('#IPButton').attr("onclick"," ");
		
    }
}
//-----------------------------------------------------
//-----------------------------------------------------
//Search Block IP
function BlockIP(id){	
	var value=$("#BlockIP").serialize();
	$('.Ad_loading_button').html(loading3);
	$.post('ip/SearchBlock.php',value,function(data){
		switch(data){
				case "a":
					$("#ER1").show().delay(2000).fadeOut(4000); 
					$('.Ad_loading_button').hide();
					break;
				case "b": 
					$("#ER2").show().delay(2000).fadeOut(4000);
					$('.Ad_loading_button').hide();
					break;
				default:
					$('#TableUser').hide().html(data).fadeIn(500);
					$('.Ad_loading_button').hide();
				}
			
		});
}
//-----------------------------------------------------

</script>
<div class="title_wrapper">
 <h2> </h2>
</div>
<!--[if !IE]>start section inner <![endif]-->
 <div class="section_inner">
<ul class="system_messages">
		<li class="red" id="ER1"><span class="ico"></span><strong class="system_title">وارد کردن CIDR الزامی است!</strong></li>
        <li class="red" id="ER2"><span class="ico"></span><strong class="system_title">CIDR وارده با آدرس همخوانی ندارد!</strong></li>
         
	</ul>
  <form name="Block" action="ip/SearchBlock.php"  id="BlockIP" method="post" class="search_form general_form">
   <fieldset>
   
    <!--[if !IE]>start row<![endif]-->
		<div class="row" >
			 <label>انتخاب جستجو:</label>
<div class="inputs">
    <div align="right"><span >
                        <ul class="inline">
      <li><input id="RB1" class="radio"  type="radio" onchange="IPSearchType('RB1');" checked="checked"/> تک آدرس
      &nbsp;&nbsp;<input id="RB2" class="radio"   type="radio" onchange="IPSearchType('RB2');"/> دلخواه
      &nbsp;&nbsp;<input id="RB3" class="radio"   type="radio" onchange="IPSearchType('RB3');"/> کل آدرسها
      &nbsp;&nbsp;<input id="RB4" class="radio"   type="radio" onchange="IPSearchType('RB4');"/> بلاک
     </li>
  </ul>
    </span>
   
    </div> 
</div>
</div>
		<!--[if !IE]>end row<![endif]-->
   
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
         <li>/</li>
         <li><span class="input_wrapper small_input">
          <input class="text" name="CIDR" id="CIDR" type="text" onkeyup="validateCIDR(this);" value="32" />
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
     <select name="Output" id="Output" onchange="ChangeOutputIP(this)">
      <option value="Web">Web</option>
      <option value="PDF">PDF</option>
      <option value="Excel">Excel</option>
     </select>
     </span> </div>
    
    <!--[if !IE]>end row<![endif]-->
    <div class="row"  >
     <div class="inputs"> <span class="button2 blue_button search_button"><span><span><em><span class="button_ico"></span>جستجو</em></span></span>
      <input id="IPButton" name="submit" type="submit"  onclick="BlockIP(this); return false;"/>
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
