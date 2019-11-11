<?php
$id='P19';
$lv='1';
$FID='F19';
include "../global/db.php";
$query="select * from Model order by ModelID";
$result=mysql_query($query);
$num=mysql_num_rows($result);
?>
  <ul class="system_messages">
    <li class="red" id="11"><span class="ico"></span><strong class="system_title">CIDR نامعتبر است!</strong></li>
    <li class="red" id="12"><span class="ico"></span><strong class="system_title">آدرس وارد شده نا معتیر است!</strong></li>
    <li class="red" id="13"><span class="ico"></span><strong class="system_title">CIDR و IP غیر مرتبطند!</strong></li>
    <li class="red" id="13"><span class="ico"></span><strong class="system_title">خطایی روی داده است!</strong></li>
    <li class="green" id="11"><span class="ico"></span><strong class="system_title">Prefix با موفقیت ثبت گردید.</strong></li>
    <li class="green" id="12"><span class="ico"></span><strong class="system_title">Prefix با موفقیت حذف گردید.</strong></li>
  </ul>
<div class="thin_wrapper1">
<!--[if !IE]>start forms<![endif]-->
<form id="AddPrefix" method="post" class="search_form general_form">
  <!--[if !IE]>start fieldset<![endif]-->
  <fieldset>
    <!--[if !IE]>start forms<![endif]-->
    <div class="forms">
      <h3>افزودن تجهیزات</h3>
    <!--[if !IE]>start row<![endif]-->
		<div class="row">
			<label>نام محصول:</label>
			<div class="inputs">
				<div align="right"><span class="input_wrapper">
				<input class="text" name="Cont" type="text"/>
				</span>
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
    </div>
    <!--[if !IE]>end forms<![endif]-->
  </fieldset>
  <!--[if !IE]>end fieldset<![endif]-->
</form>
<!--[if !IE]>end forms<![endif]-->
</div>
<div class="thin_wrapper2">
  <div class="title_wrapper">
    <h2>محدوده IP</h2>
    <a href="#" class="view_all_orders"><span id="num"><?php echo $num; ?></span>کل رکورد ها:</a> </div>
  <!--[if !IE]>start section inner<![endif]-->
  <div class="section_inner"> 
    
    <!--[if !IE]>start table_wrapper<![endif]-->
    <div class="table_wrapper">
      <?php
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
	$PID=mysql_result($result,$i,'PID');
	$Oct1=mysql_result($result,$i,'Oct1');
	$Oct2=mysql_result($result,$i,'Oct2');
	$Oct3=mysql_result($result,$i,'Oct3');
	$Oct4=mysql_result($result,$i,'Oct4');
	$CIDR=mysql_result($result,$i,'CIDR');
	$j=$i+1;
	echo "<tbody><tr class='first' id='$PID'>
									<td>$j</td>
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
<!--[if !IE]>end section inner<![endif]-->
</div>
