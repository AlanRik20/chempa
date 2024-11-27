<?php
session_start();
session_destroy();
header("location:\chempa\index.php");
exit();
?>