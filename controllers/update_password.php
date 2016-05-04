<?php
session_start();
include '../model/user_model_class.php';
$user = new User_model_class();
if($user->check_form($_POST['passwd']) == FALSE)
{
    $_SESSION['msg'] = "Error : Password incorrect";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit ();
}
$new_pass = hash('whirlpool', $_POST['passwd']);
if($user->update_password($_POST['id'], $new_pass))
{
    $_SESSION['msg'] = "Your password has been update.";
    header("Location: ../views/login.php");
    exit ();
}
$_SESSION['msg'] = "Error : blame fucking developer";
header("Location: ../views/login.php");
exit ();
?>