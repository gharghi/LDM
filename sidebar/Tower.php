<?php
$id='P15';
$lv='1';
include "../global/db.php";
$TWID=stripslashes(mysql_real_escape_string($_POST['TWID']));
?>
<div class="title_wrapper">
     <h3>فرمانهای قابل اجرا</h3>
</div>
<div id="secondary_menu">
    <ul>
            
        <?php if (isset($_POST['TWID'])) { ?>
         <li><a href="javascript:AuditSearchSP('Z','Tower',<?php echo $TWID; ?>);"> گزارش های دسترسی مرکز </a></li>
        <?php } ?>
         <li><a href="javascript:loadpage('tower/List.php');"> مرکز ها </a></li>
        <li><a href="javascript:loadpage('type/List.php');"> مدلهای سخت افزار </a></li>
        <li><a href="javascript:loadpage('switch/List.php');"> سوئیچ ها </a></li>
        <li><a href="javascript:loadpage('form/Users.php');"> کاربرها </a></li>
    </ul>
</div>