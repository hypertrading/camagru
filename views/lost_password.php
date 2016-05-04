<?php
include "header.php";
?>
<section class="">
    <h2>Lost password</h2>
    <form method="post" action="../controllers/send_passw.php">
        <label>
            Email: <input type="email" name="email" placeholder="Your email"></label><br>
        <br>
        <input type="submit" name="submit" value="Send" class="button">
    </form>
</section>
