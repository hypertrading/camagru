<?php
session_start();
unset($_SESSION['user']);
$_SESSION['msg'] = "See you soon !";
header("Location: ../views/home.php");
exit ();
?>
