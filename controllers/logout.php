<?php
session_start();
unset($_SESSION['user']);
unset( $_SESSION['admin']);
$_SESSION['msg'] = "See you soon !";
header("Location: ../views/home.php?page=0");
exit ();
?>
