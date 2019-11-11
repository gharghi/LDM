<?php
$id='P11';
$lv='1';
include "../global/db.php";
$UserID=stripslashes(mysql_real_escape_string($_POST['UserID']));
?>
<div class="title_wrapper">
     <h3>فرمانهای قابل اجرا</h3>
</div>
<div id="secondary_menu">
    <ul>
     <?php if ($_POST['Ref']!='Main') { ?>
    <li><a href="javascript:loaduserprofile(<?php echo $UserID; ?>);">مشاهده پروفایل ( <?php echo NameUser($UserID);?> )</a></li>
   
     <?php } ?>
        <li><a href="javascript:DeleteUser(<?php echo $UserID; ?>);">حذف مشترک ( <?php echo NameUser($UserID);?> )</a></li>
    <?php if ($_POST['Ref']!='IP') { ?>
        <li><a href="javascript:OpenBySide(<?php echo $UserID; ?>,'ip/add1.php','ip/List.php','.thin_wrapper2','IP');">افزودن و حذف IP </a></li>
        <?php } ?>
         <?php if ($_POST['Ref']!='Hardware') { ?>
        <li><a href="javascript:OpenBySide(<?php echo $UserID; ?>,'hardware/List.php','hardware/Grid.php','#tablehardware','Hardware');">سخت افزار ها</a></li>
        <?php } ?>
         
         <?php if (isset($_POST['HWID'])) { 
		 $HWID=stripslashes(mysql_real_escape_string($_POST['HWID']));
		 ?>
        <li><a href="javascript:DelHardware2(<?php echo $HWID; ?>,<?php echo $UserID; ?>);">حذف سخت افزار</a></li>
        <?php } ?>
        
         <?php if (($_POST['Ref']!='Audit')&&($_POST['Ref']!='Hardware')&&($_POST['Ref']!='IP')&&empty($_POST['HWID'])) { ?>
         <li><a href="javascript:OpenBySide(<?php echo $UserID; ?>,'a','a','a','Audit');AuditSearchSP('Z','User',<?php echo $UserID; ?>);"> گزارش های دسترسی مشترک </a></li>
 <li><a href="javascript:PersonObject(<?php echo $UserID; ?>);"> ساخت Person Object </a></li>
        <?php } ?>
        
        <?php if (isset($_POST['HWID'])) { ?>
         <li><a href="javascript:OpenBySide(<?php echo $UserID; ?>,'a','a','a','Audit');AuditSearchSP('Z','Hardware',<?php echo $HWID; ?>);"> گزارش های دسترسی سخت افزار </a></li>
        <?php } ?>
    </ul>
</div>