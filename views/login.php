<?php
session_start();
if(isset($_SESSION['user']['login']))
{
    header("Location: ../views/home.php?page=0");
    exit ();
}
include "header.php";
?>
<section class="">
    <h2>Log-in</h2>
    <form method="post" action="../controllers/log_user.php">
        <label>
            Pseudo: <input type="text" name="login" placeholder="Your pseudo"></label><br>
        <label>
            Password: <input type="password" name="passwd" placeholder="Your password"></label>
        <br>
        <input type="submit" name="submit" value="Connection" class="button">
        <br>
        <a href="lost_password.php">Forget your password ?</a>
    </form>
</section>
<?php
include 'footer.php';
?>