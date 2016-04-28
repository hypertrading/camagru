<?php
include "header.php";
?>
<section class="">
    <h3>Log-in</h3>
    <form method="post" action="logging.php">
        <label>
            Pseudo: <input type="text" name="pseudo" placeholder="Your pseudo"></label><br>
        <label>
            Password: <input type="password" name="passwd" placeholder="your password"></label>
        <input type="submit" name="submit" value="OK">
    </form>
</section>