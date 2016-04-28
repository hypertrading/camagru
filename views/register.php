<?php
include "header.php";
?>
<section class="main">
    <h3>Register</h3>
    <form method="post" action="create.php">
        <label>
            Email: <input type="email" name="email" placeholder="Your email"></label><br>
        <label>
            Pseudo: <input type="text" name="login" placeholder="Your pseudo"><br>
        <label>
            Password: <input type="password" name="passwd" placeholder="Your password"></label><br>
        <input type="submit" name="submit" value="OK">
    </form>
</section>