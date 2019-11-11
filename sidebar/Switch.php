<?php
$id='P14';
$lv='1';
include "../global/db.php";
$SWID=stripslashes(mysql_real_escape_string($_POST['SWID']));
?>
<div class="title_wrapper">
     <h3>فرمانهای قابل اجرا</h3>
</div>
<div id="secondary_menu">
    <ul>
            
        <?php if (isset($_POST['SWID'])) { ?>
         <li><a href="javascript:AuditSearchSP('Z','Switch',<?php echo $SWID; ?>);"> گزارش های دسترسی سوئیچ </a></li>
        <?php } ?>
        <li><a href="javascript:loadpage('switch/List.php');">سوئیچ ها </a></li>
        <li><a href="javascript:loadpage('type/List.php');"> مدلهای سخت افزار </a></li>
        <li><a href="javascript:loadpage('tower/List.php');"> مرکز ها </a></li>
    </ul>
</div>