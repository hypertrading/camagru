<?php
session_start();
include "main_functions.php";
if ($db = db_init())
{
    include '../model/creation_query.php';
    query_rm_one_creation($db, $_POST['id']);
    unlink('../assets/img/user_creations/'.$_POST['id'].".png");
    $_SESSION['msg'] = "Success";
    header('Location: ../views/home.php');
    exit();
}
$_SESSION['msg'] = "Error : DB Unloaded";
header('Location: ../views/home.php');
exit();
?>