<?php
session_start();
include '../model/creation_model_class.php';
$creation_model = new Creation_model_class();
$comment = addslashes($_POST['comment']);

if ($creation_model->new_comment($comment, $_POST['creation_id'], $_POST['user_id']))
{
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit ();
}
$_SESSION['msg'] = "Error, you comment can't be add.";
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit ();
?>