<?php
$id='P11';
$lv='1';
$FID='F11';
 include('../global/header.php'); ?>
<span class="pages" id="MN23"></span>
      <!--[if !IE]>start info<![endif]-->
      <div id="info"> 
        <!--[if !IE]>start section<![endif]-->
        <div class="section"> 
<!--[if !IE]>start section inner <![endif]-->
<div class="section_inner">
<!--[if !IE]>start product list tabs<![endif]-->
<ul id="product_list_tabs">
 <li><a href="javascript:ChangeTab('Tab1');" id="Tab1" class="tselected" ><span><span><?php echo _SEARCH_TAB_BASIC; ?></span></span></a></li>
 <li><a href="javascript:ChangeTab('Tab2');" id="Tab2"><span><span><?php echo _SEARCH_TAB_ADVANCED; ?></span></span></a></li>
 <li><a href="javascript:ChangeTab('Tab3');" id="Tab3"><span><span><?php echo _SEARCH_TAB_ATTR; ?></span></span></a></li>
</ul>
<!--[if !IE]>end product list tabs<![endif]--> 
<!--[if !IE]>start forms<![endif]-->
<form  id="advancedsearch" method="post" action="../proc/UserSearch.php" class="search_form general_form" >
 <fieldset>
  <div id="Tab1" class="Tab Tab_Show"> 

      <!--[if !IE]>start row<![endif]-->
   <div class="row">
    <label><?php echo _SEARCH_NAME; ?>:</label>
    <div class="inputs">
     <div align="right"> <span class="input_wrapper blank search ">
      <select name="NameEqual">
       <option value="="><?php echo _SEARCH_EQUAL; ?></option>
       <option value="in"><?php echo _SEARCH_IN; ?></option>
       <option value="st"><?php echo _SEARCH_START; ?></option>
       <option value="en"><?php echo _SEARCH_END; ?></option>
      </select>
      </span> <span class="input_wrapper">
      <input class="text" name="Name" type="text" />
      </span> </div>
    </div>
   </div>
   
   <!--[if !IE]>end row<![endif]--> 
   <!--[if !IE]>start row<![endif]-->
   <div class="row">
    <label><?php echo _SEARCH_CONT; ?>:</label>
    <div class="inputs">
     <div align="right"> <span class="input_wrapper blank search ">
      <select name="ContEqual">
       <option value="="><?php echo _SEARCH_EQUAL; ?></option>
       <option value="in"><?php echo _SEARCH_IN; ?></option>
       <option value="st"><?php echo _SEARCH_START; ?></option>
       <option value="en"><?php echo _SEARCH_END; ?></option>
      </select>
      </span> <span class="input_wrapper">
      <input class="text" name="Cont" type="text" />
      </span> </div>
    </div>
   </div>
   
   <!--[if !IE]>end row<![endif]--> 
   
   <!--[if !IE]>start row<![endif]-->
   
   <div class="row">
    <label><?php echo _SEARCH_TEL; ?>:</label>
    <div class="inputs">
     <div align="right"> <span class="input_wrapper blank search ">
      <select name="TelEqual">
       <option value="="><?php echo _SEARCH_EQUAL; ?></option>
       <option value="in"><?php echo _SEARCH_IN; ?></option>
       <option value="st"><?php echo _SEARCH_START; ?></option>
       <option value="en"><?php echo _SEARCH_END; ?></option>
      </select>
      </span> <span class="input_wrapper">
      <input class="text" name="Tel" type="text" />
      </span> </div>
    </div>
   </div>
   
   <!--[if !IE]>end row<![endif]--> 
   
   <!--[if !IE]>start row<![endif]-->
   
   <div class="row">
    <label><?php echo _SEARCH_MOB; ?>:</label>
    <div class="inputs">
     <div align="right"> <span class="input_wrapper blank search ">
      <select name="MobEqual">
       <option value="="><?php echo _SEARCH_EQUAL; ?></option>
       <option value="in"><?php echo _SEARCH_IN; ?></option>
       <option value="st"><?php echo _SEARCH_START; ?></option>
       <option value="en"><?php echo _SEARCH_END; ?></option>
      </select>
      </span> <span class="input_wrapper">
      <input class="text" name="Mob" type="text" />
      </span> </div>
    </div>
   </div>
   
   <!--[if !IE]>end row<![endif]--> 
   
   <!--[if !IE]>start row<![endif]-->
   
   <div class="row">
    <label><?php echo _SEARCH_RESP; ?>:</label>
    <div class="inputs">
     <div align="right"> <span class="input_wrapper blank search ">
      <select name="RespEqual">
       <option value="="><?php echo _SEARCH_EQUAL; ?></option>
       <option value="in"><?php echo _SEARCH_IN; ?></option>
       <option value="st"><?php echo _SEARCH_START; ?></option>
       <option value="en"><?php echo _SEARCH_END; ?></option>
      </select>
      </span> <span class="input_wrapper">
      <input class="text" name="Resp" type="text" />
      </span> </div>
    </div>
   </div>
  </div>
  <!--[if !IE]>end row<![endif]-->
  <div id="Tab2" class="Tab_Hide Tab"> 
   <!--[if !IE]>start row<![endif]-->
   
   <div class="row">
    <label><?php echo _SEARCH_BW; ?>:</label>
    <div class="inputs">
     <div align="right"> <span class="input_wrapper blank search ">
      <select name="BWEqual">
       <option value="="><?php echo _SEARCH_EQUAL; ?></option>
       <option value="<"><?php echo _SEARCH_LESS; ?></option>
       <option value=">"><?php echo _SEARCH_MORE; ?></option>
      </select>
      </span> <span class="input_wrapper">
      <input class="text" name="BW" type="text"/>
      </span> </div>
    </div>
   </div>
   
   <!--[if !IE]>end row<![endif]--> 
   
   <!--[if !IE]>start row<![endif]-->
   
   <div class="row">
    <label><?php echo _SEARCH_STATUS; ?>:</label>
    <div class="inputs">
     <div align="right"> <span class="input_wrapper blank search ">
      <select name="Status">
       <option value="2"><?php echo _SEARCH_BOTH; ?></option>
       <option value="1"><?php echo _USER_ACTIVE; ?></option>
       <option value="0"><?php echo _USER_DISABLE; ?></option>
      </select>
      </span> <span class="input_wrapper">
      <input class="text" name="Address" type="text"/>
      </span> </div>
    </div>
   </div>
   
   <!--[if !IE]>end row<![endif]--> 
   <!--[if !IE]>start row<![endif]-->
   <div class="row">
    <label><?php echo _SEARCH_EMAIL; ?>:</label>
    <div class="inputs">
     <div align="right"> <span class="input_wrapper blank search ">
      <select name="EmailEqual">
       <option value="="><?php echo _SEARCH_EQUAL; ?></option>
       <option value="in"><?php echo _SEARCH_IN; ?></option>
       <option value="st"><?php echo _SEARCH_START; ?></option>
       <option value="en"><?php echo _SEARCH_END; ?></option>
      </select>
      </span> <span class="input_wrapper">
      <input class="text" name="Email" type="text"/>
      </span> </div>
    </div>
   </div>
   <!--[if !IE]>end row<![endif]--> 
   <!--[if !IE]>start row<![endif]-->
   <div class="row">
    <label><?php echo _SEARCH_ADDRESS; ?>:</label>
    <div class="inputs">
     <div align="right"> <span class="input_wrapper blank search ">
      <select name="AddressEqual">
       <option value="="><?php echo _SEARCH_EQUAL; ?></option>
       <option value="in"><?php echo _SEARCH_IN; ?></option>
       <option value="st"><?php echo _SEARCH_START; ?></option>
       <option value="en"><?php echo _SEARCH_END; ?></option>
      </select>
      </span> <span class="input_wrapper">
      <input class="text" name="Address" type="text"/>
      </span> </div>
    </div>
   </div>
   <!--[if !IE]>end row<![endif]--> 
   <!--[if !IE]>start row<![endif]-->
   <div class="row">
    <label><?php echo _SEARCH_DESCR; ?>:</label>
    <div class="inputs">
     <div align="right"> <span class="input_wrapper blank search ">
      <select name="DescripEqual">
       <option value="="><?php echo _SEARCH_EQUAL; ?></option>
       <option value="in"><?php echo _SEARCH_IN; ?></option>
       <option value="st"><?php echo _SEARCH_START; ?></option>
       <option value="en"><?php echo _SEARCH_END; ?></option>
      </select>
      </span> <span class="input_wrapper">
      <input class="text" name="Descrip" type="text"/>
      </span> </div>
    </div>
   </div>
   <!--[if !IE]>end row<![endif]--> 
  </div>
  <div id="Tab3" class="Tab_Hide Tab"> 
   <!--[if !IE]>start row<![endif]-->
   <div class="row" > <span class="checkbox_tab">
    <input class="checkbox" name="DName" value="1" type="checkbox" checked="checked" />
 <?php echo _SEARCH_NAME; ?> </span> <span class="checkbox_tab">
    <input  class="checkbox" name="DCont" value="1" type="checkbox" checked="checked"/>
  <?php echo _SEARCH_CONT; ?></span> <span class="checkbox_tab">
    <input  class="checkbox" name="DTel" value="1" type="checkbox"/>
   <?php echo _SEARCH_TEL; ?></span> <span class="checkbox_tab">
    <input  class="checkbox" name="DMob" value="1" type="checkbox"/>
   <?php echo _SEARCH_MOB; ?></span> </span> 
    <span class="checkbox_tab">
    <input  class="checkbox" name="DResp" value="1" type="checkbox"/>
    <?php echo _SEARCH_RESP; ?></span> </span> </div>
   <!--[if !IE]>end row<![endif]--> 
 <!--[if !IE]>start row<![endif]-->
   <div class="row" >
    <div class="inputs">
     <div align="right"> <span class="checkbox_tab">
    <input  class="checkbox" name="DLatName" value="1" type="checkbox"/>
   <?php echo _SEARCH_REG_NAME; ?></span> </span> 
     <span class="checkbox_tab">
      <input  class="checkbox" name="DLatResp" value="1" type="checkbox"/>
      <?php echo _SEARCH_REG_RESP; ?></span> <span class="checkbox_tab">
      <input class="checkbox" name="DEmail" value="1" type="checkbox"/>
      <?php echo _SEARCH_EMAIL; ?></span> <span class="checkbox_tab">
      <input  class="checkbox" name="DLatAddress" value="1" type="checkbox"/>
      <?php echo _SEARCH_REG_ADDRESS; ?></span> </span> </div>
    </div>
   </div>
   <!--[if !IE]>end row<![endif]--> 
   <!--[if !IE]>start row<![endif]-->
   <div class="row" >
    <div class="inputs">
     <div align="right"> <span class="checkbox_tab">
    <input  class="checkbox" name="DBW" value="1" type="checkbox"/>
    <?php echo _SEARCH_BW; ?></span> </span> 
     <span class="checkbox_tab">
      <input  class="checkbox" name="DStatus" value="1" type="checkbox"  checked="checked"/>
      <?php echo _SEARCH_STATUS; ?></span> <span class="checkbox_tab">
      <input class="checkbox" name="DAddress" value="1" type="checkbox"/>
      <?php echo _SEARCH_ADDRESS; ?></span> <span class="checkbox_tab">
      <input  class="checkbox" name="DDescrip" value="1" type="checkbox"/>
     <?php echo _SEARCH_DESCR; ?></span> </span> </div>
    </div>
   </div>
   <!--[if !IE]>end row<![endif]--> 
  </div>
  <div class="row">
   <hr />
  </div>
  <!--[if !IE]>start row<![endif]-->
  <div class="row">
   <label style="width:50px !important;"> <?php echo _SEARCH_SORT; ?>:</label>
   <span class="input_wrapper blank search2 space_search ">
   <select name="Order">
    <option value="UserID"> <?php echo _SEARCH_ID; ?></option>
    <option value="Name"> <?php echo _SEARCH_NAME; ?></option>
    <option value="Cont"> <?php echo _SEARCH_CONT; ?></option>
    <option value="Tel"> <?php echo _SEARCH_TEL; ?></option>
    <option value="Mob"> <?php echo _SEARCH_MOB; ?></option>
    <option value="Resp"> <?php echo _SEARCH_RESP; ?></option>
    <option value="Status"> <?php echo _SEARCH_STATUS; ?></option>
   </select>
   </span> <span class="space_search ">
   <input name="DESC" value="1" type="checkbox"  />
   </span>
   <label style="width:50px !important;"> <?php echo _SEARCH_ASC; ?></label>
   <span class="input_wrapper blank search space_search ">
   <select name="Limit">
    <option value="10">10</option>
    <option value="20">20</option>
    <option value="50">50</option>
    <option value="100">100</option>
    <option value="500">500</option>
    <option value="1000">1000</option>
   </select>
   </span>
   <label> <?php echo _SEARCH_LINES; ?></label>
   <label style="width:40px;"> <?php echo _SEARCH_VIEW; ?>:</label>
   <span class="input_wrapper blank search2 space_search ">
   <select name="Output" id="Output" onchange="ChangeOutputUser(this)">
    <option value="Web">Web</option>
    <option value="PDF">PDF</option>
    <option value="Excel">Excel</option>
   </select>
   </span> </div>
  <!--[if !IE]>end row<![endif]--> 
  <!--[if !IE]>start row<![endif]-->
  <div class="row">
   <div class="inputs"> <span class="button2 blue_button search_button"><span><span><em><span class="button_ico"></span><?php echo _SEARCH_SEARCH; ?></em></span></span>
    <input id="UserButton" name="submit" type="submit" onclick="AdvancedUserSearch('<?php echo $FID; ?>'); return false;"/>
    </span> <span class="Ad_loading_button"></span></div>
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
<div class="section_inner" id="TableUser" >  				
</div>
         </div>
        <!--[if !IE]>end section<![endif]--> 
      </div>
      <!--[if !IE]>end info<![endif]-->
      <?php  include("../global/footer.php"); ?>