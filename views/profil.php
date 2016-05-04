<?php
include 'header.php';
?>
<section class="">
    <form method="get" action="../controllers/set_new_password.php">
        <input type="text" name="id" value="<?php echo $_SESSION['user']['id'];?>" hidden>
        <input type="text" name="login" value="<?php echo $_SESSION['user']['login'];?>" hidden>
        <input type="submit" class="button" value="change password">
    </form>
</section>
<?php
include 'footer.php';
?>
