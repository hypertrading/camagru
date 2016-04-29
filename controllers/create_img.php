<?php
session_start();
include '../controllers/main_functions.php';
$str = "data:image/png;base64,";

$data = str_replace($str, "", $_POST['pict']);
if(base64_decode($data, true) == FALSE)
{
    $image = imagecreatefromjpeg($data);
    exit (); // Todo Fix Fakepath !
}
else
{
    $data = base64_decode($data);
    $image = imagecreatefromstring($data);
}
$item = "../assets/img/objects/".$_POST['item'].".png";
$item = imagecreatefrompng($item);
imagecopyresampled($image, $item, 0, 0, 0, 0, 320, 240, 320, 240);

$id = new_creation($_SESSION['user']['id']);
$path = "../assets/img/user_creations/".$id['id'].".png";
imagepng($image, $path);

imagedestroy($image);
imagedestroy($item);

header('Location: ../views/montage.php');
?>