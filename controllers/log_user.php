<?php
include '../model/user_model_class.php';
$user = new User_model_class();
session_start();
if ($_POST['login'] != "" && $_POST['passwd'] != "")
{
    if ($user->check_form($_POST['login']) != FALSE && $user->check_form($_POST['passwd']) != FALSE)
    {
        if ($user->auth($_POST['login'], $_POST['passwd']))
        {
            $_SESSION['msg'] = "Connexion granted";
            header("Location: ../views/home.php");
            exit ();
        }
        else
        {
            $_SESSION['msg'] = "Error : user/password not match";
            header("Location: ../views/login.php");
            exit ();
        }
    }
    else
    {
        $_SESSION['msg'] = "Error : Wrong Format";
        header("Location: ../views/login.php");
        exit ();
    }
}
$_SESSION['msg'] = "Error : Form empty or partially";
header("Location: ../views/login.php");
exit ();
?>