<?php
function query_get_one_user($db, $login)
{
    $query = "SELECT * FROM `users` WHERE login='".$login."'";
    $result = mysqli_query($db, $query);
    $result = mysqli_fetch_assoc($result);
    return $result;
}

function query_add_new_user($db, $login, $passwd, $email)
{
    $query = "INSERT INTO `users` (`login`, `passwd`, `email`)
	 				VALUES ('".$login."', '".$passwd."', '".$email."')";
    if (mysqli_query($db, $query))
        return TRUE;
    return FALSE;
}
?>