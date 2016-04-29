<?php
session_start();
$str = "data:image/png;base64,";

$data = str_replace($str, "", $_POST['pict']);
if(base64_decode($data, true) == FALSE)
{
    $image = imagecreatefromjpeg($data);
}
else
{
    $data = base64_decode($data);
    $image = imagecreatefromstring($data);
}
$item = "../assets/img/objects/".$_POST['item'].".png";
$item = imagecreatefrompng($item);
imagecopyresampled($image, $item, 0, 0, 0, 0, 320, 240, 320, 240);
$path = "../assets/img/user_creations/".$_SESSION['login'].".png";
imagepng($image, $path);
imagedestroy($image);
imagedestroy($item);
header('Location: ../views/home.php')
?>