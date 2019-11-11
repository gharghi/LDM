<?php
$id='P16';
$lv='5';
include "../global/db.php";
$NAID=stripslashes(mysql_real_escape_string($_POST['AID']));
$Password=stripslashes(mysql_real_escape_string($_POST['Password']));
$Confirm=stripslashes(mysql_real_escape_string($_POST['conf']));
$len=strlen($Password);
if (is_numeric($Password)) $int=1; else $int=0;
if (!empty($Password)&&$int==0&&$len>6&&$Password==$Confirm)
					{
						$query="update Admin set Password='$Password' where AID=$NAID;";
						$result=mysql_query($query);
						if($result) { 
						ALog('Admin',$NAID,'Password');
						echo 1;
						}
					}
					else echo 'b';
?>