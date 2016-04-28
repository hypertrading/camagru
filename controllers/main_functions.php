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

function check_form($str)
{
    if (preg_match("/^\w{4,16}$/", $str) == 0)
        return FALSE;
    return TRUE;
}

function auth($login, $passwd)
{
    if (!$db = db_init())
    {
        $_SESSION['msg'] = "DB Unloaded";
        header("Location: index.php");
        exit ();
    }
    if ($user = query_get_one_user($db, $login))
    {
        $passwd = hash("whirlpool", $passwd);
        if ($passwd == $user['passwd'])
        {
            if ($user['droits'] == 1)
                $_SESSION['admin'] = 1;
            return TRUE;
        }
        return FALSE;
    }
    return FALSE;
}
?>