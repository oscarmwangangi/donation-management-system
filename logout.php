<?php
session_start();
$_SESSION = array();
session_destroy();

// Prevent browser caching
header("Cache-Control: no-cache, no-store, must-revalidate");
header("Pragma: no-cache");
header("Expires: 0");

header("Location: index.php");
exit();
?>
