<?php
session_start();
include '../model/creation_model_class.php';
$creation_model = new Creation_model_class();
$str = "data:image/png;base64,";

$data = str_replace($str, "", $_POST['pict']);
if(base64_decode($data, true) == FALSE)
{
    $data = $_FILES['file']['tmp_name'];
    $sizetmp = getimagesize($_FILES['file']['tmp_name']);
    $tmp_image = imagecreatefromjpeg($data);
    $image = imagecreatetruecolor(320, 240);
    imagecopyresampled($image, $tmp_image, 0, 0, 0, 0, 320, 240, $sizetmp[0], $sizetmp[1]);
}
else
{
    $data = base64_decode($data);
    $image = imagecreatefromstring($data);
}
$item = "../assets/img/objects/".$_POST['item'].".png";
$item = imagecreatefrompng($item);
imagecopyresampled($image, $item, 0, 0, 0, 0, 320, 240, 320, 240);

$id = $creation_model->new_creation($_SESSION['user']['id']);
$path = "../assets/img/user_creations/".$id['id'].".png";
imagepng($image, $path);

imagedestroy($image);
imagedestroy($item);

header('Location: ../views/montage.php');
exit();
?>