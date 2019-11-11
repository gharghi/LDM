<?php
$id='P19';
$lv='1';
$FID='F19';
include "../global/db.php";
?>
  <ul class="system_messages">
    
  </ul>
<div id="ViewPorts">
<!--[if !IE]>start forms<![endif]-->
<form id="Hardware" method="post" class="search_form general_form">
  <!--[if !IE]>start fieldset<![endif]-->
  <fieldset>
  
    <!--[if !IE]>start forms<![endif]-->
    <div class="forms">
      <h3>افزودن سخت افزار</h3>
      
<div class="row">
  <label>سوئیج:</label>
        <div class="inputs"> <span class="input_wrapper blank">
          <?php
$query1="select SWID,Hostname from Switch order by Hostname";
$result1=mysql_query($query1);
$num=mysql_num_rows($result1);
echo "<select name='SWID' onchange='FillPort(this);'>";
echo "<option>انتخاب کنید</option>";
	$i=0;
	while ($i < $num) 
		{
	$SName=mysql_result($result1,$i,'Hostname');
	$SWID=mysql_result($result1,$i,'SWID');
	$i++;
	echo "<option value='",$SWID,"'>",$SName,"</option>";
		}
echo "</select>";
?>
          </span><span class="loading_select" id="Lselect1"></span> </div>
</div>
<!--[if !IE]>end forms<![endif]-->
  </fieldset>
  <!--[if !IE]>end fieldset<![endif]-->
</form>
<!--[if !IE]>end forms<![endif]-->
 
  <!--[if !IE]>start section inner<![endif]-->
  <div class="section_inner" id="PortF"> 
</div>
<!--[if !IE]>end section inner<![endif]-->
</div>
