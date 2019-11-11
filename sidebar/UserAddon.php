<?php
$id='P11';
$lv='1';
include "../global/db.php";
$UserID=stripslashes(mysql_real_escape_string($_POST['UserID']));
$array=mysql_fetch_array(mysql_query("select count(IPID) as IPNum from IP where UserID=$UserID and Object='User'"));
$IPNum=$array['IPNum'];
$array=mysql_fetch_array(mysql_query("select count(HWID) as HWNum from Hardware where UserID=$UserID"));
$HWNum=$array['HWNum'];
?>
						<div class="title_wrapper">
							<h3>افزونه ها</h3>
						</div>
						<div id="statistics">
							<dl>
								<dt>تعداد IP های اختصاص یافته</dt>
								<dd><?php echo fdigit($IPNum); ?></dd>
							</dl>
							<dl>
								<dt>تعداد سخت افزارهای اختصاص یافته</dt>
								<dd><?php echo fdigit($HWNum); ?></dd>
							</dl>
						</div>
					</div>