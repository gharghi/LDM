<?php
$id='P13';
$lv='1';
$FID='F13';
include "../global/db.php";
?>
<div class="title_wrapper">
  <h2> </h2>
</div>
<!--[if !IE]>start section inner <![endif]-->
<div class="section_inner">
<!--[if !IE]>start product list tabs<![endif]-->
	<ul id="product_list_tabs">
		<li><a href="javascript:ChangeTab('Tab1');" id="Tab1" class="tselected" ><span><span>اطلاعات پایه</span></span></a></li>
		<li><a href="javascript:ChangeTab('Tab2');" id="Tab2"><span><span>محل سخت افزار</span></span></a></li>
<?php 
if ($a['P21']>=1)
{ 
echo '
		<li><a href="javascript:ChangeTab(\'Tab3\');" id="Tab3"><span><span>اطلاعات کاربری</span></span></a></li>
';
}
?>
        <li><a href="javascript:ChangeTab('Tab4');" id="Tab4"><span><span>موارد مشاهده</span></span></a></li>
	</ul>
<!--[if !IE]>end product list tabs<![endif]-->
<form  id="hardwaresearch" method="post" class="search_form general_form" action="../hardware - Copy/hardware/SearchProc.php">
<fieldset>
<div id="Tab1" class="Tab Tab_Show">
 <!--[if !IE]>start row<![endif]-->
  <div class="row">
    <label>Hostname:</label>
    <div class="inputs">
      <div align="right"> <span class="input_wrapper blank search ">
        <select name="HostnameEqual">
          <option value="=">برابر</option>
          <option value="in">شامل</option>
          <option value="st">شروع</option>
          <option value="en">پایان</option>
        </select>
        </span> <span class="input_wrapper">
        <input class="text" name="Hostname" type="text" />
        </span> </div>
    </div>
  </div>
  
  <!--[if !IE]>end row<![endif]--> 
  
  <!--[if !IE]>start row<![endif]-->
  
  <div class="row">
    <label>IP:</label>
    <div class="inputs">
      <div align="right"> <span class="input_wrapper blank search ">
        <select name="IPEqual">
          <option value="=">برابر</option>
          <option value="in">شامل</option>
          <option value="st">شروع</option>
          <option value="en">پایان</option>
        </select>
        </span> <span class="input_wrapper">
        <input class="text" name="IP" type="text" />
        </span> </div>
    </div>
  </div>
  
  <!--[if !IE]>end row<![endif]--> 
  
  <!--[if !IE]>start row<![endif]-->
  
  <div class="row">
    <label>مک آدرس:</label>
    <div class="inputs">
      <div align="right"> <span class="input_wrapper blank search ">
        <select name="MACEqual">
          <option value="=">برابر</option>
          <option value="in">شامل</option>
          <option value="st">شروع</option>
          <option value="en">پایان</option>
        </select>
        </span> <span class="input_wrapper">
        <input class="text" name="MAC" type="text" />
        </span> </div>
    </div>
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
echo "<select name='Type'>";
echo "<option value=''>تمامی سخت افزارها</option>";
	$i=0;
	while ($i < $num2) 
		{
	$Type=mysql_result($result1,$i,'Type');
	$i++;
	echo "<option value='",$Type,"' >",$Type;
		}
echo "</select>";
?>
          </span></div>
          
      </div>
      <!--[if !IE]>end row<![endif]--> 
       <!--[if !IE]>start row<![endif]-->
      <div class="row">
        <label>برند:</label>
        <div class="inputs"> <span class="input_wrapper blank">
          <?php
$query1="select distinct Brand from Type";
$result1=mysql_query($query1);
$num2=mysql_num_rows($result1);
echo "<select name='Brand'>";
echo "<option value=''>تمامی برند ها</option>";
	$i=0;
	while ($i < $num2) 
		{
	$Brand=mysql_result($result1,$i,'Brand');
	$i++;
	echo "<option value='",$Brand,"' >",$Brand;
		}
echo "</select>";
?>
          </span></div>
          
      </div>
      <!--[if !IE]>end row<![endif]--> 
       <!--[if !IE]>start row<![endif]-->
      <div class="row">
        <label>مدل:</label>
        <div class="inputs"> <span class="input_wrapper blank">
          <?php
$query1="select distinct Model from Type";
$result1=mysql_query($query1);
$num2=mysql_num_rows($result1);
echo "<select name='Model'>";
echo "<option value=''>تمامی مدلها</option>";
	$i=0;
	while ($i < $num2) 
		{
	$Model=mysql_result($result1,$i,'Model');
	$i++;
	echo "<option value='",$Model,"' >",$Model;
		}
echo "</select>";
?>
          </span></div>
          
      </div>
      <!--[if !IE]>end row<![endif]--> 
</div>
<div id="Tab2" class="Tab_Hide Tab">
 
      <!--[if !IE]>start row<![endif]-->
      <div class="row">
        <label>مرکز:</label>
        <div class="inputs"> <span class="input_wrapper blank">
          <?php
