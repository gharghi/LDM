<?php
$id='P14';
$lv='1';
$FID='F14';
include "../global/db.php";
?>
<ul class="system_messages">
  <li class="red" id="11"><span class="ico"></span><strong class="system_title">Hostname میبایست وارد شود!</strong></li>
  <li class="red" id="12"><span class="ico"></span><strong class="system_title">IP میبایست وارد شود!</strong></li>
  <li class="red" id="15"><span class="ico"></span><strong class="system_title">آدرس وارده پیشتر ثبت گردیده است!</strong></li>
  <li class="red" id="13"><span class="ico"></span><strong class="system_title">خطایی روی داده است!</strong></li>
  <li class="red" id="14"><span class="ico"></span><strong class="system_title">این نام پیشتر ثبت شده است!</strong></li>
  <li class="red" id="15"><span class="ico"></span><strong class="system_title">ابتدا پورتهای اختصاص یافته را آزاد نمایید!</strong></li>
  <li class="red" id="16"><span class="ico"></span><strong class="system_title">IP به درستی وارد نشده است</strong></li>
  <li class="red" id="17"><span class="ico"></span><strong class="system_title">IP پیشتر ثبت گردیده است</strong></li>
  <li class="green" id="11"><span class="ico"></span><strong class="system_title">سوئیج با موفقیت ثبت گردید.</strong></li>
  <li class="green" id="12"><span class="ico"></span><strong class="system_title">سوئیچ با موفقیت حذف گردید.</strong></li>
</ul>
<!--[if !IE]>start forms<![endif]-->
<form id="Switch" method="post" class="search_form general_form">
  <!--[if !IE]>start fieldset<![endif]-->
  <fieldset>
  <div class="addicon" onClick="OpenAddSwitch(this);">
<img src="css/layout/addobject.png"  title="افزودن مرکز تازه">
</div>
<div id="AddSwitch" style="display:none;">
    <!--[if !IE]>start forms<![endif]-->
    <div class="forms">
      <h3>افزودن سوئیچ</h3>
      <!--[if !IE]>start row<![endif]-->
      <div class="row">
        <label>Hostname:</label>
        <div class="inputs">
          <div align="right"><span class="input_wrapper">
            <input class="text" name="Hostname" type="text"  />
            </span> </div>
        </div>
      </div>
      <!--[if !IE]>end row<![endif]--> 
  
      
      <!--[if !IE]>start row<![endif]-->
      <div class="row" >
       <label>IP:</label>
        <div class="inputs" style="width:240px !important;">
          <div align="right" style="float:right;">
            <div class="IP">
            <ul>
              <li> <span class="input_wrapper small_input">
                <input class="text" name="Oct1" id="21" type="text" on onkeyup="validatePrefix(this);" />
                </span></li>
              <li>.</li>
              <li> <span class="input_wrapper small_input">
                <input class="text" name="Oct2" id="22" type="text" onkeyup="validatePrefix(this);" />
                </span></li>
              <li>.</li>
              <li> <span class="input_wrapper small_input">
                <input class="text" name="Oct3" id="23" type="text" onkeyup="validatePrefix(this);" />
                </span></li>
              <li>.</li>
              <li> <span class="input_wrapper small_input">
                <input class="text" name="Oct4" id="24" type="text" onkeyup="validatePrefix(this);" />
                </span></li>
              
              </div>
            </ul>
          </div>
        </div>
      </div>
      
      <!--[if !IE]>end row<![endif]--> 
      
      <!--[if !IE]>start row<![endif]-->
      <div class="row">
        <label>مک آدرس:</label>
        <div class="inputs">
          <div align="right"><span class="input_wrapper">
            <input class="text" name="MAC" type="text"  />
            </span> </div>
        </div>
      </div>
      <!--[if !IE]>end row<![endif]--> 
      <!--[if !IE]>start row<![endif]-->
      <div class="row">
        <label>مرکز:</label>
        <div class="inputs"> <span class="input_wrapper blank">
          <?php
$query1="select TWID,Name from Tower";
$result1=mysql_query($query1);
$num2=mysql_num_rows($result1);
echo "<select name='TWID'>";
	$i=0;
	while ($i < $num2) 
		{
	$TName=mysql_result($result1,$i,'Name');
	$TowerID=mysql_result($result1,$i,'TWID');
	$i++;
	echo "<option value='",$TowerID,"'>",$TName;
		}
echo "</select>";
?>
          </span> </div>
      </div>
      <!--[if !IE]>end row<![endif]--> 
       <!--[if !IE]>start row<![endif]-->
      <div class="row">
        <label>نوع:</label>
        <div class="inputs"> <span class="input_wrapper blank">
          <?php
$query1="select distinct Type from Type";
$result1=mysql_query($query1);
$num2=mysql_num_rows($result1);
echo "<select name='Type' onchange='TypeSelect2(this);'>";
echo "<option>";
	$i=0;
	while ($i < $num2) 
		{
	$Type=mysql_result($result1,$i,'Type');
	$i++;
	echo "<option value='",$Type,"' >",$Type;
		}
