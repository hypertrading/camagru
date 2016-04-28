<?php
session_start();?>
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <title>Camagru</title>
    <link href="../assets/css/style.css" rel="stylesheet" type="text/css">
    <link rel="icon" type="image/png" sizes="32x32" href="../assets/img/favicon.ico">


</head>
<body>
<header>
    <div class="head">
        <a href="home.php"><img class="logo" src="../assets/img/logo.png"></a>
        <div class="float-right">
        <?php if ($_SESSION['login'] == NULL){?>
            <a href="login.php"><button>Log-in</button></a>
            <a href="register.php"><button>Register</button></a>
        <?php }else {?>
            <a href="logout.php"><button><?php echo $_SESSION['login']?> veut se deconnecter</button></a>
            <?php if ($_SESSION['admin'] == 1){?>
                <a href="admin.php"><button>Backoffice Admin</button></a>
            <?php }else {?>
                <a href="profil.php"><button><?php echo $_SESSION['login']?> profil</button></a>
            <?php }}?>
        </div>
        <div class="clear"></div>
    </div>
</header>
<?php// echo $_SERVER['SERVER_NAME'].$_SERVER['REQUEST_URI']; ?>