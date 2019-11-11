<?php
$id='P22';
$lv='1';
include "../global/db.php";
?>
<script language="javascript">
function FillUser() {
	var value=$('#Select_User').val();
	if (value==1)
	{
		$('#Dedicated').fadeOut('fast');
		$('#PPPoE').delay(300).fadeIn('fast');
	}
	else if (value==2)
	{
		$('#PPPoE').fadeOut('fast');
		$('#Dedicated').delay(300).fadeIn('fast');
	}
}
function Load_IP(id) {
	$('#IP_Result').html(loading4);
	var Name=$('#tags').val();
	$.post('support/IP.php',{UserID:id},function(data){
		$('#IP_Result').hide().html(data).fadeIn('fast');
	});
}
function Load_Dedicate_Profile() {
	$('#Dedicate_Result').html(loading4);
	var Name=$('#tags').val();
	$.post('support/query.php',{Username:Name},function(data){
		$('#Dedicate_Result').hide().html(data).fadeIn('fast');
		$('#Choose_Services_Menu').show('fast');
		
	});
	
}
function Choose_Service() {
		var value=$('#Select_Actions').val();
		if (value==1)
		{
			$('.Choose_Services').hide('fast');
			$('#Choose_Services1').fadeIn('fast');
		}
		else if (value==2)
		{
			$('.Choose_Services').hide('fast');
			$('#Choose_Services2').fadeIn('fast');
		}
		else if (value==3)
		{
			$('.Choose_Services').hide('fast');
			$('#Choose_Services3').fadeIn('fast');
		}
}
function Enable_Actions() {
	$('#Actions_Div').fadeToggle('fast');
}
function Enable_Admin() {
	$('#Admin_List').fadeToggle('fast');
	$('#Support_Descr').fadeToggle('fast');
}
function ChangeService() {
			var value=$('#CHServicee').val();
		if (value==1)
		{
			$('#CH3').hide('fast');
			$('#CH2').hide('fast');
			$('#CH1').show('fast');
		}
		else if (value==2)
		{
			$('#CH3').hide('fast');
			$('#CH1').hide('fast');
			$('#CH2').show('fast');
		}
		else if (value==3)
		{
			$('#CH1').hide('fast');
			$('#CH2').hide('fast');
			$('#CH3').show('fast');
		}
}

  $(function() {
    var availableTags = [
      "ActionScript",
      "AppleScript",
      "Asp",
      "BASIC",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];
    function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }
 
    $( "#tags2" )
      // don't navigate away from the field on tab when selecting an item
      .bind( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).data( "ui-autocomplete" ).menu.active ) {
          event.preventDefault();
        }
      })
      .autocomplete({
        minLength: 0,
        source: function( request, response ) {
          // delegate back to autocomplete, but extract the last term
          response( $.ui.autocomplete.filter(
            availableTags, extractLast( request.term ) ) );
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
          this.value = terms.join( ", " );
          return false;
        }
      });
  });
  
  
  
  
  
  
  
  
  
  
  
  
  
  $(function() {
    var availableTags = [
      "ActionScript",
      "AppleScript",
      "Asp",
      "BASIC",
      "C",
      "C++",
      "Clojure",
      "COBOL",
      "ColdFusion",
      "Erlang",
      "Fortran",
      "Groovy",
      "Haskell",
      "Java",
      "JavaScript",
      "Lisp",
      "Perl",
      "PHP",
      "Python",
      "Ruby",
      "Scala",
      "Scheme"
    ];
    function split( val ) {
      return val.split( /,\s*/ );
    }
    function extractLast( term ) {
      return split( term ).pop();
    }
 
    $( "#Actions" )
      // don't navigate away from the field on tab when selecting an item
      .bind( "keydown", function( event ) {
        if ( event.keyCode === $.ui.keyCode.TAB &&
            $( this ).data( "ui-autocomplete" ).menu.active ) {
          event.preventDefault();
        }
      })
      .autocomplete({
        minLength: 0,
        source: function( request, response ) {
          // delegate back to autocomplete, but extract the last term
          response( $.ui.autocomplete.filter(
            availableTags, extractLast( request.term ) ) );
        },
        focus: function() {
          // prevent value inserted on focus
          return false;
        },
        select: function( event, ui ) {
          var terms = split( this.value );
          // remove the current input
          terms.pop();
          // add the selected item
          terms.push( ui.item.value );
          // add placeholder to get the comma-and-space at the end
          terms.push( "" );
          this.value = terms.join( ", " );
          return false;
        }
      });
  });
  </script>
