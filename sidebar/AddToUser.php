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
   		<li><a href="javascript:loaduserprofile(<?php echo $UserID; ?>);">مشاهده <?php echo NameUser($UserID);?></a></li>
        <li><a href="javascript:OpenBySide(<?php echo $UserID; ?>,'ip/add1.php','ip/List.php');">افزودن و حذف IP </a></li>
        <li><a href="javascript:OpenBySide(<?php echo $UserID; ?>,'hardware/add1.php','hardware/List.php');">سخت افزار ها</a></li>
        <li><a href="javascript:OpenBySide(<?php echo $UserID; ?>,'ip/add1.php');">رویت سخت افزارها</a></li>
        <li><a href="javascript:OpenBySide(<?php echo $UserID; ?>,'ip/add1.php');">رویت گزارش های کاربر</a></li>
        <li><a href="javascript:OpenBySide(<?php echo $UserID; ?>,'ip/add1.php');">پاک کردن کاربر</a></li>
    </ul>
</div>