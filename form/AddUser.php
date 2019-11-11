<?php
$id='P11';
$lv='3';
$FID='F10';
 include('../global/header.php'); ?>
<span class="pages" id="MN21"></span>
      <!--[if !IE]>start info<![endif]-->
      <div id="info"> 
        <!--[if !IE]>start section<![endif]-->
        <div class="section"> 

<!--[if !IE]>start section inner <![endif]-->
<div class="section_inner">
<?php
$error=new error;
$error->begin();
$error->row('red','1',_ERROR_ENTER_NAME);
$error->row('red','2',_ERROR_ENTER_CONT);
$error->row('red','3',_ERROR_DUP_NAME);
$error->row('red','4',_ERROR_DUP_NAME);
$error->row('red','5',_ERROR_DUP_CONT);
$error->row('red','6',_ERROR_COMMON);
$error->finish();

	$form= new form;
	$form->Body(_ADD_NEW_USER,'proc/AddUser.php',$FID,'POST','Add_User');
	$form->Start();
	$form->Text(_USER_NAME,'Name','',"validateDB(this,'".$form->Form_ID.$form->Element_Number."','Name');",_USER_ERROR_DUPNAME);
	$form->Text(_USER_REG_NAME,'LatName','',"validateDB(this,'".$form->Form_ID.$form->Element_Number."','LatName');",_USER_ERROR_DUPNAME);
	$form->Text(_USER_CONT,'Cont','',"validateDB(this,'".$form->Form_ID.$form->Element_Number."','Cont');",_USER_ERROR_DUPCONT);
	$form->Text(_USER_TEL,'Tel',_PLACE_USER_TEL,"ValidateInt(this,'".$form->Form_ID.$form->Element_Number."');",_USER_ERROR_WRONGNUM,'onkeyup');
	$form->Text(_USER_MOB,'Mob',_PLACE_USER_MOB,"ValidateInt(this,'".$form->Form_ID.$form->Element_Number."');",_USER_ERROR_WRONGNUM,'onkeyup');
$form->Text(_USER_RESP,'Resp',_PLACE_USER_RESP);
$form->Text(_USER_REG_RESP,'LatResp',_PLACE_USER_REG_RESP);
$form->Text(_USER_EMAIL,'Email',_PLACE_USER_EMAIL);
$form->Text(_USER_BW,'BW',_PLACE_USER_BW);
$form->Active(_USER_STATUS,'Status');
$form->TextArea(_USER_ADDRESS,'Address');
$form->TextArea(_USER_REG_ADDRESS,'LatAddress');
$form->TextArea(_USER_DESCR,'Descrip');
$form->button(_ADD,'add_button','AddUser("'.$FID.'"); return false;');
$form->Finish();
		
?>
        	
</div>
<!--[if !IE]>end section inner<![endif]-->
         </div>
        <!--[if !IE]>end section<![endif]--> 
        
      </div>
      <!--[if !IE]>end info<![endif]-->

      <?php  include("../global/footer.php"); ?>