<?php
echo " <script>
  $(function() {
    var availableTags = [";
$result=mysql_query("select UserID,Name from User order by Name");
$num=mysql_num_rows($result);
$i=0;
while ($i < $num) {
	$UserID=mysql_result($result,$i,'UserID');
	$Name=mysql_result($result,$i,'Name');
	echo '"'.$Name.'",';
	$i++;
	}	
   echo"];
    $( '#tags' ).autocomplete({
      source: availableTags,
	 select: function(event, ui ){
		  $('#tags').val(ui.item.value);
		  $('#Dedicate_Button').fadeIn('fast');
	  }
    });
  });
  </script>";
?>
<!--[if !IE]>start section inner <![endif]-->

<div class="section_inner">
	<ul class="system_messages">
		<li class="red" id="P11"><span class="ico"></span><strong class="system_title">در ثبت اطلاعات مشکلی رخ داده است!</strong></li>
		<li class="red" id="11gren"><span class="ico"></span><strong class="system_title">اطلاعات با موفقیت ثبت گردید.</strong></li>
	</ul>
	<!--[if !IE]>start forms<![endif]-->
	<form id="Reg_Support" method="post" class="search_form general_form">
		<!--[if !IE]>start fieldset<![endif]-->
		<fieldset>
			<!--[if !IE]>start forms<![endif]-->
			<div class="forms">
				<h3>پشتیبانی مشترکین</h3>
				<!--[if !IE]>start row<![endif]-->
				<div class="row">
					<label>نوع:</label>
					<div class="inputs"> <span class="input_wrapper blank">
						<select name='Type' id="Select_User" onchange='FillUser();'>
							<option value='0' >انتخاب کنید</option>
							<option value='1' >کاربران PPPoE</option>
							<option value='2' >کاربران اختصاصی</option>
						</select>
						</span> </div>
				</div>
				<!--[if !IE]>end row<![endif]-->
				<div style="min-height:60px;">
					<div id="Dedicated" style="display:none;"> 
						<!--[if !IE]>start row<![endif]-->
						<div class="row ui-widget">
							<label>نام مشترک:</label>
							<div class="inputs">
								<div align="right"><span class="input_wrapper">
									<input class="text" value="" id="tags" name="Dedicated_Name" type="text" onblur="" />
									</span> <span id="Dedicate_Button" style="display:none; cursor:pointer; margin-right:10px;" onClick="Load_Dedicate_Profile();"><img src="css/layout/retrieve.png" /></span> <span id="Dedicate_False" class="system negative"  >&nbsp;</span> </div>
							</div>
						</div>
						<!--[if !IE]>end row<![endif]-->
						<div id="Dedicate_Result" style="min-height:20px; margin:1px;"> </div>
						<!--[if !IE]>start row<![endif]-->
						<div class="row" style="display:none;" id="Choose_Services_Menu">
							<label>درخواست:</label>
							<div class="inputs"> <span class="input_wrapper blank">
								<select name='Request' id="Select_Actions" onchange='Choose_Service();'>
								<option value='0' >انتخاب کنید</option>
									<option value='1' >پشتیبانی فنی</option>
									<option value='2' >بازدید/نصب جدید</option>
									<option value='3' >افزایش و کاهش پهنای باند</option>
								</select>
								</span> </div>
						</div>
						<!--[if !IE]>end row<![endif]--> 
						<div id="Choose_Services1" class="Choose_Services" style="display:none;">
						<!--[if !IE]>start row<![endif]-->
						<div class="row ui-widget" id="problem1">
							<label>مشکل ابراز شده:</label>
							<div class="inputs"> <span class="input_wrapper textarea_wrapper">
								<textarea rows="" cols="" class="text" name="Problem" id="tags2"></textarea>
								</span> </div>
						</div>
						<!--[if !IE]>end row<![endif]--> 
						
						<!--[if !IE]>start row<![endif]-->
						
						<div class="row" id="Solved_choice">
							<label> مشکل وجود دارد؟</label>
							<div align="right">&nbsp;&nbsp;&nbsp;
								<input type="checkbox" name="IsProblem" value="1" onclick="Enable_Actions();" />
							</div>
						</div>
						
						<!--[if !IE]>end row<![endif]-->
						<div id="Actions_Div" style="display:none;"> 
							<!--[if !IE]>start row<![endif]-->
							<div class="row ui-widget">
								<label>اقدامات صورت گرفته:</label>
								<div class="inputs"> <span class="input_wrapper textarea_wrapper">
									<textarea id="Actions" class="text" name="Actions" id="Actions">
									</textarea>
									</span> </div>
							</div>
							
							<!--[if !IE]>end row<![endif]--> 
							<!--[if !IE]>start row<![endif]-->
							
							<div class="row" id="Erja_Choice">
								<label> مشکل مرتفع نگشته است؟</label>
								<div align="right">&nbsp;&nbsp;&nbsp;
									<input type="checkbox" name="IsSolved" value="1" onclick="Enable_Admin();" />
								</div>
							</div>
							
							<!--[if !IE]>end row<![endif]-->
							<div id="Choose_Admin"> 
								<!--[if !IE]>start row<![endif]-->
								
								<div class="row" style="display:none;" id="Admin_List">
									<label>ارجاع به:</label>
									<div class="inputs"> <span class="input_wrapper blank">
										<?php
$query1="select AID,Name from Admin";
$result1=mysql_query($query1);
$num2=mysql_num_rows($result1);
echo "<select name='Admin' >";
	$i=0;
	while ($i < $num2) 
		{
	$AID=mysql_result($result1,$i,'AID');
	$Name=mysql_result($result1,$i,'Name');
	$i++;
	echo "<option value='",$AID,"' >",$Name;
		}
echo "</select>";
?>
										</span></div>
								</div>
								
								<!--[if !IE]>end row<![endif]--> 
								<!--[if !IE]>start row<![endif]-->
						<div class="row" id="Support_Descr" style="display:none;">
							<label>توضیحات:</label>
							<div class="inputs"> <span class="input_wrapper textarea_wrapper">
								<textarea rows="" cols="" class="text" name="Descr"></textarea>
								</span> </div>
						</div>
						<!--[if !IE]>end row<![endif]--> 
							</div>
						</div>
						<!--[if !IE]>start row<![endif]-->
						<div class="row" id="Archive_button">
							<div class="inputs"> <span class="button2 blue_button save_button"><span><span><span class="button_ico"></span><em id="Button_Value">ثبت تماس</em></span></span>
								<input name="submit" type="submit" onclick="SaveSupport(); return false;"/>
								</span> <span class="loading_button"></span> </div>
						</div>
						<!--[if !IE]>end row<![endif]--> 
						</div>
						<!--end first choice-->
						<!-- start second choice--->
						
						<div id="Choose_Services2" class="Choose_Services" style="display:none;">
						
							<div id="Choose_Admin"> 
							 <!--[if !IE]>start row<![endif]-->
    
    <div class="row">
     <label>پهنای باند مورد نیاز:</label>
     <div class="inputs">
      <div align="right"><span class="input_wrapper">
       <input class="text" name="NewBW" type="text"  />
       </span> </div>
     </div>
    </div>
    
    <!--[if !IE]>end row<![endif]--> 
								<!--[if !IE]>start row<![endif]-->
								
								<div class="row" id="Admin_List">
									<label>ارجاع به:</label>
									<div class="inputs"> <span class="input_wrapper blank">
										<?php
$query1="select AID,Name from Admin";
$result1=mysql_query($query1);
$num2=mysql_num_rows($result1);
echo "<select name='Admin2' >";
	$i=0;
	while ($i < $num2) 
		{
	$AID=mysql_result($result1,$i,'AID');
	$Name=mysql_result($result1,$i,'Name');
	$i++;
	echo "<option value='",$AID,"' >",$Name;
		}
echo "</select>";
?>
										</span></div>
								</div>
								
								<!--[if !IE]>end row<![endif]--> 
								<!--[if !IE]>start row<![endif]-->
						<div class="row" id="Support_Descr" >
							<label>توضیحات:</label>
							<div class="inputs"> <span class="input_wrapper textarea_wrapper">
								<textarea rows="" cols="" class="text" name="Descr2"></textarea>
								</span> </div>
						</div>
						<!--[if !IE]>end row<![endif]--> 
						<!--[if !IE]>start row<![endif]-->
						<div class="row" id="Archive_button">
							<div class="inputs"> <span class="button2 blue_button save_button"><span><span><span class="button_ico"></span><em id="Button_Value">ثبت درخواست</em></span></span>
								<input name="submit" type="submit" onclick="SaveSupport(); return false;"/>
								</span> <span class="loading_button"></span> </div>
						</div>
						<!--[if !IE]>end row<![endif]--> 
							</div>
						</div>
						
						</div>
						
						<!--end second choice-->
							<!-- start third choice--->
						
						<div id="Choose_Services3" class="Choose_Services" style="display:none;">
					
						
						<div id="Actions_Div" > 
						<!--[if !IE]>start row<![endif]-->
						<div class="row"  id="Choose_Services_Menu">
							<label>نوع درخواست:</label>
							<div class="inputs"> <span class="input_wrapper blank">
								<select name='Request3' id="CHServicee" onchange='ChangeService();'>
								<option value='1' >افزارش پهنای باند</option>
									<option value='2' >کاهش پهنای باند</option>
									<option value='3' >تغییر سرویس</option>
								</select>
								</span> </div>
						</div>
						<!--[if !IE]>end row<![endif]-->
							<!--[if !IE]>start row<![endif]-->
    
    <div class="row"  style="display:none" id="CH2" class="CHServiceq">
     <label>میزان کاهش:</label>
     <div class="inputs">
      <div align="right"><span class="input_wrapper">
       <input class="text" name="Decrease" type="text"  />
       </span> </div>
     </div>
    </div>
    
    <!--[if !IE]>end row<![endif]--> 
	<!--[if !IE]>start row<![endif]-->
    
    <div class="row"  id="CH1" class="CHServiceq">
     <label>میزان افزایش:</label>
     <div class="inputs">
      <div align="right"><span class="input_wrapper">
       <input class="text" name="Increase" type="text"  />
       </span> </div>
     </div>
    </div>
    
    <!--[if !IE]>end row<![endif]--> 
	<!--[if !IE]>start row<![endif]-->
    
    <div class="row" style="display:none" id="CH3" class="CHServiceq">
     <label>سرویس جدید:</label>
     <div class="inputs">
      <div align="right"><span class="input_wrapper">
       <input class="text" name="Change" type="text"  />
       </span> </div>
     </div>
    </div>
    
    <!--[if !IE]>end row<![endif]--> 
							<div id="Choose_Admin"> 
								<!--[if !IE]>start row<![endif]-->
								
								<div class="row"  id="Admin_List">
									<label>ارجاع به:</label>
									<div class="inputs"> <span class="input_wrapper blank">
										<?php
$query1="select AID,Name from Admin";
$result1=mysql_query($query1);
$num2=mysql_num_rows($result1);
echo "<select name='Admin3' >";
	$i=0;
	while ($i < $num2) 
		{
	$AID=mysql_result($result1,$i,'AID');
	$Name=mysql_result($result1,$i,'Name');
	$i++;
	echo "<option value='",$AID,"' >",$Name;
		}
echo "</select>";
?>
										</span></div>
								</div>
								
								<!--[if !IE]>end row<![endif]--> 
								<!--[if !IE]>start row<![endif]-->
						<div class="row" id="Support_Descr" >
							<label>توضیحات:</label>
							<div class="inputs"> <span class="input_wrapper textarea_wrapper">
								<textarea rows="" cols="" class="text" name="Descr3"></textarea>
								</span> </div>
						</div>
						<!--[if !IE]>end row<![endif]--> 
							</div>
						</div>
						<!--[if !IE]>start row<![endif]-->
						<div class="row" id="Archive_button">
							<div class="inputs"> <span class="button2 blue_button save_button"><span><span><span class="button_ico"></span><em id="Button_Value">ثبت تماس</em></span></span>
								<input name="submit" type="submit" onclick="SaveSupport(); return false;"/>
								</span> <span class="loading_button"></span> </div>
						</div>
						<!--[if !IE]>end row<![endif]--> 
						</div>
						
						<!--end third choice-->
					</div>
					<div id="PPPoE" style="display:none;"> 
						<!--[if !IE]>start row<![endif]-->
						<div class="row">
							<label>نام کاربری:</label>
							<div class="inputs">
								<div align="right"><span class="input_wrapper">
									<input class="text" name="Dedicated_Name" type="text"  />
									</span> <span id="Dedicate_True" class="system positive" >&nbsp;</span> <span id="Dedicate_False" class="system negative"  >&nbsp;</span> </div>
							</div>
						</div>
					</div>
					<!--[if !IE]>end row<![endif]--> 
					
				</div>
			</div>
			<!--[if !IE]>end forms<![endif]-->
		</fieldset>
		<!--[if !IE]>end fieldset<![endif]-->
	</form>
	<!--[if !IE]>end forms<![endif]--> 
</div>
<!--[if !IE]>end section inner<![endif]--> 
