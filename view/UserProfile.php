<?php
$id='P11';
$lv='1';
$FID='F10';
include('../global/header.php'); ?>

<span class="pages" id="MN22"></span>
<?php
$UserID=stripslashes(mysql_real_escape_string($_GET['UserID']));
$DB2= new Database;
$DB2->Connect();
if ($DB2->Select('User','*',"UserID=".$UserID." and NDeleted=1")=== false)
{
	echo '<div style="margin: 30px; color:red;">'._ERROR_USER_NOTFOUND.'</div>';
	exit; 
}
else
{
$array=$DB2->Select_Result[0];
$num=$DB2->Select_Rows;
if ($num==0)
{
echo '<div style="margin: 30px; color:red;">'._ERROR_USER_NOTFOUND.'</div>';
 exit;
}
extract($array);
$empty='-----';
?>
<!--[if !IE]>start info<![endif]-->
<div id="info"> 
  <!--[if !IE]>start section<![endif]-->
  <div class="section">
    <div class="title_wrapper"> </div>
    <!--[if !IE]>start section inner <![endif]-->
    <div class="section_inner">
      <?php
$error=new error;
$error->begin();
$error->row('red','1',_ERROR_ENTER_NAME);
$error->row('red','2',_ERROR_ENTER_CONT);
$error->row('red','3',_ERROR_DUP_NAME);
$error->row('red','4',_ERROR_DUP_CONT);
$error->row('red','5',_ERROR_COMMON);
$error->row('red','6',_ERROR_REM_IP);
$error->row('red','7',_ERROR_REM_HARDWARE);
$error->row('red','8',_ERROR_REM_RIPE);
$error->row('red','9',_ERROR_EDIT_RIPE);
$error->row('red','10',_ERROR_REM_PERSON);
$error->row('green','1gren',_ERROR_USER_EDITED);
$error->row('green','2gren',_ERROR_USER_DELETED);
$error->row('green','PSuc',_ERROR_RIPE_SAVED);
$error->row('red','PEmpty',_ERROR_ENOUGH_INFORM);
$error->row('red','PUnk',_ERROR_RIPE_REG);
$error->row('red','PExs',_ERROR_RIPE_DUP);
$error->finish();

?>
      
      <!--[if !IE]>start forms<![endif]-->
      
      <form id="<?php echo $FID; ?>" method="post" class="search_form general_form">
        
        <!--[if !IE]>start fieldset<![endif]-->
        
        <fieldset>
          <input type="hidden" name="UserID" value="<?php echo $UserID; ?>"  />
          
          <!--[if !IE]>start forms<![endif]-->
          
          <div class="forms">
            <h3><?php echo _USER_INFORMATION; ?></h3>
            
            <!--[if !IE]>start row<![endif]-->
            
            <div class="row">
              <label><?php echo _USER_ID; ?>:</label>
              <div class="inputs">
                <div align="right"><span class="view_wrapper" id="ID" > <?php echo $UserID; ?> </span> </div>
              </div>
            </div>
            
            <!--[if !IE]>end row<![endif]--> 
            
            <!--[if !IE]>start row<![endif]-->
            <div class="row">
              <label><?php echo _USER_NAME; ?>:</label>
              <div class="inputs">
                <div align="right"><span class="view_wrapper">
                  <input class='inputview' name='Name' readonly id="<?php echo $FID.'1'; ?>"  type='text' value="<?php if (empty($Name)) echo $empty; else echo $Name; ?>" onclick="EditInline(this,'<?php echo $FID.'1'; ?>'); return false;" >
                  </span> <span id="<?php echo $FID.'1'; ?>" class="system positive" >&nbsp;</span> <span id="<?php echo $FID.'1'; ?>" class="system negative"  ><?php echo _ERROR_DUP_NAME; ?></span> <span id="<?php echo $FID.'1E'; ?>" class="system negative"  ><?php echo _ERROR_ENTER_EMPTY; ?></span> </div>
              </div>
            </div>
            <!--[if !IE]>end row<![endif]--> 
            
            <!--[if !IE]>start row<![endif]-->
            <div class="row">
              <label><?php echo _USER_REG_NAME; ?>:</label>
              <div class="inputs">
                <div align="right"><span class="view_wrapper">
                  <input class='inputview' name='LatName' readonly id="<?php echo $FID.'15'; ?>"  type='text' value="<?php if (empty($LatName)) echo $empty; else echo $LatName; ?>" onclick="EditInline(this,'<?php echo $FID.'15'; ?>'); return false;" >
                  </span> <span id="<?php echo $FID.'15'; ?>" class="system positive" >&nbsp;</span> <span id="<?php echo $FID.'15'; ?>" class="system negative"  ><?php echo _ERROR_DUP_NAME; ?></span> <span id="<?php echo $FID.'15E'; ?>" class="system negative"  ><?php echo _ERROR_ENTER_EMPTY; ?></span> </div>
              </div>
            </div>
            <!--[if !IE]>end row<![endif]--> 
            
            <!--[if !IE]>start row<![endif]-->
            <div class="row">
              <label><?php echo _USER_CONT; ?>:</label>
              <div class="inputs">
                <div align="right"><span class="view_wrapper">
                  <input class='inputview' name='Cont' readonly id="<?php echo $FID.'2'; ?>"  type='text' value="<?php if (empty($Cont)) echo $empty; else echo $Cont; ?>" onclick="EditInline(this,'<?php echo $FID.'2'; ?>'); return false;" >
                  </span> <span id="<?php echo $FID.'2'; ?>" class="system positive" >&nbsp;</span> <span id="<?php echo $FID.'2'; ?>" class="system negative"  ><?php echo _ERROR_DUP_CONT; ?></span> <span id="<?php echo $FID.'2E'; ?>" class="system negative"  ><?php echo _ERROR_ENTER_EMPTY; ?></span> </div>
              </div>
            </div>
            
            <!--[if !IE]>end row<![endif]--> 
            
            <!--[if !IE]>start row<![endif]-->
            
            <div class="row">
              <label><?php echo _USER_TEL; ?>:</label>
              <div class="inputs">
                <div align="right"><span class="view_wrapper">
                  <input class='inputview' name='Tel' readonly id="<?php echo $FID.'3'; ?>"  type='text' value="<?php if (empty($Tel)) echo $empty; else echo $Tel; ?>" onclick="IEditInline(this,'<?php echo $FID.'3'; ?>'); return false;" >
                  </span> <span id="<?php echo $FID.'3'; ?>" class="system positive">&nbsp;</span> <span id="<?php echo $FID.'3'; ?>" class="system negative"><?php echo _USER_ERROR_WRONGNUM; ?></span> </div>
              </div>
            </div>
            
            <!--[if !IE]>end row<![endif]--> 
            
            <!--[if !IE]>start row<![endif]-->
            
            <div class="row">
              <label><?php echo _USER_MOB; ?>:</label>
              <div class="inputs">
                <div align="right"><span class="view_wrapper">
                  <input class='inputview' name='Mob' readonly id="<?php echo $FID.'4'; ?>"  type='text' value="<?php if (empty($Mob)) echo $empty; else echo $Mob; ?>" onclick="IEditInline(this,'<?php echo $FID.'4'; ?>'); return false;" >
                  </span> <span id="<?php echo $FID.'4'; ?>" class="system positive">&nbsp;</span> <span id="<?php echo $FID.'4'; ?>" class="system negative"><?php echo _USER_ERROR_WRONGNUM; ?></span> </div>
              </div>
            </div>
            
            <!--[if !IE]>end row<![endif]--> 
            
            <!--[if !IE]>start row<![endif]-->
            
            <div class="row">
              <label><?php echo _USER_RESP; ?>:</label>
              <div class="inputs">
                <div align="right"><span class="view_wrapper">
                  <input class='inputview' name='Resp' readonly id="<?php echo $FID.'5'; ?>"  type='text' value="<?php if (empty($Resp)) echo $empty; else echo $Resp; ?>" onclick="NEditInline(this,'<?php echo $FID.'5'; ?>'); return false;" >
                  </span> </div>
              </div>
            </div>
            
            <!--[if !IE]>end row<![endif]--> 
            <!--[if !IE]>start row<![endif]-->
            <div class="row">
              <label><?php echo _USER_REG_RESP; ?>:</label>
              <div class="inputs">
                <div align="right"><span class="view_wrapper">
                  <input class='inputview' name='LatResp' readonly id="<?php echo $FID.'16'; ?>"  type='text' value="<?php if (empty($LatResp)) echo $empty; else echo $LatResp; ?>" onclick="NEditInline(this,'<?php echo $FID.'16'; ?>'); return false;" >
                  </span> </div>
              </div>
            </div>
            <!--[if !IE]>end row<![endif]--> 
            <!--[if !IE]>start row<![endif]-->
            <div class="row">
              <label><?php echo _USER_EMAIL; ?>:</label>
              <div class="inputs">
                <div align="right"><span class="view_wrapper">
                  <input class='inputview' name='Email' readonly id="<?php echo $FID.'17'; ?>"  type='text' value="<?php if (empty($Email)) echo $empty; else echo $Email; ?>" onclick="NEditInline(this,'<?php echo $FID.'17'; ?>'); return false;" >
                  </span> </div>
              </div>
            </div>
            <!--[if !IE]>end row<![endif]--> 
            
            <!--[if !IE]>start row<![endif]-->
            
            <div class="row">
              <label><?php echo _USER_NICHDL; ?>:</label>
              <div class="inputs">
                <div align="right"><span class="view_wrapper" id="ID">
                  <?php 
			if ($NICHDL!='0')
			{
				echo $NICHDL;
			}
			else echo "<span style='color:#B86464;'>"._USER_NOTREG."</span>";
			  ?>
                  </span> </div>
              </div>
            </div>
            
            <!--[if !IE]>end row<![endif]--> 
            <!--[if !IE]>start row<![endif]-->
            
            <div class="row">
              <label><?php echo _USER_BW; ?></label>
              <div class="inputs">
                <div align="right"><span class="view_wrapper">
                  <input class='inputview' name='BW' readonly id="<?php echo $FID.'6'; ?>"  type='text' value="<?php if (empty($BW)) echo $empty; else echo $BW; ?>" onclick="NEditInline(this,'<?php echo $FID.'6'; ?>'); return false;" >
                  </span><span style="margin-right:-160px; float:right;"> مگا بیت</span></div>
              </div>
            </div>
            
            <!--[if !IE]>end row<![endif]--> 
            
            <!--[if !IE]>start row<![endif]-->
            
            <div class="row">
              <label><?php echo _USER_STATUS; ?>:</label>
              <div class="inputs">
                <div align="right"><span class="view_wrapper_boolen"> <span class="<?php if ($Status==0) echo 'pending'; else echo 'approved'; ?>" id="<?php echo $FID.'7'; ?>" onclick="BEditInline(this);">
                  <input type="hidden" value="<?php if ($Status==0) echo 0; else echo 1; ?>" name="Status"  />
                  <a>
                  <?php if ($Status==0) echo _USER_DISABLE; else echo _USER_ACTIVE; ?>
                  </a> </span> </span></div>
              </div>
            </div>
            
            <!--[if !IE]>end row<![endif]--> 
            
            <!--[if !IE]>start row<![endif]-->
            
            <div class="row">
              <label><?php echo _USER_ADDRESS; ?>:</label>
              <div class="inputs">
                <div align="right"><span class="view_wrapper">
                  <textarea class='areaview' name='Address' readonly id="F8"  onclick="TAreaEditInline('F8'); return false;" ><?php if (empty($Address)) echo $empty; else echo $Address; ?>
</textarea>
                  </span> </div>
              </div>
            </div>
            
            <!--[if !IE]>end row<![endif]--> 
            <!--[if !IE]>start row<![endif]-->
            
            <div class="row">
              <label><?php echo _USER_REG_ADDRESS; ?>:</label>
              <div class="inputs">
                <div align="right"><span class="view_wrapper">
                  <textarea class='areaview' name='LatAddress' readonly id="F18"  onclick="TAreaEditInline('F18'); return false;" ><?php if (empty($LatAddress)) echo $empty; else echo $LatAddress; ?>
</textarea>
                  </span> </div>
              </div>
            </div>
            
            <!--[if !IE]>end row<![endif]--> 
            
            <!--[if !IE]>start row<![endif]-->
            
            <div class="row">
              <label><?php echo _USER_DESCR; ?>:</label>
              <div class="inputs">
                <div align="right"><span class="view_wrapper">
                  <textarea class='areaview' name='Descrip' readonly id="F9" onclick="TAreaEditInline('F9'); return false;" ><?php if (empty($Descrip)) echo $empty; else echo $Descrip; ?>
</textarea>
                  </span> </div>
              </div>
            </div>
            
            <!--[if !IE]>end row<![endif]--> 
            
            <!--[if !IE]>start row<![endif]-->
            
            <div class="row" id="editbtn" style="display:none;">
              <div class="inputs"> <span class="button2 blue_button save_button"><span><span><span class="button_ico"></span><em><?php echo _USER_SAVE; ?></em></span></span>
                <input name="submit" type="submit" onclick="SaveForm('<?php echo $FID; ?>','<?php echo '../proc/UserEdit.php'; ?>'); return false;"/>
                </span> <span class="loading_button"></span> <span class="button2 blue_button renew_button"><span><span><span class="button_ico"></span><em><?php echo _USER_RESET; ?></em></span></span>
                <input name="submit" type="submit" onclick="loaduserprofile(<?php echo $UserID; ?>); return false;"/>
                </span> </div>
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
    <?php
 }
