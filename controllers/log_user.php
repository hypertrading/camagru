<?php
include "main_functions.php";
include "../model/user_query.php";
session_start();
if ($_POST['login'] != "" && $_POST['passwd'] != "")
{
    if (check_form($_POST['login']) != FALSE && check_form($_POST['passwd']) != FALSE)
    {
        if (auth($_POST['login'], $_POST['passwd']))
        {
            $_SESSION['msg'] = "Connexion granted";
            header("Location: ../views/home_class.php");
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