<?php 
session_save_path('tmp');
session_start();
session_destroy();
setcookie("Login", "", time()-3600);
setcookie("Username", "", time()-3600);
header("location:login.php");
?>