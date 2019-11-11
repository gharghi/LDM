<?php
require_once("../global/config.php");
require "../lang/".$lang.".php"; 
?>
<div class="forgetpassdiv" >
  <form action="javascript:ForgetPass2();" method="post" id="recover" >
    <h3><?php echo _FORGETPASS; ?></h3>
    <div class="row_pass1" >
      <div class="label_pass">
        <label><?php echo _USERNAME; ?>:</label>
      </div>
      <span class="input_pass">
      <input id="RecoverUser" class="text" type="text"  name="User"/>
      </span> </div>
    <br >
    <!--[if !IE]>start row<![endif]-->
    <div class="row">
      <div class="inputs small_inputs" style="cursor:pointer;" onclick="ForgetPass2();" > <span class="button2 blue_button unlock_button" ><span><span><em><?php echo _RECOVER; ?> <span class="button_ico"></span></em></span></span>
        <input name="recover" type="submit" onsubmit="ForgetPass2();"/>
        </span> </div>
    </div>    
    <!--[if !IE]>end row<![endif]-->    
  </form>
</div>