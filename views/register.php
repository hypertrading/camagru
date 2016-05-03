<?php
include "header.php";
?>
<section class="main">
    <h2>Register</h2>
    <form method="post" action="../controllers/create_user.php">
        <label>
            Email: <input type="email" name="email" placeholder="Your email"></label><br>
        <label>
            Pseudo: <input type="text" name="login" placeholder="Your pseudo"><br>
        <label>
            Password: <input type="password" name="passwd" placeholder="Your password"></label><br>
        <input type="submit" name="submit" value="Register" class="button">
    </form>
</section>
<?php
include 'footer.php';
?>