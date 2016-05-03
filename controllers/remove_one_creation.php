<?php
session_start();
include '../model/creation_model_class.php';
$creation_model = new Creation_model_class();
$creation_model->rm_one_creation($_POST['id']);
unlink('../assets/img/user_creations/'.$_POST['id'].".png");
$_SESSION['msg'] = "Success";
header('Location: ../views/montage.php');
exit();
?>