<?php
$id='P13';
$lv='1';
$Faction='hardware/Edit.php';
$FID='F13';
include "../global/db.php";
$HWID=stripslashes(mysql_real_escape_string($_POST['HWID']));
$array=mysql_fetch_array(mysql_query("select * from Hardware where HWID=$HWID"));
$result4=mysql_query("select * from IP where Object='Hardware' and UserID=$HWID");
$array4=mysql_fetch_array($result4);
$IP2=$array4['Oct1'].".".$array4['Oct2'].".".$array4['Oct3'].".".$array4['Oct4']; 
extract($array);
$empty='-----';
?>
<!--[if !IE]>start section inner <![endif]-->
<div class="section_inner">
  <ul class="system_messages">
    <li class="red" id="1"><span class="ico"></span><strong class="system_title">وارد کردن Hostname الزامی است!</strong></li>
    <li class="red" id="2"><span class="ico"></span><strong class="system_title">خطا در وارد کردن IP رخ داده است!</strong></li>
    <li class="red" id="3"><span class="ico"></span><strong class="system_title">این نام پیش تر انتخاب شده است!</strong></li>
    <li class="red" id="4"><span class="ico"></span><strong class="system_title">این IP پیش تر انتخاب شده است!</strong></li>
    <li class="red" id="5"><span class="ico"></span><strong class="system_title">خطا در پر کردن فرم رخ داده است!</strong></li>
    <li class="red" id="6"><span class="ico"></span><strong class="system_title">مدل به درستی انتخاب نشده است!</strong></li>
    <li class="red" id="7"><span class="ico"></span><strong class="system_title">تعداد پورت مشخص نگردیده است!</strong></li>
    <li class="green" id="1gren"><span class="ico"></span><strong class="system_title">سخت افزار با موفقیت ویرایش گردید.</strong></li>
  </ul>
  
  <!--[if !IE]>start forms<![endif]-->
  <form id="<?php echo $FID; ?>" method="post" class="search_form general_form">
    <!--[if !IE]>start fieldset<![endif]-->
    <fieldset>
      <input type="hidden" name="HWID" value="<?php echo $HWID; ?>"  />
      <!--[if !IE]>start forms<![endif]-->
      <div class="forms">
        <h3>سخت افزار</h3>
        <!--[if !IE]>start row<![endif]-->
        <div class="row">
          <label>شناسه :</label>
          <div class="inputs">
            <div align="right"><span class="view_wrapper" id="ID"> <?php echo fdigit($HWID); ?> </span> </div>
          </div>
        </div>
        <!--[if !IE]>end row<![endif]--> 
 
        <!--[if !IE]>start row<![endif]-->
      <div class="row">
        <label>Hostname:</label>
        <div class="inputs">
          <div align="right"><span class="view_wrapper">
            <input class="inputview" id="<?php echo $FID.'1'; ?>" name="Hostname" type="text" readonly="readonly" value="<?php echo $Hostname; ?>" onclick="EditInline(this,'<?php echo $FID.'1'; ?>'); return false;"/>
            
            </span> 
            <span id="<?php echo $FID.'1'; ?>" class="system positive" >&nbsp;</span> 
               <span id="<?php echo $FID.'1'; ?>" class="system negative"  >نام وارد شده تکراری است</span> 
               <span id="<?php echo $FID.'1E'; ?>" class="system negative"  >این فیلد نمیتواند خالی باشد</span> </div>
            </div>
        </div>
      </div>
      <!--[if !IE]>end row<![endif]--> 
      <!--[if !IE]>start row<![endif]-->
  
  <div class="row" style="display:none;" id="IPEdit">
   <label>IP:</label>
   <div class="inputs" style="width:240px !important;">
    <div align="right" style="float:right;">
     <div class="IP">
     <ul>
      <li> <span class="input_wrapper small_input">
       <input class="text EditIP" name="Oct1" id="21" type="text" value="<?php echo $array4['Oct1'];?>" on onkeyup="validatePrefix(this);" />
       </span></li>
      <li>.</li>
      <li> <span class="input_wrapper small_input">
       <input class="text EditIP" name="Oct2" id="22" type="text" value="<?php echo $array4['Oct2'];?>" onkeyup="validatePrefix(this);" />
       </span></li>
      <li>.</li>
      <li> <span class="input_wrapper small_input">
       <input class="text EditIP" name="Oct3" id="23" type="text" value="<?php echo $array4['Oct3'];?>" onkeyup="validatePrefix(this);" />
       </span></li>
      <li>.</li>
      <li> <span class="input_wrapper small_input">
       <input class="text EditIP" name="Oct4" id="24" type="text" value="<?php echo $array4['Oct4'];?>" onkeyup="validatePrefix(this);" />
       </span></li>
     
      </div>
     </ul>  </div>
       <span id="IPOK" class="system positive" >&nbsp;</span>
       <span id="IPNOK" class="system negative" >&nbsp;</span>
  
   </div>
  </div>
  
  <!--[if !IE]>end row<![endif]--> 
  
  <!--[if !IE]>start row<![endif]-->
  <div class="row" id="IPView">
   <label>IP:</label>
   <div class="inputs">
    <div align="right"><span class="view_wrapper" onclick="EditIP();">
    <?php echo $IP2;?>
     </span> 
      </div>
   </div>
  </div>
  
  <!--[if !IE]>end row<![endif]--> 
      <!--[if !IE]>start row<![endif]-->
      <div class="row">
        <label>مک آدرس:</label>
        <div class="inputs">
          <div align="right"><span class="view_wrapper">
            <input class="inputview" id="<?php echo $FID.'6'; ?>" name="MAC" type="text" readonly="readonly" value="<?php if (empty($MAC)) echo $empty; else echo $MAC; ?>" onclick="NEditInline(this,'<?php echo $FID.'6'; ?>'); return false;"/>
            
            </span> 
            <span id="<?php echo $FID.'6'; ?>" class="system positive" >&nbsp;</span> 
               <span id="<?php echo $FID.'6'; ?>" class="system negative"  >نام وارد شده تکراری است</span> 
               <span id="<?php echo $FID.'6E'; ?>" class="system negative"  >این فیلد نمیتواند خالی باشد</span> </div>
        </div>
      </div>
      <!--[if !IE]>end row<![endif]--> 
      <?php $array4=mysql_fetch_array(mysql_query("select Name from Tower where TWID=$TWID")); ?>
      <!--[if !IE]>start row<![endif]-->
      <div class="row">
        <label>مرکز:</label>
        
        <div class="inputs vie" id="<?php echo $FID.'3'; ?>" onclick="SEditInline(this);"><div align="right"><span class="view_wrapper">
        <?php echo $array4['Name']; ?>
        </span>
        </div>
      </div>
        
        
        <div class="inputs sel" id="<?php echo $FID.'3'; ?>" style="display:none;"> <span class="input_wrapper blank">
			<?php
            echo "<select name='TWID'>";
			echo "<option value='",$TWID,"'>",$array4['Name'];
			$query1="select TWID,Name from Tower";
            $result1=mysql_query($query1);
            $num2=mysql_num_rows($result1);
                $i=0;
                while ($i < $num2) 
                    {
                $TName=mysql_result($result1,$i,'Name');
                $TowerID=mysql_result($result1,$i,'TWID');
                $i++;
                echo "<option value='",$TowerID,"'>",$TName,'</option>';
                    }
            echo "</select>";
            ?>
          </span> </div>
      </div>
      <!--[if !IE]>end row<![endif]--> 
      
      
      
      
      
       <?php $array5=mysql_fetch_array(mysql_query("select Hostname from Switch where SWID=$SWID")); ?>
      <!--[if !IE]>start row<![endif]-->
      <div class="row">
        <label>سوئیچ:</label>
        
        <div class="inputs vie" id="<?php echo $FID.'4'; ?>" onclick="SEditInline(this);"><div align="right"><span class="view_wrapper">
        <?php echo $array5['Hostname']; ?>
        </span>
        </div>
      </div>
        
        
        <div class="inputs sel" id="<?php echo $FID.'4'; ?>" style="display:none;"> <span class="input_wrapper blank">
			<?php
            echo "<select name='SWID' onchange='ChangePort(this);'>";
			echo "<option value='",$SWID,"'>",$array5['Hostname'];
			$query1="select SWID,Hostname from Switch";
            $result1=mysql_query($query1);
            $num2=mysql_num_rows($result1);
                $i=0;
                while ($i < $num2) 
                    {
                $SHostname=mysql_result($result1,$i,'Hostname');
                $SSWID=mysql_result($result1,$i,'SWID');
                $i++;
                echo "<option value='",$SSWID,"'>",$SHostname,'</option>';
                    }
            echo "</select>";
            ?>
          </span> </div>
      </div>
      <!--[if !IE]>end row<![endif]--> 
      
      
      
       <?php $array7=mysql_fetch_array(mysql_query("select PNum from Port where PortID=$Port")); ?>
      <!--[if !IE]>start row<![endif]-->
      <div class="row">
        <label>پورت:</label>
        
        <div class="inputs vie" id="PortEditBtn" onclick="SEditInline(this);"><div align="right"><span class="view_wrapper">
        <?php echo $array7['PNum']; ?>
        </span>
        </div>
      </div>
        
        
        <div class="inputs sel" id="PortEditBtn" style="display:none;"> <span class="input_wrapper blank">
			<?php
            echo "<select name='Port'>";
			echo "<option value='",$Port,"'>",$array7['PNum'];
			$query1="select PNum,PortID from Port where SWID=$SWID and Active=0 ";
            $result1=mysql_query($query1);
            $num2=mysql_num_rows($result1);
                $i=0;
                while ($i < $num2) 
                    {
                $PortID=mysql_result($result1,$i,'PortID');
                $PNum=mysql_result($result1,$i,'PNum');
                $i++;
                echo "<option value='",$PortID,"'>",$PNum,'</option>';
                    }
            echo "</select>";
            ?>
          </span> </div>
      </div>
      <!--[if !IE]>end row<![endif]-->
           <!--[if !IE]>start row<![endif]-->
      <div class="row">
        <label>VLAN:</label>
        <div class="inputs">
          <div align="right"><span class="view_wrapper">
            <input class="inputview" id="<?php echo $FID.'22'; ?>" name="VLAN" type="text" readonly="readonly" value="<?php if (empty($VLAN)) echo 0; else echo $VLAN; ?>" onclick="NEditInline(this,'<?php echo $FID.'22'; ?>'); return false;"/>
            
            </span> 
             </div>
        </div>
      </div>
      <!--[if !IE]>end row<![endif]--> 
      
      
      <div id="empty" style="display:none;">
      <input type="hidden" name="Model" value="<?php echo $Model; ?>" />
      </div>
      
      <!--[if !IE]>start row<![endif]-->
      <div class="row" id="TypeEditBefore">
        <label>مدل:</label>
        
        <div class="inputs vie" id="<?php echo $FID.'5'; ?>" onclick="TypeEdit(this);"><div align="right"><span class="view_wrapper">
        <?php
		$array6=mysql_fetch_array(mysql_query("select Model from Type where TID=$Model"));
		 if (!empty($array6['Model']))echo $array6['Model']; else echo "شناسه:",fdigit($Model);?>
        </span>
        </div>
      </div>
      </div>
      <!--[if !IE]>end row<![endif]--> 
      
      
      
      
      
       <!--[if !IE]>start row<![endif]-->
      <div class="row" style="display:none;" id="TypeEdit">
        <label>نوع:</label>
        <div class="inputs"> <span class="input_wrapper blank">
          <?php
