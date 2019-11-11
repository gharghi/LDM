function a() {
	$('#loading').show();
	$.post("phpscript/date.php",{Yes:1},function(data){
	var salt=$("#password").val();
	var password = CryptoJS.HmacSHA512(data, salt); 
	$("#password").val(password);
		$("#loginform").submit();
	});
}
function b() {
	$('#loading').show();
	$("#loginform").submit(); 
}
 
//-----------------------------------------------------
//Validating Password Entry
function Validatepass(value,id){
	var data=$(value).val(); 
		var tool=(data.length);
		if (tool>6){
			if (isNaN(data)==false){  
				$("#"+id+".system.positive").hide();
				$("#"+id+"L.system.negative").hide('fast');
				$("#"+id+"N.system.negative").show('fast');
			}
			else {
				$("#"+id+"N.system.negative").hide();
				$("#"+id+"L.system.negative").hide();
				$("#"+id+".system.positive").show('fast');
			}
		}
		else {
				$("#"+id+".system.positive").hide();
				$("#"+id+"N.system.negative").hide('fast');
				$("#"+id+"L.system.negative").show('fast');
		}
	
}
//-----------------------------------------------------
//-----------------------------------------------------
//Confirm Password Entry
function Confirmpass(value,id,pid){
	var conf=$(value).val();
	var pass=$('#'+pid).val();
		if (pass==conf){
				$("#"+id+".system.negative").hide();
				$("#"+id+".system.positive").show('fast');
			}
		else {
				$("#"+id+".system.positive").hide();
				$("#"+id+".system.negative").show('fast');
		}
	
}
//-----------------------------------------------------
//-----------------------------------------------------
//ForgetPass
function ForgetPass(objID){
	$.fancybox.open({
		href : 'admin/forgetpass.php',
					type : 'ajax',
					width: '70%',
					height: '70%'
		});
	
}
//-----------------------------------------------------
//-----------------------------------------------------
//ForgetPass
function ForgetPass2(){
	
	var EnterdUser=$('#RecoverUser').val();
	$( "#forgetpassdiv" ).html("<p id='loading' ><img src='css/layout/load.gif' /></p>");
	
	$.post('admin/FPass.php',{User:EnterdUser},function(data){ 
	
		$( ".forgetpassdiv").html(data);
	});
   	
}
//-----------------------------------------------------
//-----------------------------------------------------
//ForgetPass
function ForgetPass3(){
	$( ".loading_button" ).html("<img src='css/layout/load3.gif' />");
	var value=$('#newpass').serialize();
	$.post('admin/FPassProc.php',value,function(data){ 
		 if (data=='e')
 {
	  $('#Error_Key').hide();
	 $('#Error_Pass').show();
 }
 else if (data=='k')
 {
	 $.fancybox.close();
	 $('#PassChanged').removeClass('hidden');
 }
 else if (data=='f')
 {
	 $('#Error_Pass').hide();
	 $('#Error_Key').show();
 }
	});
}
//-----------------------------------------------------
