<?php
function db_init()
{
    //$server = "mysql-hypertrading.alwaysdata.net";
    //$username = "121422";
    //$passwd = "rootme42";

    $server = "localhost";
    $username = "root";
    $passwd = "";
    $dbname = "camagru";
    if (!$db = mysqli_connect($server, $username, $passwd, $dbname))
    return FALSE;
    return ($db);
}
?>