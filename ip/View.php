<?php
$id='P12';
$lv='1';
$FID='F12';
include "../global/db.php";
$IPID=stripslashes(mysql_real_escape_string($_POST['IPID']));
$query="select IP.Date as Date, Audit.AID as AID from IP Inner join Audit on IP.IPID=Audit.OID and Audit.Object='IP' and Audit.Action='Add' and IP.IPID=$IPID
";
$result=mysql_query($query);
$array=mysql_fetch_array($result);
?>
<div class="dialog_inner_view">
	<!--[if !IE]>start forms<![endif]-->
	<form method="post" class="search_form">
	<!--[if !IE]>start fieldset<![endif]-->
	<fieldset>
	<!--[if !IE]>start forms<![endif]-->
	<div class="forms">
		  <!--[if !IE]>start row<![endif]-->
      <div class="row">
        <label>سازنده:</label>
          <div align="right"><span class="input_wrapper">
            <?php echo fdigit(NameAdmin($array['AID']));?>
            </span> </div>
        </div>
  
      <!--[if !IE]>end row<![endif]--> 
        <!--[if !IE]>start row<![endif]-->
      <div class="row">
        <label>تاریخ ساخت:</label>
          <div align="right"><span class="input_wrapper">
            <?php echo fdigit($array['Date']);?>
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