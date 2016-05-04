<?php
session_start();
include '../model/user_model_class.php';
$user = new User_model_class();
if(isset($_GET['email']) &&  filter_var($_GET['email'], FILTER_VALIDATE_EMAIL) != FALSE)
{
    if($user->valid_acount($_GET['email']))
    {
        $_SESSION['msg'] = "Done !";
        header('Location: ../views/login.php');
        exit();
    }
    $_SESSION['msg'] = "Error : blame fucking developer";
    header('Location: ../views/home.php?page=0');
    exit();
}
$_SESSION['msg'] = "Error : email non valide";
header('Location: ../views/home.php?page=0');
exit();
?>