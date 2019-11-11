<?php
$id='P22';
$lv='1';
include "../global/db.php";
$UserID=stripslashes(mysql_real_escape_string($_POST['UserID']));
?>
<span class="Print_Info_Label">آدرسها:</span><span><span class="Print_Info_Value"><?php $query="select * from IP where UserID=$UserID and Object='User' order by IPID desc";
$result=mysql_query($query);
$num=mysql_num_rows($result);
if ($num==0)
{
	echo "<span>هیچ آدرسی به کاربر اختصتص نیافته است!</span>";
	exit;	
}

$i=0;

								
while ($i < $num) {
	
	$IPID=mysql_result($result,$i,'IPID');
	$Oct1=mysql_result($result,$i,'Oct1');
	$Oct2=mysql_result($result,$i,'Oct2');
	$Oct3=mysql_result($result,$i,'Oct3');
	$Oct4=mysql_result($result,$i,'Oct4');
	$CIDR=mysql_result($result,$i,'CIDR');
	if ($Oct4%(pow(2,(32-$CIDR)))==0){
	echo "<input type='hidden' name='IPID".$i."' value='$IPID'>";
	echo "--
									
									$Oct1.$Oct2.$Oct3.$Oct4/$CIDR
								";
	}
	$i++;
	}
	echo "--";
	 ?>	
	</span></span>