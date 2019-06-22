<?php
session_start();
session_destroy();
setcookie("user",null,-1);
header('location: index.php');
exit;
 ?>
