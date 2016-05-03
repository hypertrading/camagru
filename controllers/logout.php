<?php
session_start();
unset($_SESSION['user']);
unset( $_SESSION['admin']);
$_SESSION['msg'] = "See you soon !";
header("Location: ../views/home_class.php");
exit ();
?>