$query1="select TWID,Name from Tower";
$result1=mysql_query($query1);
$num2=mysql_num_rows($result1);
echo "<select name='TWID' > <option value=''>تمامی مراکز</option>";
	$i=0;
	while ($i < $num2) 
		{
	$TName=mysql_result($result1,$i,'Name');
	$TowerID=mysql_result($result1,$i,'TWID');
	$i++;
	echo "<option value='",$TowerID,"'>",$TName,"</option>";
		}
echo "</select>";
?>
          </span></div>
      </div>
      <!--[if !IE]>end row<![endif]--> 
      <!--[if !IE]>start row<![endif]-->
      <div class="row">
        <label>سوئیچ:</label>
        <div class="inputs"> <span class="input_wrapper blank">
          <?php
$query1="select SWID,Hostname from Switch";
$result1=mysql_query($query1);
$num2=mysql_num_rows($result1);
echo "<select name='SWID'> <option value=''>تمامی سوئیج ها</option>";
	$i=0;
	while ($i < $num2) 
		{
	$Hostname=mysql_result($result1,$i,'Hostname');
	$SWID=mysql_result($result1,$i,'SWID');
	$i++;
	echo "<option value='",$SWID,"'>",$Hostname,"</option>";
		}
echo "</select>";
?>
          </span><span class="loading_select" id="Lselect3"></span> </div>
      </div>
      <!--[if !IE]>end row<![endif]--> 
  <!--[if !IE]>start row<![endif]-->
  <div class="row">
    <label>شماره پورت:</label>
    <div class="inputs">
      <div align="right"> <span class="input_wrapper blank">
        <select name="Port">
        <option value=''>انتخاب کنید</option>
        <?php 
		for ($i=1;$i<49;$i++) {
          echo "<option value=$i>",fdigit($i),"</option>";
          }
          ?>
        </select>
        </span></div>
    </div>
  </div>
  <!--[if !IE]>end row<![endif]--> 
  <!--[if !IE]>start row<![endif]-->
  
  <div class="row">
    <label>VLAN:</label>
    <div class="inputs">
      <div align="right"> <span class="input_wrapper">
        <input class="text" name="VLAN" type="text" />
        </span> </div>
    </div>
  </div>
  
  <!--[if !IE]>end row<![endif]--> 
  
</div>
<?php 
if ($a['P21']>=1)
{ 
echo "
<div id='Tab3' class='Tab_Hide Tab'>
 
  <!--[if !IE]>start row<![endif]-->
  
  <div class='row'>
    <label>نام کاربری:</label>
    <div class='inputs'>
      <div align='right'> <span class='input_wrapper blank search '>
        <select name='UsernameEqual'>
         <option value='='>برابر</option>
          <option value='in'>شامل</option>
          <option value='st'>شروع</option>
          <option value='en'>پایان</option>
        </select>
        </span> <span class='input_wrapper'>
        <input class='text' name='Username' type='text'/>
        </span> </div>
    </div>
  </div>
  
  <!--[if !IE]>end row<![endif]--> 
  <!--[if !IE]>start row<![endif]-->
  <div class='row'>
    <label>رمز عبور:</label>
    <div class='inputs'>
      <div align='right'> <span class='input_wrapper blank search '>
        <select name='PasswordEqual'>
          <option value='='>برابر</option>
          <option value='in'>شامل</option>
          <option value='st'>شروع</option>
          <option value='en'>پایان</option>
        </select>
        </span> <span class='input_wrapper'>
        <input class='text' name='Password' type='text'/>
        </span> </div>
    </div>
  </div>
  <!--[if !IE]>end row<![endif]--> 
  <!--[if !IE]>start row<![endif]-->
  <div class='row'>
    <label>کلید رمز:</label>
    <div class='inputs'>
      <div align='right'> <span class='input_wrapper blank search '>
        <select name='SecretEqual'>
          <option value='='>برابر</option>
          <option value='in'>شامل</option>
          <option value='st'>شروع</option>
          <option value='en'>پایان</option>
        </select>
        </span> <span class='input_wrapper'>
        <input class='text' name='Secret' type='text'/>
        </span> </div>
    </div>
  </div>
  <!--[if !IE]>end row<![endif]--> 
    <!--[if !IE]>start row<![endif]-->
  <div class='row'>
    <label>SNMP:</label>
    <div class='inputs'>
      <div align='right'> <span class='input_wrapper blank search '>
        <select name='SNMPEqual'>
          <option value='='>برابر</option>
          <option value='in'>شامل</option>
          <option value='st'>شروع</option>
          <option value='en'>پایان</option>
        </select>
        </span> <span class='input_wrapper'>
        <input class='text' name='SNMP' type='text'/>
        </span> </div>
    </div>
  </div>
  
  <!--[if !IE]>end row<![endif]--> 
</div>
";
}
?>
<div id="Tab4" class="Tab_Hide Tab">
<!--[if !IE]>start row<![endif]-->
		<div class="row" >
                                           <span class="checkbox_tab"> <input class="checkbox" name="DHostname" value="1" type="checkbox" checked="checked" /> نام سخت افزار </span>
											<span class="checkbox_tab"><input  class="checkbox" name="DIP" value="1" type="checkbox" checked="checked"/> آدرس IP</span>
											<span class="checkbox_tab"><input  class="checkbox" name="DMAC" value="1" type="checkbox"/> مک آدرس</span>
                                          <span class="checkbox_tab"> <input  class="checkbox" name="DTWID" value="1" type="checkbox" checked="checked"/> مرکز</span>
											<span class="checkbox_tab"><input  class="checkbox" name="DSWID" value="1" type="checkbox"/> سوئیچ</span>
										<span class="checkbox_tab">	<input  class="checkbox" name="DPort" value="1" type="checkbox"/> شماره پورت</span>                
				</span>
         
		</div>
		<!--[if !IE]>end row<![endif]-->
        
        
        <!--[if !IE]>start row<![endif]-->
		<div class="row" >
			<div class="inputs">
				<div align="right">
        
        
         									  <span class="checkbox_tab"><input class="checkbox" name="DVLAN" value="1" type="checkbox" /> VLAN</span>
											<span class="checkbox_tab"><input  class="checkbox" name="DType" value="1" type="checkbox"/> نوع</span>
											<span class="checkbox_tab"><input class="checkbox" name="DBrand" value="1" type="checkbox"/> برند</span>
											<span class="checkbox_tab"><input  class="checkbox" name="DModel" value="1" type="checkbox" checked="checked"/> مدل</span>
                                          
                                          		</span>
               
                </div>
            </div>
		</div>
		<!--[if !IE]>end row<![endif]-->
                                          
                                          
                                          
                     <!--[if !IE]>start row<![endif]-->
		<div class="row" > 
			<div class="inputs">
				<div align="right">                     
                                          
                                          
   <?php 
