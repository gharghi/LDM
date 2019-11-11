<?php
$id='P15';
$lv='1';
include "../global/db.php";
$TWID=stripslashes(mysql_real_escape_string($_POST['TWID']));
$array=mysql_fetch_array(mysql_query("select count(SWID) as SWNum from Switch where TWID=$TWID "));
$SWNum=$array['SWNum'];
$array=mysql_fetch_array(mysql_query("select count(HWID) as HWNum from Hardware where TWID=$TWID "));
$HWNum=$array['HWNum'];
?>
						<div class="title_wrapper">
							<h3>افزونه ها</h3>
						</div>
						<div id="statistics">
							<dl>
								<dt>تعداد سوئیچ ها</dt> 
								<dd><?php echo fdigit($SWNum); ?></dd>
							</dl>
				<dl>
								<dt>تعداد سخت افزار ها</dt>
								<dd><?php echo fdigit($HWNum); ?></dd>
							</dl>
						</div>
					</div>