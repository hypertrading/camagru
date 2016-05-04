<?php
session_start();

include '../model/user_model_class.php';
$user = new User_model_class();
if (isset($_GET['login']) && isset($_GET['id']) && $user->check_form($_GET['login']) == TRUE && is_numeric($_GET['id']))
{
    $acount = $user->get_one_user($_GET['login']);
    if(isset($acount['login']) && $acount['id'] == $_GET['id'])
    {
        include '../views/header.php';
        echo '<section class="">
                <h2>New password</h2>
                <form method="post" action="../controllers/update_password.php">
                    <label>
                        Password: <input type="password" name="passwd" placeholder="Your password"></label>
                    <br>
                    <input type="number" name="id" value="'.$_GET["id"].'" hidden>
                    <input type="submit" name="submit" value="Valid" class="button">
                </form>
            </section>';
        include '../views/footer.php';
    }
    else
    {
        $_SESSION['msg'] = "Error : User doesn't exist";
        header("Location: ../views/login.php");
        exit ();
    }
}
else
{
    $_SESSION['msg'] = "Error : Link invalide";
    header("Location: ../views/login.php");
    exit ();
}
?>