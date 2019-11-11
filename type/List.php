<?php
$id='P20';
$lv='1';
$FID='F20';
include "../global/db.php";
$query="select * from Type order by TID desc";
$result=mysql_query($query);
$num=mysql_num_rows($result);
?>
  <ul class="system_messages">
    <li class="red" id="11"><span class="ico"></span><strong class="system_title">نوع میبایست وارد شود!</strong></li>
    <li class="red" id="12"><span class="ico"></span><strong class="system_title">برند میبایست وارد شود!</strong></li>
     <li class="red" id="13"><span class="ico"></span><strong class="system_title">مدل میبایست وارد شود!</strong></li>
     <li class="red" id="14"><span class="ico"></span><strong class="system_title">خطایی در سرویس روی داده است!</strong></li>
     <li class="green" id="11"><span class="ico"></span><strong class="system_title">سخت افزار با موفقیت ثبت گردید.</strong></li>
    <li class="green" id="12"><span class="ico"></span><strong class="system_title">سخت افزار با موفقیت حذف گردید.</strong></li>
  </ul>
<!--[if !IE]>start forms<![endif]-->
<form id="Type" method="post" class="search_form general_form">
  <!--[if !IE]>start fieldset<![endif]-->
  <fieldset>
  <div class="addicon" onClick="OpenAddType(this);">
<img src="css/layout/addobject.png"  title="افزودن سخت افزار">
</div>
<div id="AddType" style="display:none;">
    <!--[if !IE]>start forms<![endif]-->
    <div class="forms">
      <h3>افزودن سخت افزار</h3>
       <!--[if !IE]>start row<![endif]-->
      <div class="row">
        <label>نوع:</label>
        <div class="inputs">
          <div align="right"><span class="input_wrapper">
            <input class="text" name="Type" type="text"  />
            </span> </div>
        </div>
      </div>
      <!--[if !IE]>end row<![endif]--> 
      <!--[if !IE]>start row<![endif]-->
      <div class="row">
        <label>برند:</label>
        <div class="inputs">
          <div align="right"><span class="input_wrapper">
            <input class="text" name="Brand" type="text"  />
            </span> </div>
        </div>
      </div>
      <!--[if !IE]>end row<![endif]--> 
       <!--[if !IE]>start row<![endif]-->
      <div class="row">
        <label>مدل:</label>
        <div class="inputs">
          <div align="right"><span class="input_wrapper">
            <input class="text" name="Model" type="text"  />
            </span> </div>
        </div>
      </div>
      <!--[if !IE]>end row<![endif]--> 
     
      <!--[if !IE]>start row<![endif]-->
      <div class="row">
        <div class="inputs"> <span class="button2 blue_button add_button"><span><span><span class="button_ico"></span><em>تایید</em></span></span>
          <input name="submit" type="submit" onclick="AddType(this); return false;"/>
          </span>
          <span class="loading_button"> </span> </div>
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
    <h2>انواع تجهیزات</h2>
    </div>
  <!--[if !IE]>start section inner<![endif]-->
  <div class="section_inner" id="tabletype"> 
    
    <!--[if !IE]>start table_wrapper<![endif]-->
    <div class="table_wrapper">
      <?php
$i=0;
$j=1;
echo "<div class='table_wrapper_inner'>
							<table cellpadding='0' cellspacing='0' width='100%'>
								<thead><tr>
									<th  style='width:18px;'>#</th>
									<th>نوع</th>
									<th>برند</th>
									<th>مدل</th>
									<th style='width: 12px;'>دستورها</th>
								</tr>
								</thead>";
								
while ($i < $num) {
	
	$TID=mysql_result($result,$i,'TID');
	$Type=mysql_result($result,$i,'Type');
	$Brand=mysql_result($result,$i,'Brand');
	$Model=mysql_result($result,$i,'Model');
	echo "<tbody><tr class='first' id='$TID'>
									<td>",fdigit($j),"</td>
									<td>$Type</td>
									<td>$Brand</td>
									<td>$Model</td>
									<td>
										<div  class='actions' style='width:48px !important;'>
											<ul>
												
												<li><a class='Accdelete' id='$TID' href='javascript:TypeDelete($TID);' title='پاک کردن' ></a></li>
												<li><a class='Accedit' id='$TID' href='javascript:TypeEdit1($TID);' title='ویرایش' ></a></li>
											</ul>
										</div>
									</td>
								</tr>";
	$j++;
	$i++;
	}	
?>
      </tbody>
      </table>
    </div>
  </div>
  <!--[if !IE]>end table_wrapper<![endif]--> 
  <!--[if !IE]>end table_wrapper<![endif]--> 
</div>
<!--[if !IE]>end section inner<![endif]-->