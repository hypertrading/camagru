<?php
/*echo $_POST['comment']." ";
echo $_POST['creation_id']." ";
echo $_POST['user_id'];*/
session_start();
include 'main_functions.php';
if (isset($_POST['comment']) && isset($_POST['user_id']))
{
    if ($db = db_init())
    {
        include '../model/creation_query.php';
        if (query_new_comment($db, $_POST['comment'], $_POST['creation_id'], $_POST['user_id']))
        {
            $_SESSION['msg'] = "Comment add";
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit ();
        }
        $_SESSION['msg'] = "Error, you comment can't be add.";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit ();
    }
    $_SESSION['msg'] = "Error : DB Unloaded";
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit ();
}
?>