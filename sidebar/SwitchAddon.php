<?php
$id='P14';
$lv='1';
include "../global/db.php";
$SWID=stripslashes(mysql_real_escape_string($_POST['SWID']));
$array=mysql_fetch_array(mysql_query("select count(PortID) as PortNum from Port where SWID=$SWID and Active=1"));
$PortNum=$array['PortNum'];
?>
						<div class="title_wrapper">
							<h3>افزونه ها</h3>
						</div>
						<div id="statistics">
							<dl>
								<dt>تعداد پورت های فعال</dt>
								<dd><?php echo fdigit($PortNum); ?></dd>
							</dl>
							
						</div>
					</div>