echo "</select>";
?>
          </span><span class="loading_select" id="Lselect1"></span> </div>
          
      </div>
      <!--[if !IE]>end row<![endif]--> 
       <!--[if !IE]>start row<![endif]-->
      <div class="row" style="display:none;" id="Select2">
       
      </div>
      <!--[if !IE]>end row<![endif]--> 
       <!--[if !IE]>start row<![endif]-->
      <div class="row" style="display:none;" id="Select3">
       
      </div>
      <!--[if !IE]>end row<![endif]-->
      
      <!--[if !IE]>start row<![endif]-->
      <div class="row">
        <label>نام کاربری:</label>
        <div class="inputs">
          <div align="right"><span class="input_wrapper">
            <input class="text" name="User" type="text"/>
            </span> </div>
        </div>
      </div>
      <!--[if !IE]>end row<![endif]--> 
      <!--[if !IE]>start row<![endif]-->
      <div class="row">
        <label>رمز عبور:</label>
        <div class="inputs">
          <div align="right"><span class="input_wrapper">
            <input class="text" name="Pass" type="text"/>
            </span> </div>
        </div>
      </div>
      <!--[if !IE]>end row<![endif]--> 
      <!--[if !IE]>start row<![endif]-->
      <div class="row">
        <label>کلید رمز:</label>
        <div class="inputs">
          <div align="right"><span class="input_wrapper">
            <input class="text" name="Secret" type="text"/>
            </span> </div>
        </div>
      </div>
      <!--[if !IE]>end row<![endif]--> 
      <!--[if !IE]>start row<![endif]-->
      <div class="row">
        <label>SNMP:</label>
        <div class="inputs">
          <div align="right"><span class="input_wrapper">
            <input class="text" name="SNMP" type="text"/>
            </span> </div>
        </div>
      </div>
      <!--[if !IE]>end row<![endif]--> 
 <!--[if !IE]>start row<![endif]-->
      <div class="row">
        <label>تعداد پورت:</label>
        <div class="inputs"> <span class="input_wrapper blank">
          <select name="PortCt">
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="8">8</option>
            <option value="12">12</option>
            <option value="16">16</option>
            <option value="24">24</option>
            <option value="26">26</option>
            <option value="28">28</option>
            <option value="36">36</option>
            <option value="48">48</option>
          </select>
          </span> </div>
      </div>
      <!--[if !IE]>end row<![endif]-->  
      
      <!--[if !IE]>start row<![endif]-->
      <div class="row">
        <div class="inputs"> <span class="button2 blue_button add_button"><span><span><span class="button_ico"></span><em>تایید</em></span></span>
          <input name="submit" type="submit" onclick="AddSwitch(this); return false;"/>
          </span> <span class="loading_button"> </span> </div>
      </div>
      <!--[if !IE]>end row<![endif]--> 
    </div>
    </div>
    <!--[if !IE]>end forms<![endif]-->
  </fieldset>
  <!--[if !IE]>end fieldset<![endif]-->
</form>
<!--[if !IE]>end forms<![endif]-->
</ul>
</div>
<div class="title_wrapper">
  <h2>سوئیچ ها</h2>
  </div>
<!--[if !IE]>start section inner<![endif]-->
<div class="section_inner" id="tableswitch"> 
  
  <!--[if !IE]>start table_wrapper<![endif]-->
  <div class="table_wrapper">
    <?php
	$result=mysql_query("select * from Switch order by SWID");
$num=mysql_num_rows($result);
$i=0;
echo "<div class='table_wrapper_inner'>
							<table cellpadding='0' cellspacing='0' width='100%' id='aaa'>
								<thead><tr>
									<th  style='width:18px;'>#</th>
									<th><a href=' '>Hostname</a></th>
									<th><a href=' '>IP Address</a></th>
									<th><a href=' '>مدل</a></th>
									<th><a href=' '>مرکز</a></th>
									<th><a href=' '>تعداد پورت</a></th>
									<th style='width: 12px;'>دستورها</th>
								</tr>
								</thead>";
while ($i < $num) {
	$SWID=mysql_result($result,$i,'SWID');
	$Hostname=mysql_result($result,$i,'Hostname');
	$result4=mysql_query("select * from IP where Object='Switch' and UserID=$SWID");
	$array4=mysql_fetch_array($result4);
	$IP=$array4['Oct1'].".".$array4['Oct2'].".".$array4['Oct3'].".".$array4['Oct4'];
	$Model=mysql_result($result,$i,'Model');
	$Model=mysql_result(mysql_query("select Model from Type where TID=$Model"),'Model');
	$TWID=mysql_result($result,$i,'TWID');
	$Tower=mysql_result(mysql_query("select Name from Tower where TWID=$TWID"),'Name');
	if (empty($Tower)) $Tower="شناسه:$TWID";
	$PortCt=mysql_result($result,$i,'PortCt');
	$j=$i+1;
	echo "<tbody><tr class='first' id='$SWID'>
	  <td>".fdigit($j)."</td>
	  <td>$Hostname</td>
	  <td>$IP</td>
	  <td>$Model</td>
	  <td>$Tower</td>
	  <td>".fdigit($PortCt)." عدد</td>
	  <td>
		  <div  class='actions' style='width:48px !important;'>
			  <ul>
			  <li><a class='Accopen' id='$SWID' href='javascript:ViewSwitch($SWID);' title='مشاهده'></a></li>
			  <li><a class='Accdelete' id='$SWID' href='javascript:DelSwitch($SWID);' title='پاک کردن' ></a></li>
				  
			  </ul>
		  </div>
	  </td>
  </tr>";
	$i++;
	}	
?>
    </tbody>
    </table>
  </div>
  <!--[if !IE]>end table_wrapper<![endif]--> 
</div>
<!--[if !IE]>end section inner<![endif]-->
</div>
