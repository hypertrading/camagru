<?php
session_start();
include '../model/creation_model_class.php';
$creation_model = new Creation_model_class();
if ($creation_model->liked($_POST['creation_id'], $_POST['user_id']))
{
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    exit ();
}
$_SESSION['msg'] = "Error, you can't like it. Blame the fucking developpeur";
header('Location: ' . $_SERVER['HTTP_REFERER']);
exit ();
?>