if ($a['P21']>=1)
{                                        
                                          
echo "
   <span class='checkbox_tab'><input class='checkbox' name='DUsername' value='1' type='checkbox' /> نام کاربری</span>
 <span class='checkbox_tab'><input  class='checkbox' name='DPassword' value='1' type='checkbox'/> رمز عبور</span>
 <span class='checkbox_tab'><input class='checkbox' name='DSecret' value='1' type='checkbox'/> کلید رمز</span>
 <span class='checkbox_tab'><input  class='checkbox' name='DSNMP' value='1' type='checkbox'/> SNMP</span>";
}
?>
 <span class="checkbox_tab"><input  class="checkbox" name="DSNMP" value="1" type="checkbox" checked="checked"/> دستورها</span>
        		</span>
               
                </div>
            </div>
		</div>
		<!--[if !IE]>end row<![endif]-->
        
</div>
 <div class="row">
<hr />
</div>
       <!--[if !IE]>start row<![endif]-->
  <div class="row">
    <label style="width:50px !important;">مرتب با:</label>
      <span class="input_wrapper blank search2 space_search ">
        <select name="Order">
        <option value="Hardware.HWID">شناسه</option>
          <option value="Hardware.Hostname">نام</option>
          <option value="Hardware.IP">IP</option>
          <option value="Hardware.TWID">مرکز</option>
          <option value="Hardware.SWID">سوئیچ</option>
          <option value="Hardware.VLAN">VLAN</option>
          <option value="Type.Model">مدل</option>
        </select>
        </span>
       
 
        <span class="space_search ">
          <input name="DESC" value="1" type="checkbox"  />
  </span>
   
  <label style="width:50px !important;">نزولی</label>
     
<span class="input_wrapper blank search space_search ">
        <select name="Limit">
          <option value="10"><?php echo  fdigit('10'); ?></option>
          <option value="20"><?php echo fdigit('20'); ?></option>
          <option value="50"><?php echo fdigit('50'); ?></option>
          <option value="100"><?php echo fdigit('100'); ?></option>
          <option value="500"><?php echo fdigit('500'); ?></option>
          <option value="1000"><?php echo fdigit('1000'); ?></option>
        </select>
        </span> 
        <label>خط در صفحه</label>
                <label style="width:40px;">مشاهده:</label>
        <span class="input_wrapper blank search2 space_search ">
        <select name="Output" id="Output" onchange="ChangeOutput(this)">
          <option value="Web">Web</option>
          <option value="PDF">PDF</option>
          <option value="Excel">Excel</option>
        </select>
        </span> 
        
        
        </div>
  <!--[if !IE]>end row<![endif]--> 
 
  
 
  <!--[if !IE]>start row<![endif]-->
  <div class="row"  >
    <div class="inputs"> <span class="button2 blue_button search_button"><span><span><em><span class="button_ico"></span>جستجو</em></span></span>
      <input id="www" name="submit" type="submit"  onclick="HardwareSearch(this); return false;"/>
      </span> <span class="Ad_loading_button"></span></div>
  </div>
  <!--[if !IE]>end row<![endif]-->
  </div>
  </div>
  <!--[if !IE]>end forms<![endif]-->
  </fieldset>
  <!--[if !IE]>end fieldset<![endif]-->
</form>
<!--[if !IE]>end forms<![endif]-->
<!--[if !IE]>start section inner<![endif]-->
<div class="section_inner" id="TableUser" >  
						
						
</div>
<!--[if !IE]>end pagination<![endif]--> 
<!--[if !IE]>end section inner<![endif]-->