$query1="select distinct Type from Type";
$result1=mysql_query($query1);
$num2=mysql_num_rows($result1);
echo "<select name='Type' onchange='TypeSelect2(this);'>";
echo "<option>انتخاب کنید</option>";
	$i=0;
	while ($i < $num2) 
		{
	$Type=mysql_result($result1,$i,'Type');
	$i++;
	echo "<option value='",$Type,"' >",$Type,"</option>";
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
      
      
 <!------If Has see password permission------>     
<?php 
if ($a['P21']>=1)
{      
 echo "     
      <!--[if !IE]>start row<![endif]-->
      <div class='row'>
        <label>نام کاربری:</label>
        <div class='inputs'>
          <div align='right'><span class='view_wrapper'>
            <input class='inputview' id='".$FID."9' name='Username' type='text' readonly='readonly' value='"; if (empty($Username)) echo $empty; else echo $Username; echo "' onclick='NEditInline(this,\"$FID.9\"); return false;'/>
            
            </span> 
           </div>
        </div>
      </div>
      <!--[if !IE]>end row<![endif]--> 
      <!--[if !IE]>start row<![endif]-->
      <div class='row'>
        <label>رمز عبور:</label>
        <div class='inputs'>
          <div align='right'><span class='view_wrapper'>
            <input class='inputview' id='".$FID."10' name='Password' type='text' readonly='readonly' value='"; if (empty($Password)) echo $empty; else echo $Password; echo "' onclick='NEditInline(this,\"$FID.10\"); return false;'/>
            
            </span> 
              </div>
        </div>
      </div>
      <!--[if !IE]>end row<![endif]--> 
      <!--[if !IE]>start row<![endif]-->
      <div class='row'>
        <label>کلید رمز:</label>
        <div class='inputs'>
          <div align='right'><span class='view_wrapper'>
            <input class='inputview' id='".$FID."11' name='Secret' type='text' readonly='readonly' value='"; if (empty($Secret)) echo $empty; else echo $Secret; echo "' onclick='NEditInline(this,\"$FID.11\"); return false;'/>
            
            </span> 
        
                </div>
        </div>
      </div>
      <!--[if !IE]>end row<![endif]--> 
      <!--[if !IE]>start row<![endif]-->
      <div class='row'>
        <label>SNMP:</label>
        <div class='inputs'>
          <div align='right'><span class='view_wrapper'>
            <input class='inputview' id='".$FID."12' name='SNMP' type='text' readonly='readonly' value='"; if (empty($SNMP)) echo $empty; else echo $SNMP; echo "' onclick='NEditInline(this,\"$FID.12\"); return false;'/>
            
            </span> 
             </div>
        </div>
      </div>
      <!--[if !IE]>end row<![endif]-->";
}
?>
      
      
       
<!-----Ending See Pass permission--->
      
     
        <!--[if !IE]>start row<![endif]-->
        <div class="row" id="editbtn" style="display:none;">
          <div class="inputs"> <span class="button2 blue_button save_button"><span><span><span class="button_ico"></span><em>ذخیره</em></span></span>
            <input name="submit" type="submit" onclick="SaveForm('<?php echo $FID; ?>','<?php echo $Faction; ?>'); return false;"/>
            </span> <span class="loading_button"></span> <span class="button2 blue_button renew_button"><span><span><span class="button_ico"></span><em>از نو</em></span></span>
            <input name="submit" type="submit" onclick="ViewHardware(<?php echo $HWID; ?>,<?php echo $UserID; ?>); return false;"/>
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
