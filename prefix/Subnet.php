<?php
$id='P18';
$lv='2';
$FID='F18';
include "../global/db.php";
$PID=stripslashes(mysql_real_escape_string($_POST['PID']));
$query = "select * from Prefix where PID=$PID";
$result=mysql_query($query);
$array=mysql_fetch_array($result);
extract($array);
?>
	<!--[if !IE]>start forms<![endif]-->
	<form id="EditSubnet" method="post" class="search_form general_form">
	<!--[if !IE]>start fieldset<![endif]-->
    <input type="hidden" name="PID" value="<?php echo $PID; ?>" />
	<fieldset>
	<!--[if !IE]>start forms<![endif]-->
	<div class="forms">
		<h3>سابنت های قابل ارایه</h3>
		<!--[if !IE]>start row<![endif]-->
		<div class="row" >
			<label><?php echo $Oct1,".",$Oct2,".",$Oct3,".",$Oct4,"/",$CIDR; ?></label>
			<div class="inputs">
				<div align="right"><span class="input_wrapper_checkbox">
									<ul class="inline">
											<li><input  class="checkbox" name="S24" value="1" type="checkbox"  <?php  if ($S24==1) echo "checked"; ?>/> 24/
											&nbsp;&nbsp;<br><input  class="checkbox" name="S25" value="1" type="checkbox"  <?php  if ($S25==1) echo "checked"; ?>/> 25/
											&nbsp;&nbsp;<br><input  class="checkbox" name="S26" value="1" type="checkbox"  <?php  if ($S26==1) echo "checked"; ?>/> 26/
                                            &nbsp;&nbsp;<br><input  class="checkbox" name="S27" value="1" type="checkbox"  <?php  if ($S27==1) echo "checked"; ?>/> 27/
                                            &nbsp;&nbsp;
                                            <br>
                                            <input  class="checkbox" name="S28" value="1" type="checkbox"  <?php  if ($S28==1) echo "checked";; ?>/> /28
                                            &nbsp;&nbsp;<br><input  class="checkbox" name="S29" value="1" type="checkbox"  <?php  if ($S29==1) echo "checked"; ?>/> 29/
											&nbsp;&nbsp;<br><input  class="checkbox" name="S30" value="1" type="checkbox"  <?php  if ($S30==1) echo "checked"; ?>/> 30/
                                            &nbsp;&nbsp;<br><input  class="checkbox" name="S32" value="1" type="checkbox"  <?php  if ($S32==1) echo "checked"; ?>/> 32/</li>
										</ul>
				</span>
               
                </div>
            </div>
		</div>
		<!--[if !IE]>end row<![endif]-->
		<!--[if !IE]>start row<![endif]-->
		<div class="row">
			<div class="inputs">
			<span class="button2 blue_button ok_button"><span><span><span class="button_ico"></span><em>تایید</em></span></span><input name="submit" type="submit" onclick="EditPrefix(''); return false;"/></span>
		
			<span class="button2 blue_button cancel_button"><span><span><span class="button_ico"></span><em>بازگشت</em></span></span><input name="submit" type="submit" onclick="loadpage('prefix/List.php'); return false;"/></span>
			</div>
		</div>
		<!--[if !IE]>end row<![endif]-->
	</div>
	<!--[if !IE]>end forms<![endif]-->
	</fieldset>
	<!--[if !IE]>end fieldset<![endif]-->
	</form>
	<!--[if !IE]>end forms<![endif]-->
