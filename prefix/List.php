<?php
$id='P18';
$lv='1';
$FID='F18';
include('../global/header.php'); ?>
<span class="pages" id="MN21"></span>
      <!--[if !IE]>start info<![endif]-->
      <div id="info"> 
        <!--[if !IE]>start section<![endif]-->
        <div class="section"> 
<script type="application/javascript">
function AddPrefix(){
	$('.loading_button').html(loading4);
	var value=$("#AddPrefix").serialize();
	$.post('../prefix/Add.php',value,function(data){
		$('.loading_button').empty();
		switch(data){
				case "a":
					$("li.red#w11").show().delay(2000).fadeOut(4000);
					break;
				case "b":
					$("li.red#w12").show().delay(2000).fadeOut(4000);
					break;
				case "c":
					$("li.red#w13").show().delay(2000).fadeOut(4000);
					break;
				case "z":
					loadpage('../prefix/List.php');
					break;
				default:
					$("li.red#w14").show().delay(2000).fadeOut(4000);
			}
	});
}
//-----------------------------------------------------
 </script>
  <ul class="system_messages">
    <li class="red" id="w11"><span class="ico"></span><strong class="system_title">CIDR نامعتبر است!</strong></li>
    <li class="red" id="w12"><span class="ico"></span><strong class="system_title">آدرس وارد شده نا معتیر است!</strong></li>
    <li class="red" id="w13"><span class="ico"></span><strong class="system_title">CIDR و IP غیر مرتبطند!</strong></li>
    <li class="red" id="w14"><span class="ico"></span><strong class="system_title">خطایی روی داده است!</strong></li>
    <li class="green" id="g11"><span class="ico"></span><strong class="system_title">Prefix با موفقیت ثبت گردید.</strong></li>
    <li class="green" id="12"><span class="ico"></span><strong class="system_title">Prefix با موفقیت حذف گردید.</strong></li>
  </ul>
  
<!--[if !IE]>start section inner <![endif]-->
<div class="section_inner">
<div class="thin_wrapper1">
<div class="title_wrapper">
    <h2>افزودن دستی</h2>
   </div>
<!--[if !IE]>start forms<![endif]-->
<form id="AddPrefix" method="post" class="search_form general_form">
  <!--[if !IE]>start fieldset<![endif]-->
  <fieldset>
    <!--[if !IE]>start forms<![endif]-->
    <div class="forms">
      
      <!--[if !IE]>start row<![endif]-->
      <div class="row" >
        <label>محدوده آدرس:</label>
        <div class="inputs" style="width:240px !important;">
          <div align="right" style="float:right;">
            <div class="IP">
            <ul>
              <li> <span class="input_wrapper small_input">
                <input class="text" name="Oct1" id="1" type="text" on onkeyup="validatePrefix(this);" />
                </span></li>
              <li>.</li>
              <li> <span class="input_wrapper small_input">
                <input class="text" name="Oct2" id="2" type="text" onkeyup="validatePrefix(this);" />
                </span></li>
              <li>.</li>
              <li> <span class="input_wrapper small_input">
                <input class="text" name="Oct3" id="3" type="text" onkeyup="validatePrefix(this);" />
                </span></li>
              <li>.</li>
              <li> <span class="input_wrapper small_input">
                <input class="text" name="Oct4" id="4" type="text" onkeyup="validatePrefix(this);" />
                </span></li>
              <li>/</li>
              <li><span class="input_wrapper small_input">
                <input class="text" name="CIDR" id="CIDR" type="text" onkeyup="validateCIDR(this);" />
                </span></li>
                </ul>
              </div>
          </div>
        </div>
      </div>
      
      <!--[if !IE]>end row<![endif]--> 
      
      <!--[if !IE]>start row<![endif]-->
      <div class="row">
        <div class="inputs"> <span class="button2 blue_button add_button"><span><span><span class="button_ico"></span><em>تایید</em></span></span>
          <input name="submit" type="submit" onclick="AddPrefix(this); return false;"/>
          </span>
          <span class="loading_button"> </span> </div>
      </div>
      <!--[if !IE]>end row<![endif]--> 
    </div>
 
    <!--[if !IE]>end forms<![endif]-->
  </fieldset>
  <!--[if !IE]>end fieldset<![endif]-->
</form>
<!--[if !IE]>end forms<![endif]-->
<div><a href="#">همسان سازی اتوماتیک</a> </div>
</div>
<div class="thin_wrapper2">
 <div class="title_wrapper">
    <h2>محدوده IP</h2>
   </div>
    <!--[if !IE]>start table_wrapper<![endif]-->
    <div class="table_wrapper">
<?php
$DB=new Database;
$DB->Connect();
$DB->Select('Prefix','*','','PID');
$num=$DB->Select_Rows;
$i=0;
echo "<div class='table_wrapper_inner'>
<table cellpadding='0' cellspacing='0' width='100%'>
  <thead><tr>
	  <th  style='width:18px;'>#</th>
	  <th><a href='#'>IP</a></th>
	  <th style='width: 12px;'>دستورها</th>
  </tr>
  </thead>";
while ($i < $num) {
	$PID=$DB->Select_Result[$i]['PID'];
	$Oct1=$DB->Select_Result[$i]['Oct1'];
	$Oct2=$DB->Select_Result[$i]['Oct2'];
	$Oct3=$DB->Select_Result[$i]['Oct3'];
	$Oct4=$DB->Select_Result[$i]['Oct4'];
	$CIDR=$DB->Select_Result[$i]['CIDR'];
	$j=$i+1;
	echo "<tbody><tr class='first' id='$PID'>
									<td>".$j."</td>
									<td>$Oct1.$Oct2.$Oct3.$Oct4/$CIDR</td>
									<td>
										<div  class='actions' style='width:48px !important;'>
											<ul>
												<li><a class='Accperm' id='$PID' href='javascript:PrefixSubnet($PID);' title='محدوده آدرس دهی' ></a></li>
												<li><a class='Accdelete' id='$PID' href='javascript:DelPrefix($PID);' title='پاک کردن' ></a></li>
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
  </div>
  <!--[if !IE]>end table_wrapper<![endif]--> 
</div>
</div>
<!--[if !IE]>end section inner<![endif]-->
         </div>
        <!--[if !IE]>end section<![endif]--> 
        
      </div>
      <!--[if !IE]>end info<![endif]-->

      <?php  include("../global/footer.php"); ?>