?>
  </div>
  <!--[if !IE]>end section<![endif]--> 
  
</div>
<!--[if !IE]>end info<![endif]-->

<div id="sidebar"> 
  
  <!--[if !IE]>start sidebar module<![endif]-->
  <div class="sidebar_module">
    <div class="title_wrapper">
      <h3><?php echo _SIDEBAR_ACTION_TITLE; ?></h3>
    </div>
    <div id="secondary_menu">
      <ul>
<!--<li><a href="javascript:OpenBySide(<?php //echo $UserID; ?>,'hardware/List.php','hardware/Grid.php','#tablehardware','Hardware');"><?php //echo _SIDEBAR_ACTION_HARDWARE; ?></a></li>  -->
<li><a href="../ip/add.php?UserID=<?php echo $UserID; ?>"><?php echo _SIDEBAR_ACTION_IP; ?></a></li>
<li><a href="javascript:OpenBySide(<?php echo $UserID; ?>,'a','a','a','Audit');AuditSearchSP('Z','User',<?php echo $UserID; ?>);"><?php echo _SIDEBAR_ACTION_AUDIT; ?></a></li>
<li><a href="javascript:PersonObject(<?php echo $UserID; ?>);"><?php echo _SIDEBAR_ACTION_LIR; ?></a></li>
<li><a href="javascript:DeleteUser(<?php echo $UserID; ?>);"><?php echo _SIDEBAR_ACTION_DELETE; ?></a></li>
      </ul>
    </div>
  </div>
  <!--[if !IE]>end sidebar module<![endif]--> 
  
  <!--[if !IE]>start sidebar module<![endif]-->
  <div class="sidebar_module">
<?php
$DB3=new Database;
$DB3->Connect();
$DB3->Select('IP','IPID',"UserID=".$UserID." and Object='User'");	
$IPNum=$DB3->Select_Rows;
$DB3->Disconnect();
$DB4=new Database;
$DB4->Connect();
$DB4->Select('Hardware','HWID',"UserID=".$UserID);	
$HWNum=$DB4->Select_Rows;
$DB4->Disconnect();
?>
    <div class="title_wrapper">
      <h3><?php echo _SIDEBAR_RESOURCE; ?></h3>
    </div>
    <div id="statistics">
      <dl>
        <dt><?php echo _SIDEBAR_IP; ?></dt>
        <dd><?php echo $IPNum; ?></dd>
      </dl>
      <dl>
        <dt><?php echo _SIDEBAR_HARDWARE; ?></dt>
        <dd><?php echo $HWNum; ?></dd>
      </dl>
    </div>
  </div>
</div>
<?php  include("../global/footer.php"); ?>