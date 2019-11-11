var loading1="<p id='loading' ><img src='../css/layout/load.gif' /></p>";
var loading2="<p id='loading' ><img src='../css/layout/load.gif' /></p>";
var loading3="<img src='../css/layout/load3.gif' />";
var loading4="<span style='text-align: center;'><img src='../css/layout/load4.gif' /></span>";
$(document).ready(function() {
	var page=$('.pages').attr('id'); 
	var parent=page.substring(0,3); 
	$('#'+parent).next('ul').show();
	$('#'+parent).show();
	$('#'+page).addClass('selected');
	$('#'+parent).addClass('selected');
	$('#'+page).parent('ul').show();
	$('#'+page).parent('ul').addClass('selected');
});

//----------------------------------------------------
//Loading main Data in Middle
function loadpage(url) { 
	$('.section').html(loading2);
	$(location).attr('href',url);
}
//----------------------------------------------------
//----------------------------------------------------
//Shows all records in search
function View_All_Records() { 
	$('.first').show();
	$('.pagination').hide();
}
//----------------------------------------------------
//----------------------------------------------------
//Validating Unique Data entry from database for Add
function validateDB2(value,Fno){
	var asghar=$(value).val();
	if (asghar){
		$.post("../phpscript/validate.php",{VValue:$(value).val(),Fno:Fno},function(data,status){
    		if (data==1){
				$("#"+Fno+".system.negative").hide();
				$("#"+Fno+"E.system.negative").hide();
				$("#"+Fno+".system.positive").show('fast');
			}
			else if (data==0) {
				$("#"+Fno+".system.positive").hide();
				$("#"+Fno+"E.system.negative").hide();
				$("#"+Fno+".system.negative").show('fast');
			};
 	 	});
	}
	else {
		$("#"+Fno+".system.positive").hide();
		$("#"+Fno+"E.system.negative").show('fast');
	};
}
//-----------------------------------------------------
//----------------------------------------------------
//Validating Unique Data entry from database for Add
function validateDB(value,Fno,Field){
	var asghar=$(value).val();
	if (asghar){
		$.post("../phpscript/validate.php",{VValue:$(value).val(),Fno:Fno,Field:Field},function(data){
    		if (data==1){
				$("#"+Fno+".system.negative").hide();
				$("#"+Fno+"E.system.negative").hide();
				$("#"+Fno+".system.positive").show('fast');
			}
			else if (data==0) {
				$("#"+Fno+".system.positive").hide();
				$("#"+Fno+"E.system.negative").hide();
				$("#"+Fno+".system.negative").show('fast');
			};
 	 	});
	}
	else {
		$("#"+Fno+".system.positive").hide();
		$("#"+Fno+"E.system.negative").show('fast');
	};
}
//-----------------------------------------------------
//----------------------------------------------------
//Validating Unique Data entry from database for Edit
function validateDB3(value,Fno,ID){
	var asghar=$(value).val();
	if (asghar){
		$.post("../phpscript/evalidate.php",{VValue:$(value).val(),Fno:Fno,ID:ID},function(data){
    		if (data==1){
				$("#"+Fno+".system.negative").hide();
				$("#"+Fno+"E.system.negative").hide();
				$("#"+Fno+".system.positive").show('fast');
			}
			else if (data==0) {
				$("#"+Fno+".system.positive").hide();
				$("#"+Fno+"E.system.negative").hide();
				$("#"+Fno+".system.negative").show('fast');
			};
 	 	});
	}
	else {
		$("#"+Fno+".system.positive").hide();
		$("#"+Fno+"E.system.negative").show('fast');
	};
}
//-----------------------------------------------------
//----------------------------------------------------
//Validating Admin from DB
function AdminValidateDB(value,Fno ){
	var asghar=$(value).val();
	var validate=true;
	var len=asghar.length-1;
	i=0;
	while (i<=len){
		if ((asghar.charCodeAt(i)>=48&&asghar.charCodeAt(i)<=57)||(asghar.charCodeAt(i)>=65&&asghar.charCodeAt(i)<=90)||(asghar.charCodeAt(i)>=97&&asghar.charCodeAt(i)<=122)) {
			validate=true;	
		}
		else {
			validate=false;
			i=len-1;
			break;	
		}
		i++;
	}
	if (validate==false){
		$("#"+Fno+".system.negative").hide();
		$("#"+Fno+"E.system.negative").hide();
		$("#"+Fno+".system.positive").hide();
		$("#"+Fno+"L.system.negative").show('fast');
	}
	else {
	if (asghar){
		$.post("phpscript/validate.php",{VValue:$(value).val(),Fno:Fno},function(data,status){
    		if (data==1){
				$("#"+Fno+".system.negative").hide();
				$("#"+Fno+"E.system.negative").hide();
				$("#"+Fno+"L.system.negative").hide();
				$("#"+Fno+".system.positive").show('fast');
			}
			else if (data==0) {
				$("#"+Fno+".system.positive").hide();
				$("#"+Fno+"E.system.negative").hide();
				$("#"+Fno+"L.system.negative").hide();
				$("#"+Fno+".system.negative").show('fast');
			};
 	 	});
	}
	else {
		$("#"+Fno+".system.positive").hide();
		$("#"+Fno+"L.system.negative").hide();
		$("#"+Fno+"E.system.negative").show('fast');
	};
}
}
//-----------------------------------------------------
//-----------------------------------------------------
//Validating Int Entry
function ValidateInt(value,id){
	var data=$(value).val();
	if (parseInt(data)!='NaN'){
		var tool=(data.length);
		if (tool==10||tool==11){
			if (isNaN(data)==true){
				$("#"+id+".system.positive").hide();
				$("#"+id+".system.negative").show('fast');
			}
			else {
				$("#"+id+".system.negative").hide();
				$("#"+id+".system.positive").show('fast');
			}
		}
		else {
				$("#"+id+".system.positive").hide();
				$("#"+id+".system.negative").show('fast');
		}
	}
	else {
			$("#"+id+".system.positive").hide();
			$("#"+id+".system.negative").show('fast');
	}
}
//-----------------------------------------------------
//-----------------------------------------------------
//Submiting forms(POST)
function AddUser(ID){ 
	var value=$("#"+ID).serialize();
	$("#loading_button").html(loading3); 
			$.post('../proc/AddUser.php',value,function(data){
				if (data=="<script language='javascript'> AlertPrm(); </script>")
{
	AlertPrm();
}
				switch(data){
				case "a":
					$("li.red#1").show().delay(2000).fadeOut(4000);
					$("#loading_button").hide();
					break;
				case "b":
					$("li.red#2").show().delay(2000).fadeOut(4000);
					$("#loading_button").hide();
					break;
				case "c":
					$("li.red#3").show().delay(2000).fadeOut(4000);
					$("#loading_button").hide();
					break;
				case "d":
					$("li.red#4").show().delay(2000).fadeOut(4000);
					$("#loading_button").hide();
					break;
				case "e":
					$("li.red#5").show().delay(2000).fadeOut(4000);
					$("#loading_button").hide();
					break;
				case "f":
					$("li.red#6").show().delay(2000).fadeOut(4000);
					$("#loading_button").hide();
					break;
				default:
				loaduserprofile(data);
				}
			});
}
//-----------------------------------------------------
//-----------------------------------------------------
//Submiting forms(POST) admin
function ValidateformAdmin(ID,Action,Complete){
	var value=$("#"+ID).serialize();
			$.post(Action,value,function(data,status){
				switch(data){
				case "a":
					$("li.red#1").show().delay(2000).fadeOut(4000);
					break;
				case "b":
					$("li.red#2").show().delay(2000).fadeOut(4000);
					break;
				case "c":
					$("li.red#3").show().delay(2000).fadeOut(4000);
					break;
				case "d":
					$("li.red#4").show().delay(2000).fadeOut(4000);
					break;
				case "e":
					$("li.red#5").show().delay(2000).fadeOut(4000);
					break;
				case "f":
					$("li.red#6").show().delay(2000).fadeOut(4000);
					break;
				default:
					$(".section").html(loading2).load("../admin/list.php");
				}
			});
}
//-----------------------------------------------------
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
//Confirm Password changepass form
function Confpass(value,id){
	var conf=$(value).val();
	var pass=$('#ChngPP').val();
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
//Delete Admin
function AdminDelete(objID){
	$("#dialog").html("آیا اطمینان دارید؟");
   	$( "#dialog" ).dialog({
        width:200,
        height:'auto',
        resizable:false,
        modal: true,
        dialogClass: "dialogWithDropShadow",
        buttons: [
			{
					text: "بلی",
					click: function() {
						$( this ).dialog( "close" );
$('#dialog').dialog('destroy');   $('#dialog').hide();
						var ID=objID;
						$.post("admin/delete.php",{AID:ID},function(data){
if (data=="<script language='javascript'> AlertPrm(); </script>")
{
	AlertPrm();
}
							if (data==2){
								$("#AdminDeleteError").show().delay(2000).fadeOut(4000);	
							}
							if (data==1) {
							$('#'+ID).hide(2000);
							var num=$('#num').text();
							num--;
							$('#num').html(num);
							$("#AdminDelete").show().delay(2000).fadeOut(4000);
							
					
			}
		});
					}
				},
					{
					text: "خیر",
					click: function() {
						$( this ).dialog( "close" );
$('#dialog').dialog('destroy');   $('#dialog').hide();
					}
				}
		]
    });
}
//-----------------------------------------------------
//-----------------------------------------------------
//Edit Admin
function AdminEdit(objID){
	var ID=objID.id;
	$(".section").html(loading2);
	$.post("admin/edit.php",{AID:ID},function(data){
		$(".section").html(data);
	});
}
//-----------------------------------------------------
//-----------------------------------------------------
//Edit Admin on dialog open
function AdminEdit2(objID){
	$('#dialog').dialog('close');
$('#dialog').dialog('destroy');   $('#dialog').hide();
	$('.section').html(loading2);
	var ID=objID.id;
	$.post("admin/edit.php",{AID:ID},function(data){
		$(".section").html(data);
	});
}
//-----------------------------------------------------
//-----------------------------------------------------
//Submiting forms(EditAdmin)
function EditAdminPost(val){
	var value=$("#EditAdmin").serialize();
	$('.section').html(loading2);
			$.post('admin/editproc.php',value,function(data){
				switch(data){
				case "a":
					$("li.red#1").show().delay(2000).fadeOut(4000);
					break;
				case "b":
					$("li.red#2").show().delay(2000).fadeOut(4000);
					break;
				case "c":
					$("li.red#3").show().delay(2000).fadeOut(4000);
					break;
				case "d":
					$("li.red#4").show().delay(2000).fadeOut(4000);
					break;
				case "e":
					$("li.red#5").show().delay(2000).fadeOut(4000);
					break;
				case "f":
					$("li.red#6").show().delay(2000).fadeOut(4000);
					break;
				default:
					loadpage("admin/list.php");
				}
			});
}
//-----------------------------------------------------
//-----------------------------------------------------
//View Admin
function AdminView(objID){
	var ID=objID.id;
	$('#dialog').html(loading1);
	$( "#dialog" ).dialog({
		
        width:'auto',
        height:'auto',
        resizable:false,
        modal: true
        
        });
		$(".ui-dialog-titlebar").hide();
		
	
	$.post("admin/view.php",{AID:ID},function(data){
		$("#dialog").html(data);
		$('.ui-dialog').remove();
		$( "#dialog" ).dialog({
		
        width:'auto',
        height:'auto',
        resizable:false,
        modal: true,
        dialogClass: "dialogWithDropShadow",
        buttons: [],
        open: function(){
              $('.ui-widget-overlay').bind('click',function(){
                 $('#dialog').dialog('close');
				$('#dialog').dialog('destroy');   $('#dialog').hide();
         })
		 }
        });
	});
}
//-----------------------------------------------------
//-----------------------------------------------------
//Admin(Changepass)
function ChangePass(objID){
	var ID=objID.id;
	$('#dialog').html(loading1);
	$( "#dialog" ).dialog({
		
        width:'auto',
        height:'auto',
        resizable:false,
        modal: true
        
        });
		$(".ui-dialog-titlebar").hide();
		
	$.post("admin/pass.php",{AID:ID},function(data){
		$("#dialog").html(data);
		$('.ui-dialog').remove();
   		$( "#dialog" ).dialog({
		
        width:'auto',
        height:'auto',
        resizable:false,
        modal: true,
        dialogClass: "dialogWithDropShadow",
        buttons: [],
        open: function(){
			$('#chngphid').val(ID);
              jQuery('.ui-widget-overlay').bind('click',function(){
                 jQuery('#dialog').dialog('close');
				 $('#dialog').dialog('destroy');   $('#dialog').hide();
         })
		 }
        });
	});
}
//-----------------------------------------------------
//-----------------------------------------------------
//Admin(Changepass) submit form
function ChPassPost(id){
		var value=$("#"+id).serialize();
			$.post('admin/chngpass.php',value,function(data,status){
				if (data=="<script language='javascript'> AlertPrm(); </script>")
			{
				AlertPrm();	
			}
				switch(data){
				case "a":
					$("li.red#"+id+"1").show().delay(2000).fadeOut(4000);
					break;
				case "b":
					$("li.red#"+id+"2").show().delay(2000).fadeOut(4000);
					break;
				default:
					$('#dialog').dialog('close');
$('#dialog').dialog('destroy');   $('#dialog').hide();
					$("#AdminPass").show().delay(2000).fadeOut(4000);
				}
			});
}
//-----------------------------------------------------
//-----------------------------------------------------
//Edit Admin Permission
function AdminPerm(objID){
	var ID=objID.id;
	$('.section').html(loading2);
	$.post("admin/prm.php",{AID:ID},function(data){
		$(".section").html(data);
	});
}
//-----------------------------------------------------
//-----------------------------------------------------
//Permission checkmark
function PrmChk(objID,Num){
	var ID='#'+objID.id;
	for (var i=1;i<=30;i++) {
	$('#'+objID+i).attr('name','');
	}
	if  ($('#'+objID+Num).is(':checked')) {
		$('#'+objID+Num).attr('name',objID);
			for (var i=Num-1;i>=1;i--) {
				$('#'+objID+i).prop('checked', true);
			}
			for (var i=Num+1;i<=20;i++) {
				$('#'+objID+i).prop('checked', false);
			}		
		}
		else if ($('#'+objID+Num).is(":not(':checked')")) {
		Num2=Num-1;
			$('#'+objID+Num2).attr('name',objID);
			$('#'+objID+i).prop('checked', false);	
			for (i=Num;i<=30;i++) {
				$('#'+objID+i).prop('checked', false);
			}
		}
}
//-----------------------------------------------------
//-----------------------------------------------------
//Submiting forms(EditAdmin)
function EditPrm(){
	var value=$("#PrmAdmin").serialize();
			$.post('admin/prmproc.php',value,function(data,status){
				$("#dialog").html("آیا اطمینان دارید؟");
   	$( "#dialog" ).dialog({
        width:200,
        height:'auto',
        resizable:false,
        modal: true,
        dialogClass: "dialogWithDropShadow",
        buttons: [
			{
					text: "بلی",
					click: function() {
						$( this ).dialog( "close" );
$('#dialog').dialog('destroy');   $('#dialog').hide();
						loadpage('admin/list.php');
					}
				},
					{
					text: "خیر",
					click: function() {
						$( this ).dialog( "close" );
$('#dialog').dialog('destroy');   $('#dialog').hide();
					}
				}
		]
    });
			});
}
//-----------------------------------------------------
//-----------------------------------------------------
//Submiting forms(EditAdmincurrent)
function EditAdminPostCurrent(){
	var value=$("#EditAdminCurrent").serialize();
			$.post('admin/current/editproc.php',value,function(data){
				if (data=="<script language='javascript'> AlertPrm(); </script>")
			{
				AlertPrm();
				
			}
				switch(data){
				case "a":
					$("li.red#1").show().delay(2000).fadeOut(4000);
					break;
				case "b": 
					$("li.red#5").show().delay(2000).fadeOut(4000);
					break;
				case "c":
					$("li.red#3").show().delay(2000).fadeOut(4000);
					break;
				default:
					$(".section").html(loading2).load('admin/current/view.php');
					$("li.green#4").show().delay(2000).fadeOut(4000);
				}
			});
}
//-----------------------------------------------------
//-----------------------------------------------------
//Edit Admin Current
function AdminEditCurrent(objID){
	var ID=objID.id;
	$('.section').html(loading2);
	$.post("admin/current/edit.php",{AID:ID},function(data){
		$(".section").html(data);
		
	});
}
//-----------------------------------------------------
//-----------------------------------------------------
//View Admin Current
function AdminViewCurrent(objID){
	var ID=objID.id;
	$('.section').html(loading2);
	$.post("admin/current/view.php",{AID:ID},function(data){
		$(".section").html(data);
	});
}
//-----------------------------------------------------
//-----------------------------------------------------
//Admin(Changepasscurrent)
function ChangePassCurrent(objID){
	$('#dialog').html(loading1);
	$( "#dialog" ).dialog({
		
        width:'auto',
        height:'auto',
        resizable:false,
        modal: true
        
        });
		$(".ui-dialog-titlebar").hide();
	
	var ID=objID.id;
	$.post("admin/current/pass.php",{AID:ID},function(data){
		$('.ui-dialog').remove();
		$("#dialog").html(data);
   		$( "#dialog" ).dialog({
		
        width:'auto',
        height:'auto',
        resizable:false,
        modal: true,
        dialogClass: "dialogWithDropShadow",
        buttons: [],
        open: function(){
			$('#chngphid').val(ID);
              jQuery('.ui-widget-overlay').bind('click',function(){
                 jQuery('#dialog').dialog('close');
         })
		 }
        });
	});
}
//-----------------------------------------------------
//-----------------------------------------------------
//Admin(Changepasscurrent) submit form
function ChPassPostCurrent(id){
		var value=$("#"+id).serialize();
			$.post('admin/current/chngpass.php',value,function(data,status){
				if (data=="<script language='javascript'> AlertPrm(); </script>")
			{
				AlertPrm();
				
			}
				switch(data){
				case "a":
					$("li.red#"+id+"1").show().delay(2000).fadeOut(4000);
					break;
				case "b":
					$("li.red#"+id+"2").show().delay(2000).fadeOut(4000);
					break;
				default:
					$("#dialog").dialog('close');
					$('#dialog').dialog('destroy');   $('#dialog').hide();
					$("li.green#passsuccess").show().delay(2000).fadeOut(4000);
				}
			});
}
//-----------------------------------------------------
//-----------------------------------------------------
//Show Advanced Form
function ShowAdvanced(){
	if ($("#advanced").is(":hidden")) {
	$('#advanced').fadeIn(1700);
	}
	else {
		$('#advanced').fadeOut(1000);
	}
}
//-----------------------------------------------------
//-----------------------------------------------------
//Search User by ID
function AdvancedUserSearch(id){
	var value=$("#advancedsearch").serialize();
	$('.Ad_loading_button').html(loading3);
	$('sidebar_module1').html(loading2);
	$.post('../proc/UserSearch.php',value,function(data){
			$('#TableUser').hide().html(data).fadeIn(500);
			$('.Ad_loading_button').hide();
		});
}
//-----------------------------------------------------
//-----------------------------------------------------
//Load User profile
function loaduserprofile(id){
	$('.section').html(loading2);
	$('sidebar_module1').html(loading1);
	$(location).attr('href',"../view/UserProfile.php?UserID="+id);		
}
//-----------------------------------------------------
//-----------------------------------------------------
//Load User profile deleted
function loaddeletedprofile(id){
	$('.section').html(loading1);
	$.post('view/DeletedUser.php',{UserID:id},function(data){
			$('.section').html(data);
		});
}
//-----------------------------------------------------
//-----------------------------------------------------
//Load Switch profile
function LoadSwitch(id){
	$('.section').html(loading1);
	$('sidebar_module1').html(loading1);
	$.post('switch/View.php',{SWID:id},function(data){
			$('.section').html(data);
		});
	$.post('sidebar/Switch.php',{SWID:id},function(data){
			$('.sidebar_module1').html(data);
		});
}
//-----------------------------------------------------
//-----------------------------------------------------
//Load Switch profile
function LoadTower(id){
	$('.section').html(loading1);
	$('sidebar_module1').html(loading1);
	$.post('tower/View.php',{TWID:id},function(data){
			$('.section').html(data);
		});
	$.post('sidebar/Tower.php',{UserID:id},function(data){
			$('.sidebar_module1').html(data);
		});
}
//-----------------------------------------------------
//-----------------------------------------------------
//convert to editable validate db
function EditInline(ID,FID){
	var CID="#"+ID.id;
	var objName=CID.substring(2);
	var value=$(CID).val();
	$(CID).removeAttr('readonly');
	$(CID).parent('span').removeClass("view_wrapper");
	$(CID).parent('span').addClass("input_wrapper");
	$(CID).removeClass("inputview");
	$(CID).addClass("text");
	$(CID).on('blur',function(){
		var newvalue=$(CID).val();
		$(CID).attr('readonly','readonly');
		$(CID).parent('span').addClass("view_wrapper");
		$(CID).parent('span').removeClass("input_wrapper");
		$(CID).addClass("inputview");
		if (value!=newvalue) {
			$(CID).addClass("changed");
			validateDB2(ID,FID);
			$("#editbtn").fadeIn(2000);
		}
		$(CID).removeClass("text");
		$(CID).unbind('blur');
		});
}
//-----------------------------------------------------
//-----------------------------------------------------
//convert to editable validate db
function EditIP(){
$('#IPView').hide();
$('#IPEdit').show();
var Oct1=$('#21').val();
var Oct2=$('#22').val();
var Oct3=$('#23').val();
var Oct4=$('#24').val();
$('.EditIP').on('change',function(){
	var NewOct1=$('#21').val();
	var NewOct2=$('#22').val();
	var NewOct3=$('#23').val();
	var NewOct4=$('#24').val();
		if ((Oct1!=NewOct1)||(Oct2!=NewOct2)||(Oct3!=NewOct3)||(Oct4!=NewOct4)) {
//			$('#IPView').addClass("changed");
			$.post('phpscript/ValidateIP.php',{O1:NewOct1,O2:NewOct2,O3:NewOct3,O4:NewOct4},function(data){
				if (data==1)
				{
					$('#IPNOK').hide();
					$('#IPOK').show();
					
				}
				else if (data==2) {
					$('#IPOK').hide();
					$('#IPNOK').show();
				}
			});
			$("#editbtn").fadeIn(2000);
			
		}
//		$('#IPEdit').hide();
//		$('#IPView').show();
		$('.EditIP').unbind('blur');
		});
}
//-----------------------------------------------------
//-----------------------------------------------------
//Select editable validate
function SEditInline(ID){
	var CID="#"+ID.id;
	$(CID+'.vie').hide();
	$(CID+'.sel').show();
	$(CID+'.sel').on('change',function(){
		var newvalue=$(CID+'.sel  option:selected').text();
		$(CID+'.vie').children('div').children('span').html(newvalue);
		$(CID+'.sel').hide();
		$(CID+'.vie').children('div').children('span').addClass("changed");
		$(CID+'.vie').show();
		$("#editbtn").fadeIn(2000);
	});
}
//-----------------------------------------------------
//-----------------------------------------------------
//convert to editable validate integer
function IEditInline(ID,FID){
	var CID="#"+ID.id;
	var objName=CID.substring(2);
	var value=$(CID).val();
	$(CID).removeAttr('readonly');
	$(CID).parent('span').removeClass("view_wrapper");
	$(CID).parent('span').addClass("input_wrapper");
	$(CID).removeClass("inputview");
	$(CID).addClass("text");
	$(CID).on('blur',function(){
		var newvalue=$(CID).val();
		$(CID).attr('readonly','readonly');
		$(CID).parent('span').addClass("view_wrapper");
		$(CID).parent('span').removeClass("input_wrapper");
		$(CID).addClass("inputview");
		if (value!=newvalue) {
			$(CID).addClass("changed");
			ValidateInt(ID,FID);
			$("#editbtn").fadeIn(2000);
		}
		$(CID).removeClass("text");
		$(CID).unbind('blur');
		});
}
//-----------------------------------------------------
//-----------------------------------------------------
//convert to editable non validate
function NEditInline(ID,FID){
	var CID="#"+ID.id;
	var objName=CID.substring(2);
	var value=$(CID).val();
	$(CID).removeAttr('readonly');
	$(CID).parent('span').removeClass("view_wrapper");
	$(CID).parent('span').addClass("input_wrapper");
	$(CID).removeClass("inputview");
	$(CID).addClass("text");
	$(CID).on('blur',function(){
		var newvalue=$(CID).val();
		$(CID).attr('readonly','readonly');
		$(CID).parent('span').addClass("view_wrapper");
		$(CID).parent('span').removeClass("input_wrapper");
		$(CID).addClass("inputview");
		if (value!=newvalue) {
			$(CID).addClass("changed");
			$("#editbtn").fadeIn(2000);
		}
		$(CID).removeClass("text");
		$(CID).unbind('blur');
		});
}
//-----------------------------------------------------
//-----------------------------------------------------
//convert to editable TExt Area
function TAreaEditInline(FID){
	var CID="#"+FID;
	var value=$(CID).val(); 
	$(CID).removeAttr('readonly');
	$(CID).parent('span').removeClass("view_wrapper");
	$(CID).parent('span').addClass("input_wrapper");
	$(CID).parent('span').addClass("textarea_wrapper");
	$(CID).removeClass("areaview");
	$(CID).addClass("text");
	$(CID).on('blur',function(){
	var newvalue=$(CID).val();
	$(CID).attr('readonly','readonly');
	$(CID).parent('span').addClass("view_wrapper");
		$(CID).parent('span').removeClass("input_wrapper");
		$(CID).parent('span').removeClass("textarea_wrapper");
		$(CID).addClass("areaview");
	if (value!=newvalue) {
$(CID).addClass("changed");
$("#editbtn").fadeIn(2000);
}
$(CID).removeClass("text");
$(CID).unbind('blur');
});
}
//-----------------------------------------------------
////////////////////////////////////////////////////////////////////It Should Be Deleted
//-----------------------------------------------------
//convert to editable BOolen
function BEditInline(ID){
	$("#editbtn").fadeIn(2000);
	var CID="#"+ID.id;
	//var value=$(CID).val();
	if(($(CID+" input").val())==1) {
			$(CID).removeClass("approved");
			$(CID).addClass("pending");
			$(CID+" a").html('غیر فعال');
			$(CID+" input").val(0);
	}
	else if(($(CID+" input").val())==0) {
			$(CID).removeClass("pending");
			$(CID).addClass("approved");
			$(CID+" a").html('فعال');
			$(CID+" input").val(1);
	}
}
//-----------------------------------------------------
////////////////////////////////////////////////////////////////////////////////////////////////
//-----------------------------------------------------
//Save UserEdit
function SaveForm(form,DST){
	$('.loading_button').html(loading4).show();
	var value=$("#"+form).serialize();
			$.post(DST,value,function(data,status){
				if (data=="<script language='javascript'> AlertPrm(); </script>")
			{
				AlertPrm();
			}
				switch(data){
				case "a":
					$('.loading_button').hide();
					$("li.red#1").show().delay(2000).fadeOut(4000);
					break;
				case "b":
					$('.loading_button').hide();
					$("li.red#2").show().delay(2000).fadeOut(4000);
					break;
				case "c":
					$('.loading_button').hide();
					$("li.red#3").show().delay(2000).fadeOut(4000);
					break;
				case "d":
					$('.loading_button').hide();
					$("li.red#4").show().delay(2000).fadeOut(4000);
					break;
				case "f":
					$('.loading_button').hide();
					$("li.red#6").show().delay(2000).fadeOut(4000);
					break;
				case "g":
					$('.loading_button').hide();
					$("li.red#7").show().delay(2000).fadeOut(4000);
					break;
				case "z":
					$("#1gren").show().delay(2000).fadeOut(4000);
					$('.changed').addClass('greened');
					$('.changed').removeClass('changed');
					$('.loading_button').hide();
					break;
				case "jz":
					$("li.red#9").show().delay(2000).fadeOut(4000);
					$('.changed').addClass('greened');
					$('.changed').removeClass('changed');
					$('.loading_button').hide();
					break;
				
				
				default:
					$("li.red#5").show().delay(2000).fadeOut(4000);
					$('.loading_button').hide();
				}
			});
}
//-----------------------------------------------------
//-----------------------------------------------------
//Save Support
function SaveSupport(){
	$('.loading_button').html(loading4).show();
	var value=$("#Reg_Support").serialize();
			$.post('support/reg.php',value,function(data){
				if (data=="<script language='javascript'> AlertPrm(); </script>")
			{
				AlertPrm();
				
			} 
			var result=new Array();
			var result=data.split(",");
				switch(result[0]){
				case "Ok":
					$('.loading_button').hide();
					$("li.red#P11").show().delay(2000).fadeOut(4000);
					var page='support/print.php?TKID='+result[1];
					loadpage(page);
					break;
					case "Ok2":
					$('.loading_button').hide();
					$("li.red#P11").show().delay(2000).fadeOut(4000);
					var page='support/print2.php?TKID='+result[1];
					loadpage(page);
					break;
					case "Ok3":
					$('.loading_button').hide();
					$("li.red#P11").show().delay(2000).fadeOut(4000);
					var page='support/print3.php?TKID='+result[1];
					loadpage(page);
					break;
				default:
					$("li.red#P11").show().delay(2000).fadeOut(4000);
					$('.loading_button').hide();
				}
			});
}
//-----------------------------------------------------
//-----------------------------------------------------
//Prefix Subnet range
function PrefixSubnet(id){
	$('.section').html(loading1);
	$.post('prefix/Subnet.php',{PID:id},function(data){
			$('.section').html(data);
		});
}
//-----------------------------------------------------
//-----------------------------------------------------
//Edit Prefix
function EditPrefix(id){
	var value=$("#EditSubnet").serialize();
	$('.section').html(loading1);
	$.post('prefix/Edit.php',value,function(data){ 
		if (data==1) {
			$('.section').load('prefix/List.php');
			}
	});
}
//-----------------------------------------------------
//-----------------------------------------------------
//Validate Entered prefix
function validatePrefix(VID){
	var value=$(VID).val();
	if (value<256) {
		$(VID).css('color','#06F');
	}
	if (value>255) {
		$(VID).css('color','#F00');
	}
	var len=value.length-1;
	if (value.charCodeAt(len)==46){
		var ST=$(VID).val().substring(0,len);
		$(VID).val(ST);
		ID=VID.id;
		ID++;
		$('#'+ID).focus();
	}
	if (value.charCodeAt(len)==47){
		var ST=$(VID).val().substring(0,len);
		$(VID).val(ST);
		$('#CIDR').focus();
	}
	
}
//-----------------------------------------------------
//-----------------------------------------------------
//Validate Entered CIDR
function validateCIDR(VID){
	var value=$(VID).val();
	if (value<=32) {
		$(VID).css('color','#06F');
	}
	if (value>32) {
		$(VID).css('color','#F00');
	}
	
}
//-----------------------------------------------------
//-----------------------------------------------------

//-----------------------------------------------------
//Delete Prefix
function DelPrefix(id){
$("#dialog").html("آیا اطمینان دارید؟");
   	$( "#dialog" ).dialog({
        width:200,
        height:'auto',
        resizable:false,
        modal: true,
        dialogClass: "dialogWithDropShadow",
        buttons: [
			{
					text: "بلی",
					click: function() {
						$( this ).dialog( "close" );
$('#dialog').dialog('destroy');   $('#dialog').hide();
						$.post("prefix/Delete.php",{PID:id},function(data){
							if (data=="<script language='javascript'> AlertPrm(); </script>")
			{
				AlertPrm();
				
			}
							if (data==1) {
							$('#'+id).fadeOut(2000);
							var num=$('#num').text();
							num--;
							$('#num').html(num);
							$("#12.green").show().delay(2000).fadeOut(4000);
							
					
			}
		});
					}
				},
					{
					text: "خیر",
					click: function() {
						$( this ).dialog( "close" );
$('#dialog').dialog('destroy');   $('#dialog').hide();
					}
				}
		]
    });
}
//-----------------------------------------------------
//-----------------------------------------------------
//Open Add Tower
function OpenAddTower(ID){
	if($('#AddTower').is(":hidden")) {
			$('#AddTower').slideDown('slow');
	}
	else  {
		$('#AddTower').slideUp('slow');
	}
}
//-----------------------------------------------------
//-----------------------------------------------------
//Add Tower
function AddTower(){
	$('.loading_button').html(loading4);
	var value=$("#Tower").serialize();
	$.post('tower/Add.php',value,function(data){
		if (data=="<script language='javascript'> AlertPrm(); </script>")
			{
				AlertPrm();
				
			}
		switch(data){
			
				case "a":
					$("li.red#11").show().delay(2000).fadeOut(4000);
					$('.loading_button').empty();
					break;
				case "b":
					$("li.red#12").show().delay(2000).fadeOut(4000);
					$('.loading_button').empty();
					break;
				case "c":
					$("li.red#14").show().delay(2000).fadeOut(4000);
					$('.loading_button').empty();
					break;
				case "z":
				{
					$("#11.green").show().delay(2000).fadeOut(4000);
					$('#AddTower').slideUp('slow');
					$('#tabletower').load('tower/List.php #tabletower');
					$('.loading_button').empty();
					break;
				}
				default:
					$("li.red#13").show().delay(2000).fadeOut(4000);
					$('.loading_button').empty();
			}
	});
}
//-----------------------------------------------------
//-----------------------------------------------------
//Delete Tower
function DelTower(id){
$("#dialog").html("آیا اطمینان دارید؟");
   	$( "#dialog" ).dialog({
        width:200,
        height:'auto',
        resizable:false,
        modal: true,
        dialogClass: "dialogWithDropShadow",
        buttons: [
			{
					text: "بلی",
					click: function() {
						$( this ).dialog( "close" );
$('#dialog').dialog('destroy');   $('#dialog').hide();
						$.post("tower/Delete.php",{TWID:id},function(data){
							if (data=="<script language='javascript'> AlertPrm(); </script>")
			{
				AlertPrm();
				
			}
							switch (data)
							{
							case 'a':
							$('#'+id).fadeOut(2000);
							$("#12.green").show().delay(2000).fadeOut(4000);
							break;
							
							case 'b':
							$("#15.red").show().delay(2000).fadeOut(4000);
							break;
							
							default:
							$("#15.red").show().delay(2000).fadeOut(4000);
					
			}
		});
					}
				},
					{
					text: "خیر",
					click: function() {
						$( this ).dialog( "close" );
$('#dialog').dialog('destroy');   $('#dialog').hide();
					}
				}
		]
    });
}
//-----------------------------------------------------
//-----------------------------------------------------
//Add Switch
function AddSwitch(){
	$('.loading_button').html(loading4);
	var value=$("#Switch").serialize();
	$.post('switch/Add.php',value,function(data){
		if (data=="<script language='javascript'> AlertPrm(); </script>")
			{
				AlertPrm();
				
			}
		switch(data){
				case "a":
					$("li.red#11").show().delay(2000).fadeOut(4000);
					$('.loading_button').empty();
					break;
				case "b":
					$("li.red#12").show().delay(2000).fadeOut(4000);
					$('.loading_button').empty();
					break;
				case "c":
					$("li.red#14").show().delay(2000).fadeOut(4000);
					$('.loading_button').empty();
					break;
				case "d":
					$("li.red#15").show().delay(2000).fadeOut(4000);
					$('.loading_button').empty();
					break;
				case "i":
					$("li.red#16").show().delay(2000).fadeOut(4000);
					$('.loading_button').empty();
					break;
				case "j":
					$("li.red#17").show().delay(2000).fadeOut(4000);
					$('.loading_button').empty();
					break;
				case "z":
				{
					$("#11.green").show().delay(2000).fadeOut(4000);
					$('#AddSwitch').slideUp('slow');
					$('#tableswitch').load('switch/List.php #tableswitch');
					$('.loading_button').empty();
					break;
				}
				default:
					$("li.red#13").show().delay(2000).fadeOut(4000);
					$('.loading_button').empty();
			}
	});
}
//-----------------------------------------------------
//-----------------------------------------------------
//Open Add Switch
function OpenAddSwitch(ID){
	if($('#AddSwitch').is(":hidden")) {
			$('#AddSwitch').slideDown('slow');
	}
	else  {
		$('#AddSwitch').slideUp('slow');
	}
}
//-----------------------------------------------------
//-----------------------------------------------------
//View Switch
function ViewSwitch(ID){
	$('.section').html(loading1);
	$('.sidebar_module1').html(loading1);
	$('.sidebar_module2').html(loading1);
	$.post('switch/View.php',{SWID:ID},function(data){
		$('.section').html(data);
	});
	$.post('sidebar/Switch.php',{SWID:ID},function(data){ 
		$('.sidebar_module1').html(data);
	});
	$.post('sidebar/SwitchAddon.php',{SWID:ID},function(data){
		$('.sidebar_module2').html(data);
	});
	
}
//-----------------------------------------------------
//-----------------------------------------------------
//View Tower
function ViewTower(ID){
	$('.section').html(loading1);
		$('.sidebar_module1').html(loading1);
	$('.sidebar_module2').html(loading1);
	$.post('tower/View.php',{TWID:ID},function(data){
		$('.section').html(data);
	});
	$.post('sidebar/Tower.php',{TWID:ID},function(data){
		$('.sidebar_module1').html(data);
	});
	$.post('sidebar/TowerAddon.php',{TWID:ID},function(data){ 
		$('.sidebar_module2').html(data);
	});
}
//-----------------------------------------------------
//-----------------------------------------------------
//Delete Switch
function DelSwitch(id){
$("#dialog").html("آیا اطمینان دارید؟");
   	$( "#dialog" ).dialog({
        width:200,
        height:'auto',
        resizable:false,
        modal: true,
        dialogClass: "dialogWithDropShadow",
        buttons: [
			{
					text: "بلی",
					click: function() {
						$( this ).dialog( "close" );
$('#dialog').dialog('destroy');   $('#dialog').hide();
						$.post("switch/Delete.php",{SWID:id},function(data){
							if (data=="<script language='javascript'> AlertPrm(); </script>")
			{
				AlertPrm();
				
			}
							switch(data){
								
							case 'b':
								$("#15.red").show().delay(2000).fadeOut(4000);
								break;
							case 'a':
							
								$('#'+id).fadeOut(2000);
								$("#12.green").show().delay(2000).fadeOut(4000)
								break;
							
							default:
								
								$("#13.red").show().delay(2000).fadeOut(4000);
							
							
					
			}
		});
					}
				},
					{
					text: "خیر",
					click: function() {
						$( this ).dialog( "close" );
$('#dialog').dialog('destroy');   $('#dialog').hide();
					}
				}
		]
    });
}
//-----------------------------------------------------
//-----------------------------------------------------
//Load page by right panel menu
function OpenBySide(ID,Path,List,div,Refer){
	$('.sidebar_module1').html(loading2);
	$('.section').html(loading2);
	$.post(Path,{ID:ID},function(data){
		$('.section').hide().html(data).fadeIn(300);
		$.post(List,{UserID:ID},function(data2){
			$(div).hide().html(data2).fadeIn(300);
		});
	});
	
	$.post('sidebar/User.php',{UserID:ID,Ref:Refer},function(data3){
		$('.sidebar_module1').hide().html(data3).fadeIn(300);
	});
}
//-----------------------------------------------------
var IPSize;

//-----------------------------------------------------
//fill the third field
function IPDelete(ID){
	$("#dialog").html("آیا اطمینان دارید؟");
   	$( "#dialog" ).dialog({
        width:200,
        height:'auto',
        resizable:false,
        modal: true,
        dialogClass: "dialogWithDropShadow",
        buttons: [
			{
					text: "بلی",
					click: function() {
						$( this ).dialog( "close" );
						$(this).empty();
						$(this).dialog("destroy");
						$.post("ip/Del.php",{IPID:ID},function(data){
							if (data=="<script language='javascript'> AlertPrm(); </script>")
			{
				AlertPrm();
				
			}
							if (data==2){
								$("#IPDeleteError").show().delay(2000).fadeOut(4000);	
							}
if (data=='k'){
			$("#IPD").show().delay(2000).fadeOut(4000);	
							}
							if (data==1) {
							$('#'+ID).hide(2000);
							
							$("#IPDelete").show().delay(2000).fadeOut(4000);
							
					
			}
		});
					}
				},
					{
					text: "خیر",
					click: function() {
						$( this ).dialog( "close" );
						$(this).empty();
						$(this).dialog("destroy");
						
					}
				}
		]
    });
}
//-----------------------------------------------------
//-----------------------------------------------------
//detail of IP
function IPOpen(ID){
	$("#dialog").html(loading2)
	$("#dialog").dialog({
		height:'auto',
		width:'auto',
		modal:false,
        });
	
	$.post("ip/View.php",{IPID:ID},function(data){
		$("#dialog").html(data);
		
	});
	
}
//-----------------------------------------------------
//-----------------------------------------------------
//Add Hardware
function AddHardware(){
	$('.loading_button').html(loading4);
	var value=$("#Hardware").serialize();
	$.post('hardware/Add.php',value,function(data){
		if (data=="<script language='javascript'> AlertPrm(); </script>")
			{
				AlertPrm();
				
			}
		switch(data){
				case "a":
					$("li.red#11").show().delay(2000).fadeOut(4000);
					$('.loading_button').empty();
					break;
				case "b":
					$("li.red#12").show().delay(2000).fadeOut(4000);
					$('.loading_button').empty();
					break;
				case "c":
					$("li.red#14").show().delay(2000).fadeOut(4000);
					$('.loading_button').empty();
					break;
				case "d":
					$("li.red#15").show().delay(2000).fadeOut(4000);
					$('.loading_button').empty();
					break;
				case "e":
					$("li.red#16").show().delay(2000).fadeOut(4000);
					$('.loading_button').empty();
					break;
				case "f":
					$("li.red#17").show().delay(2000).fadeOut(4000);
					$('.loading_button').empty();
					break;
				case "i":
					$("li.red#18").show().delay(2000).fadeOut(4000);
					$('.loading_button').empty();
					break;
				case "j":
					$("li.red#19").show().delay(2000).fadeOut(4000);
					$('.loading_button').empty();
					break;
				case "z":
				{
					$("#11.green").show().delay(2000).fadeOut(4000);
					$('#AddHardware').slideUp('fast');
					$('#Select2').empty().hide();
					$('#Select3').empty().hide();
					$('#SW').empty().hide();
					$('#PortN').empty().hide();
					$.post('hardware/Grid.php',value,function(data4){
						$('#tablehardware').html(data4);
					});
					$('.loading_button').empty();
					break;
				}
				default:
					$("li.red#13").show().delay(2000).fadeOut(4000);
					$('.loading_button').empty();
			}
	});
}
//-----------------------------------------------------
//-----------------------------------------------------
//Add duplicate Hardware
function AdddHardware(){
	$('.loading_button').html(loading4);
	var value=$("#dHardware").serialize();
	$.post('dhardware/Add.php',value,function(data){
		if (data=="<script language='javascript'> AlertPrm(); </script>")
			{
				AlertPrm();
				
			}
		switch(data){
				case "a":
					$("li.red#11").show().delay(2000).fadeOut(4000);
					$('.loading_button').empty();
					break;
				case "b":
					$("li.red#12").show().delay(2000).fadeOut(4000);
					$('.loading_button').empty();
					break;
				case "c":
					$("li.red#14").show().delay(2000).fadeOut(4000);
					$('.loading_button').empty();
					break;
				case "d":
					$("li.red#15").show().delay(2000).fadeOut(4000);
					$('.loading_button').empty();
					break;
				case "e":
					$("li.red#16").show().delay(2000).fadeOut(4000);
					$('.loading_button').empty();
					break;
				case "f":
					$("li.red#17").show().delay(2000).fadeOut(4000);
					$('.loading_button').empty();
					break;
				case "i":
					$("li.red#18").show().delay(2000).fadeOut(4000);
					$('.loading_button').empty();
					break;
				case "j":
					$("li.red#19").show().delay(2000).fadeOut(4000);
					$('.loading_button').empty();
					break;
				default:
				{
					$("#11.green").show().delay(2000).fadeOut(4000);
					$('.section').load('dhardware/Grid.php?ID='+ID)
				}
				
			}
	});
}
//-----------------------------------------------------
//-----------------------------------------------------
//Open Add Hardware
function OpenAddHardware(ID){
	$('#AddHardware').slideToggle(1000);
}
//-----------------------------------------------------
//-----------------------------------------------------
//Open Add Type
function OpenAddType(ID){
	$('#AddType').slideToggle(800);
}
//-----------------------------------------------------
//-----------------------------------------------------
//Add Type
function AddType(){
	$('.loading_button').html(loading4);
	var value=$("#Type").serialize();
	$.post('type/Add.php',value,function(data){
		if (data=="<script language='javascript'> AlertPrm(); </script>")
			{
				AlertPrm();
				
			}
		switch(data){
				case "a":
					$("li.red#11").show().delay(2000).fadeOut(4000);
					$('.loading_button').empty();
					break;
				case "b":
					$("li.red#12").show().delay(2000).fadeOut(4000);
					$('.loading_button').empty();
					break;
				case "c":
					$("li.red#13").show().delay(2000).fadeOut(4000);
					$('.loading_button').empty();
					break;
				case "z":
				{
					$("#11.green").show().delay(2000).fadeOut(4000);
					$('#AddType').slideUp('slow');
					$('#tabletype').load('type/List.php #tabletype');
					$('.loading_button').empty();
					break;
				}
				default:
					$("li.red#14").show().delay(2000).fadeOut(4000);
					$('.loading_button').empty();
			}
	});
}
//-----------------------------------------------------
//-----------------------------------------------------
//Delete Type
function TypeDelete(id){
$("#dialog").html("آیا اطمینان دارید؟");
   	$( "#dialog" ).dialog({
        width:200,
        height:'auto',
        resizable:false,
        modal: true,
        dialogClass: "dialogWithDropShadow",
        buttons: [
			{
					text: "بلی",
					click: function() {
						$( this ).dialog( "close" );
$('#dialog').dialog('destroy');   $('#dialog').hide();
						$.post("type/Delete.php",{TID:id},function(data){
							if (data=="<script language='javascript'> AlertPrm(); </script>")
			{
				AlertPrm();
				
			}
							if (data==1) {
							$('#'+id).fadeOut(2000);
							var num=$('#num').text();
							num--;
							$('#num').html(num);
							$("#12.green").show().delay(2000).fadeOut(4000);
							
					
			}
		});
					}
				},
					{
					text: "خیر",
					click: function() {
						$( this ).dialog( "close" );
$('#dialog').dialog('destroy');   $('#dialog').hide();
					}
				}
		]
    });
}
//-----------------------------------------------------
//-----------------------------------------------------
//Delete Type
function TypeEdit1(id){
	$('.section').html(loading1);
	$.post("type/Edit.php",{TID:id},function(data){
			$('.section').html(data);
		})
}
//-----------------------------------------------------
//-----------------------------------------------------
//Submiting forms(EditType) 
function EditTypePost(val){
	$('.loading_button').html(loading4);
	var value=$("#EditType").serialize();
			$.post('type/Editproc.php',value,function(data){
				if (data=="<script language='javascript'> AlertPrm(); </script>")
			{
				AlertPrm();
				
			}
				switch(data){
				case "a":
					$("li.red#11").show().delay(2000).fadeOut(4000);
					$('.loading_button').hide();
					break;
				case "b":
					$("li.red#21").show().delay(2000).fadeOut(4000);
					$('.loading_button').hide();
					break;
				case "c":
					$("li.red#31").show().delay(2000).fadeOut(4000);
					$('.loading_button').hide();
					break;
				case 'e':
					$("li.red#41").show().delay(2000).fadeOut(4000);
					$('.loading_button').hide();
					break;
				default:
					loadpage("type/List.php");
				}
			});
}
//-----------------------------------------------------
var TType;
//-----------------------------------------------------
//Filling second select menu from type page 
function TypeSelect2(val){
	$('#Lselect1').html(loading4);
		var value=$(val).val();
		TType=value;
			$.post('type/Select2.php',{Name:value},function(data){
				$('#Select2').html(data);
				$('#Select2').fadeIn(1000);
				$('#Lselect1').empty();
			});
}
//-----------------------------------------------------
//-----------------------------------------------------
//Filling third select menu from type page 
function TypeSelect3(val){
	$('#Lselect2').html(loading4);
		var Br=$(val).val();
			$.post('type/Select3.php',{Brand:Br,Type:TType},function(data){
				$('#Select3').html(data);
				$('#Select3').fadeIn(1000);
				$('#Lselect2').empty();
			});
}
//-----------------------------------------------------
//-----------------------------------------------------
//Filling The switch field
function FillSwitch(val){
	$('#Lselect3').html(loading4);
		var TW=$(val).val();
			$.post('hardware/SW.php',{TWID:TW},function(data){
				$('#SW').html(data);
				$('#SW').fadeIn(1000);
				$('#Lselect3').empty();
			});
}
//-----------------------------------------------------
//-----------------------------------------------------
//Filling The Port Field for Hardware
function FillPortHardware(val){
	$('#Lselect4').html(loading4);
		var SW=$(val).val();
			$.post('hardware/Port.php',{SWID:SW},function(data){
				$('#PortN').html(data);
				$('#PortN').fadeIn(1000);
				$('#Lselect4').empty();
			});
}
//-----------------------------------------------------
//-----------------------------------------------------
//Filling The Port List of Switch
function FillPort(val){
	$('#Lselect1').html(loading4);
		var SW=$(val).val();
			$.post('port/SwitchQ.php',{SWID:SW},function(data){
				$('#PortF').html(data);
				$('#PortF').fadeIn(1000);
				$('#Lselect1').empty();
			});
}
//-----------------------------------------------------
//-----------------------------------------------------
//Filling Editing Type of Switch
function TypeEdit(val){  
	$('#TypeEditBefore').hide();
	$('#TypeEdit').show();
	$("#editbtn").fadeIn(2000);
	$('#empty').empty();
}
//-----------------------------------------------------
//-----------------------------------------------------
//View Hardware
function ViewHardware(ID,UID){
	$('.section').html(loading2);
	$('.sidebar_module1').html(loading2);
	$.post('hardware/View.php',{HWID:ID},function(data){
		$('.section').html(data);
	});
	$.post('sidebar/User.php',{UserID:UID,HWID:ID},function(data3){
		$('.sidebar_module1').hide().html(data3).fadeIn(800);
	});
}
//-----------------------------------------------------
//-----------------------------------------------------
//Delete Hardware 
function DelHardware(id){
$("#dialog").html("آیا اطمینان دارید؟");
   	$( "#dialog" ).dialog({
        width:200,
        height:'auto',
        resizable:false,
        modal: true,
        dialogClass: "dialogWithDropShadow",
        buttons: [
			{
					text: "بلی",
					click: function() {
						$( this ).dialog( "close" );
$('#dialog').dialog('destroy');   $('#dialog').hide();
						$.post("hardware/Delete.php",{HWID:id},function(data){
							if (data=="<script language='javascript'> AlertPrm(); </script>")
			{
				AlertPrm();
				
			}
							if (data==1) {
							$('#'+id).fadeOut(2000);
							var num=$('#num').text();
							num--;
							$('#num').html(num);
							$("#12.green").show().delay(2000).fadeOut(4000);
							
					
			}
		});
					}
				},
					{
					text: "خیر",
					click: function() {
						$( this ).dialog( "close" );
$('#dialog').dialog('destroy');   $('#dialog').hide();
					}
				}
		]
    });
}
//-----------------------------------------------------
//-----------------------------------------------------
//Delete Hardware From View
function DelHardware2(id,UID){
$("#dialog").html("آیا اطمینان دارید؟");
   	$( "#dialog" ).dialog({
        width:200,
        height:'auto',
        resizable:false,
        modal: true,
        dialogClass: "dialogWithDropShadow",
        buttons: [
			{
					text: "بلی",
					click: function() {
						$( this ).dialog( "close" );
$('#dialog').dialog('destroy');   $('#dialog').hide();
						$.post("hardware/Delete.php",{HWID:id},function(data){
							if (data=="<script language='javascript'> AlertPrm(); </script>")
			{
				AlertPrm();
				
			}
							if (data==1) {
							OpenBySide(UID,'hardware/List.php','hardware/Grid.php','#tablehardware','Hardware');
			}
		});
					}
				},
					{
					text: "خیر",
					click: function() {
						$( this ).dialog( "close" );
$('#dialog').dialog('destroy');   $('#dialog').hide();
					}
				}
		]
    });
}
//-----------------------------------------------------
//-----------------------------------------------------
//Changing Port when edit Switch
function ChangePort(SW){ 
	var SWI=$(SW).val();
	var CID="#PortEditBtn";
	$.post('hardware/PortEdit.php',{SWID:SWI},function(data){
		$(CID+'.sel').html(data);
	});
	$(CID+'.vie').hide();
	$(CID+'.sel').show();
	$(CID+'.sel').on('change',function(){
		var newvalue=$(CID+'.sel  option:selected').text();
		$(CID+'.vie').children('div').children('span').html(newvalue);
		$(CID+'.sel').hide();
		$(CID+'.vie').children('div').children('span').addClass("changed");
		$(CID+'.vie').show();
		$("#editbtn").fadeIn(2000);
	 });
}
//-----------------------------------------------------
//--------Change output type of search Hardware
function ChangeOutput(ID)
    {
		var Output=$("#Output").val();
		if (Output=='Excel')
	{
		$('#www').attr("onclick"," ");
	}
	else if (Output=='Web')
	{
		$('#www').attr("onclick","HardwareSearch(this); return false; ");
		
    }
	else if (Output=='PDF')
	{
		$('#www').attr("onclick"," ");
		
    }
}
//-----------------------------------------------------
//--------Change output type of search User
function ChangeOutputUser(ID)
    {
		var Output=$("#Output").val();
		if (Output=='Excel')
	{
		$('#UserButton').attr("onclick"," ");
	}
	else if (Output=='Web')
	{
		$('#UserButton').attr("onclick","AdvancedUserSearch(this); return false; ");
		
    }
	else if (Output=='PDF')
	{
		$('#UserButton').attr("onclick"," ");
		
    }
}
//-----------------------------------------------------
//-----------------------------------------------------
//Search Hardware
function HardwareSearch(id){	
	var value=$("#hardwaresearch").serialize();
	$('.Ad_loading_button').html(loading3);
	$('sidebar_module1').html(loading2);
	$.post('hardware/SearchProc.php',value,function(data){
			$('#TableUser').hide().html(data).fadeIn(500);
			$('.Ad_loading_button').hide();
		});
}
//-----------------------------------------------------
//-----------------------------------------------------
//Change Search Tab
function ChangeTab(objID){
	$('.tselected').removeClass('tselected');
	$('#'+objID).addClass('tselected');
	$('div.Tab_Show').addClass('Tab_Hide');
	$('div.Tab_Show').removeClass('Tab_Show');
	$('div#'+objID).removeClass('Tab_Hide');
	$('div#'+objID).addClass('Tab_Show');
}
//-----------------------------------------------------
//-----------------------------------------------------
//--------convert digit to persian
function fdigit(number) {
	number +='';
	var ret = '';
     for (var i = 0, len = number.length; i < len; i++) {
		  numCode = parseInt(number.charCodeAt(i));
		  if( 47 < numCode && numCode < 58) 
		  		newCode = number.charCodeAt(i) + 1728;
		  else{
		  		newCode = number.charCodeAt(i);
		  }
				
           ret += String.fromCharCode(newCode);
	}
     return ret;
}
//-----------------------------------------------------
//-----------------------------------------------------
//Pagination
function Pagination(K,Start,End,Pages){
	$('#page_no_first').html(K);
	$('.pag_active').removeClass('pag_active');
	$('#PA'+K).addClass('pag_active');
	$('.first').addClass('rowhide');
	for (var i=Start;i<End;i++){
	$('.rowhide#tr_'+i).removeClass('rowhide');  
	}
	for (var f=0;f<Pages+1;f++)
	{
		if (K+3<f||f<K-3)
		{
		$('#PA'+f).addClass('phide');
		}
		else {
		$('#PA'+f).removeClass('phide');
		}
	}
if (K>4)
{
	$('#PA0').removeClass('phide');	
}
else
{
	$('#PA0').addClass('phide');	
}
if (K<(Pages-3))
{
	$('#PAE').removeClass('phide');	
}
else
{
	$('#PAE').addClass('phide');	
}
if (K>Pages)
{ var Q=K-2;
	$('#PA'+Q).prev('span').removeClass('phide');
	$('#PA'+Q).prev('span').prev('span').removeClass('phide');
	$('#PA'+Q).prev('span').prev('span').prev('span').removeClass('phide')	
}
}
//-----------------------------------------------------


//-----------------------------------------------------
//Delete User
function DeleteUser(Obj){
	$("#dialog").html("آیا اطمینان دارید؟");
   	$( "#dialog" ).dialog({
        width:200,
        height:'auto',
        resizable:false,
        modal: true,
        dialogClass: "dialogWithDropShadow",
        buttons: [
			{
				text: "بلی",
				click: function() {
					$( this ).dialog( "close" );
$('#dialog').dialog('destroy');   $('#dialog').hide();
					$.post('../proc/DeleteUser.php',{UserID:Obj},function(data){
						if (data=="<script language='javascript'> AlertPrm(); </script>")
			{
				AlertPrm();
				
			}
						switch(data){
							case "a":
								$("li.red#6").show().delay(2000).fadeOut(4000); 
								break;
							case "b": 
								$("li.red#7").show().delay(2000).fadeOut(4000);
								break;
							case "c": 
								$("li.red#8").show().delay(2000).fadeOut(4000)
								break;
							case "z": 
								$("#dialog").html("مشترک با موفقیت حذف گردید.");
								$( "#dialog" ).dialog({
									width:200,
									height:'auto',
									resizable:false,
									modal: true,
									dialogClass: "dialogWithDropShadow",
									buttons: [
										{
											text: "تایید",
											click: function() {
												$( this ).dialog( "close" );
												$('#dialog').dialog('destroy');   
												$('#dialog').hide();
												loadpage('../form/Users.php');
												}
											}
									]
								})
								break;
							default:
								$("li.red#5").show().delay(2000).fadeOut(4000);
							
							}
	});
					}
				},
					{
					text: "خیر",
					click: function() {
						$( this ).dialog( "close" );
$('#dialog').dialog('destroy');   $('#dialog').hide();
					}
				}
		]
    });
	
}
//-----------------------------------------------------
//-----------------------------------------------------
//Search Deleted IP
function DeletedIP(id){	
	var value=$("#DeletedIP").serialize();
	$('.Ad_loading_button').html(loading3);
	$('sidebar_module1').html(loading2);
	$.post('ip/SearchDeletedProc.php',value,function(data){
		if (data=="<script language='javascript'> AlertPrm(); </script>")
			{
				AlertPrm();
				
			}
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
//-----------------------------------------------------
//Search Audit
function AuditSearch(id){	
	var value=$("#auditsearch").serialize();
	$('.Ad_loading_button').html(loading3).show(); 
	$.post('proc/AuditSearchProc.php',value,function(data){
		
			$('#TableUser').hide().html(data).fadeIn(500);
			$('.Ad_loading_button').hide();
		});
}
//-----------------------------------------------------
//-----------------------------------------------------    
//Search Audit Specefic
function AuditSearchSP(AID,Obj,OIDD){	
	$('.section').html(loading1);
	$.post('proc/AuditSearchSP.php',{Admin:AID,Obje:Obj,OID:OIDD},function(data){
			$('.section').html(data).fadeIn(500);
		});
}
//-----------------------------------------------------
//-----------------------------------------------------
//Permission Alert
function AlertPrm(){
	$("#dialog").html("شما دسترسی لازم را ندارید!");
   	$( "#dialog" ).dialog({
        width:200,
        height:'auto',
        resizable:false,
        modal: true,
        dialogClass: "dialogWithDropShadow", 
        buttons: [
			{
					text: "خروج",
					click: function() {
						$( this ).dialog( "close" );
$('#dialog').dialog('destroy');   $('#dialog').hide();
						
						}
				}
					
				
		]
    });
}
//-----------------------------------------------------
//-----------------------------------------------------
//Writing into Ripe Database
function PersonObject(ID){
	$( "#dialog" ).html(loading2);
	$( "#dialog" ).dialog({
        width:'auto',
        height:'auto',
		hide: 'Puff',
		dialogClass: "dialogprogress",
        resizable:false,
        modal: false
           });
		    $(".ui-dialog-titlebar").hide();    
	$.post('proc/Person.php',{UserID:ID},function(data){
		switch(data)
		{
			case 'e':
			$( "#dialog" ).dialog( "close" );
			$( "#dialog" ).dialog( "destroy" );
			$( "#dialog" ).empty();
				$("#PEmpty").show().delay(2000).fadeOut(4000);
				break;
			case 'b':
			$( "#dialog" ).dialog( "close" );
			$( "#dialog" ).dialog( "destroy" );
			$( "#dialog" ).empty();
				$("#PExs").show().delay(2000).fadeOut(4000);
				break;
			case 'z':
			$( "#dialog" ).dialog( "close" );
			$( "#dialog" ).dialog( "destroy" );
			$( "#dialog" ).empty();
				$("#PSuc").show().delay(2000).fadeOut(4000);
				break;
			default:
			$( "#dialog" ).dialog( "close" );
			$( "#dialog" ).dialog( "destroy" );
			$( "#dialog" ).empty();
				$("#PUnk").show().delay(2000).fadeOut(4000);
				break;
		}
	});
	
}
//-----------------------------------------------------
//-----------------------------------------------------
//Redirect Out
function RunOut(){
	$("#dialog").html("برای ادامه , لطفا مجددا وارد شوید<br /><a style='color:#090;' href='logout.php'>ورود</a>");
   	$( "#dialog" ).dialog({
        width:300,
        height:'auto',
        resizable:false,
        modal: true,
		
       
    });
}
//-----------------------------------------------------
//-----------------------------------------------------
//Writing inetnum into Ripe Database
function IPReg(ID){
	$( "#dialog" ).html(loading2);
	$( "#dialog" ).dialog({
        width:'auto',
        height:'auto',
		hide: 'Puff',
		dialogClass: "dialogprogress",
        resizable:false,
        modal: false
           });
		    $(".ui-dialog-titlebar").hide();  
	$.post('proc/inetnum.php',{IPID:ID},function(data){
		switch(data)
		{
			case 'e':
				$( "#dialog" ).dialog( "close" );
			$( "#dialog" ).dialog( "destroy" );
			$( "#dialog" ).empty();
				$("#PExs2").show().delay(2000).fadeOut(4000);
				break;
			case 'z':
				$( "#dialog" ).dialog( "close" );
			$( "#dialog" ).dialog( "destroy" );
			$( "#dialog" ).empty();
				$("#PSuc").show().delay(2000).fadeOut(4000);
				$('#RipeReg'+ID).hide();
				$('#RipeClear'+ID).show();
				break;
			default:
				$( "#dialog" ).dialog( "close" );
			$( "#dialog" ).dialog( "destroy" );
			$( "#dialog" ).empty();
				$("#PUnk").show().delay(2000).fadeOut(4000);
				break;
		}
	});
}
//-----------------------------------------------------
//-----------------------------------------------------
//deleting inetnum into Ripe Database
function IPClear(ID){
		$( "#dialog" ).html(loading2);
		$( "#dialog" ).dialog({
        width:'auto',
        height:'auto',
		hide: 'Puff',
		dialogClass: "dialogprogress",
        resizable:false,
        modal: false
           });
		    $(".ui-dialog-titlebar").hide(); 
	$.post('proc/inetnumdelete.php',{IPID:ID},function(data){
		switch(data)
		{
			case 'e':
				$( "#dialog" ).dialog( "close" );
				$( "#dialog" ).dialog( "destroy" );
				$( "#dialog" ).empty();
				$("#PDExs").show().delay(2000).fadeOut(4000);
				break;
			case 'z':
				$( "#dialog" ).dialog( "close" );
				$( "#dialog" ).dialog( "destroy" );
				$( "#dialog" ).empty();
				$("#PDSuc").show().delay(2000).fadeOut(4000);
				$('#RipeClear'+ID).hide();
				$('#RipeReg'+ID).show();
				break;
			default:
				$( "#dialog" ).dialog( "close" );
				$( "#dialog" ).dialog( "destroy" );
				$( "#dialog" ).empty();
				$("#PDUnk").show().delay(2000).fadeOut(4000);
				break;
		}
	});
}
//-----------------------------------------------------
//-----------------for setup---
//-----------------------------------------------------------------------------
function setup()
{
	$('#loading_button').show(); 
	var value=$('#Setup').serialize();
	$.post('setupproc.php',value,function(data){
		switch(data)
		{
			case 'a':
			$("#Ea").show().delay(2000).fadeOut(4000);
			$('#loading_button').hide();
			break;
			
			case 'b':
			$("#Eb").show().delay(2000).fadeOut(4000);
			$('#loading_button').hide();
			break;
			
			case 'c':
			$("#Ec").show().delay(2000).fadeOut(4000);
			$('#loading_button').hide();
			break;
			
			case 'd':
			$("#Ed").show().delay(2000).fadeOut(4000);
			$('#loading_button').hide();
			$('.section_inner').html("<div style='color:#036; margin-top:100px; margin-right:40px; border-color:#090; border-style:dashed; padding:50px;'><a href='../login.php'>عملیات نصب با موفقیت انجام شد. لطفا برای ادامه با<br  />نام کاربری :admin<br />رمز عبور : admin<br />وارد شوید.<br></a></div>");
			
			break;
			
			case 'e':
			$("#Ee").show().delay(2000).fadeOut(4000);
			$('#loading_button').hide();
			break;
			
			default:
			$("#Ef").show().delay(2000).fadeOut(4000);
			$('#loading_button').hide();
			break;
		}
	});
}
//-----------------------
//-----------------------------------------------------
//Disable Port
function DisablePort(id){
$.post("port/disable.php",{PortID:id},function(data){
if (data==33)
	{
$('#portdisabled'+id).html("<a class='Accok' id='$"+id+"' href='javascript:EnablePort("+id+");' title='فعال' ></a>");
$('#portdisabled_describ'+id).html('پورت خراب است'); 
$('#portstatus'+id).html('<span style="color:#fea703 !important;">خراب</span>'); 
	}
	
	});
}
//-----------------------------------------------------
//-----------------------------------------------------
//Enable Port
function EnablePort(id){
$.post("port/enable.php",{PortID:id},function(data){
if (data==44)
	{
	$('#portdisabled'+id).html("<a class='Accdelete' id='$"+id+"' href='javascript:DisablePort("+id+");' title='غیر فعال' ></a>");
	$('#portdisabled_describ'+id).empty();
	$('#portstatus'+id).html('<span style="color:green !important;">آزاد</span>');
	}
	
	});
}
//-----------------------------------------------------
//-----------------------------------------------------
//----Delete Prefix
function printDiv(id)
{
    var contents = $("#"+id).html();

    if ($("#printDiv").length == 0)
    {
    var printDiv = null;
    printDiv = document.createElement('div');
    printDiv.setAttribute('id','printDiv');
    printDiv.setAttribute('class','printable');
    $(printDiv).appendTo('body');
    }

    $("#printDiv").html(contents);

    window.print();

    $("#printDiv").remove();
//-----------------------------------------------------
//-----------------------------------------------------
//----Delete Prefix
}
function ViewTicket(Request,TKID,TLID) {
	$('.section').html(loading2);
	if (Request==1)
	{
		var URL='support/print.php';
	}
	else if (Request==2)
	{
		var URL='support/print2.php';
	}
	else if (Request==3)
	{
		var URL='support/print3.php';
	}
	loadpage(URL+'?TKID='+TKID+'&TLID='+TLID);
}
//-----------------------------------------------------
//-----------------------------------------------------
//----Close TIcket
function CloseTicket(Request,TKID,TLID){
$("#dialog").html("آیا اطمینان دارید؟");
   	$( "#dialog" ).dialog({
        width:200,
        height:'auto',
        resizable:false,
        modal: true,
        dialogClass: "dialogWithDropShadow",
        buttons: [
			{
					text: "بلی",
					click: function() {
						$( this ).dialog( "close" );
$('#dialog').dialog('destroy');   $('#dialog').hide();
						$.post("support/close.php",{TKID:TKID},function(data){
							if (data=="<script language='javascript'> AlertPrm(); </script>")
			{
				AlertPrm();
				
			}
							if (data==1) {
							$('#LK'+TLID).fadeOut(2000);
							var num=$('#num').text();
							num--;
							$('#num').html(num);
							$("#12.green").show().delay(2000).fadeOut(4000);
							
					
			}
		});
					}
				},
					{
					text: "خیر",
					click: function() {
						$( this ).dialog( "close" );
$('#dialog').dialog('destroy');   $('#dialog').hide();
					}
				}
		]
    });
}
//-----------------------------------------------------