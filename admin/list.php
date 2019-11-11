<?php
$id='P16';
$lv='1';
include "../global/db.php";
$query="select * from Admin order by AID";
$result=mysql_query($query);
$num=mysql_num_rows($result);
?>
<ul class="system_messages">
 <li class="green" id="AdminDelete"><span class="ico"></span><strong class="system_title">مدیر با موفقیت حذف شد.</strong></li>
 <li class="red" id="AdminDeleteError"><span class="ico"></span><strong class="system_title">شما نمیتوانید خودتان را حذف نمایید!</strong></li>
 <li class="green" id="AdminPass"><span class="ico"></span><strong class="system_title">رمز عبور با موفقیت تغییر یافت.</strong></li>
</ul>
<div class="title_wrapper">
 <h2>مدیرها</h2>
</div>
<!--[if !IE]>start section inner<![endif]-->
<div class="section_inner"> 
  <!--[if !IE]>start table_wrapper<![endif]-->
  <div class="table_wrapper">
  <?php
$i=0;
echo "<div class='table_wrapper_inner'>
	 <table cellpadding='0' cellspacing='0' width='100%'>
	 <thead><tr>
	 <th  style='width: 20px;'>#</th>
	 <th  style='width: 56px;'>شناسه</th>
	 <th><a href='#'>نام کاربری</a></th>
	 <th><a href='#' class='asc'>نام مدیر</a></th>
	 <th>آخرین IP</th>
	 <th style='width: 140px;'>دستورها</th>
	 </tr>
	 </thead><tbody>";
while ($i < $num) {
$j=$i+1;
	$NAID=mysql_result($result,$i,'AID');
	$AUsername=mysql_result($result,$i,'AUsername');
	$Name=mysql_result($result,$i,'Name');
	$Grp=mysql_result($result,$i,'Grp');
	$Email=mysql_result($result,$i,'Email');
	$Lok=mysql_result($result,$i,'Lok');
	//---Last IP
	$query2='select IP from AdminLogin where AID='.$NAID.' order by Date desc limit 0,1';
	$result2=mysql_query($query2);
	$array2=mysql_fetch_array($result2);
	$IP=$array2['IP'];
	echo "<tr class='first' id='$NAID'>
									<td>".fdigit($j)."</td>
									<td>".fdigit($NAID)."</td>
									<td><span class='"; if ($Lok==1) echo "approved"; else echo "pending";
									echo "'>$AUsername</span></td>
									<td>$Name</td>
									<td>$IP</td>
									<td>
										<div  class='actions'>
											<ul>
												<li><a class='Accopen' id='$NAID' href='' title='مشاهده' onclick='AdminView(this); return false;'></a></li>
												<li><a class='Accedit' id='$NAID' href='' title='ویرایش' onclick='AdminEdit(this); return false;'></a></li>
												<li><a class='Accpass' id='$NAID' href='' title='تغییر رمز عبور' onclick='ChangePass(this); return false;'></a></li>
												<li><a class='Accperm' id='$NAID' href='' title='دسترسی ها' onclick='AdminPerm(this); return false;'></a></li>
												<li><a class='Accdelete' id='$NAID' href='' title='پاک کردن' onclick='AdminDelete($NAID); return false;'></a></li>
												<li><a class='Acclog' id='$NAID' href='javascript:AuditSearchSP($NAID,\"Z\",\"Z\");' title='مشاهده رخداد های مربوطه'></a></li>
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