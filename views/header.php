<?php
//error_reporting(E_ERROR | E_WARNING | E_PARSE);
session_start();?>
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
        <div class="button-nav float-right">
            <?php if ($_SESSION['user'] == NULL){?>
                <a href="login.php"><button>Log-in</button></a>
                <a href="register.php"><button>Register</button></a>
            <?php }else {?>
                <a href="montage.php"><button>Montage page</button></a>
                <a href="../controllers/logout.php"><button><?php echo $_SESSION['user']['login']?> want logout</button></a>
                <?php if ($_SESSION['admin'] == 1){?>
                    <a href="#"><button>Backoffice Admin</button></a>
                <?php }else {?>
                    <a href="../controllers/user_profil.php"><button><?php echo $_SESSION['user']['login']?>'s profil</button></a>
                <?php }}?>
        </div>
        <div class="clear"></div>
        <a href="home.php"><img class="logo" src="../assets/img/logo.png"></a>
    </div>
</header>
<div class="main">
<?php
if ($_SESSION['msg'] != NULL)
{
    echo "<div class='msg'><p>";
    echo $_SESSION['msg'];
    echo "</p></div>";
    unset($_SESSION['msg']);
}
?>
