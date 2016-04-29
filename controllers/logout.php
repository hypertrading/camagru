<?php
session_start();
unset($_SESSION['login']);
$_SESSION['msg'] = "See you soon !";
header("Location: ../views/home.php");
exit ();
?>
