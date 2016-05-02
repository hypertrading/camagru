<?php
session_start();
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
            $_SESSION['user'] = $user;
            if ($user['droits'] == 1)
                $_SESSION['admin'] = 1;
            return TRUE;
        }
        return FALSE;
    }
    return FALSE;
}

function get_user_creation($id)
{
    if ($db = db_init())
    {
        include '../model/creation_query.php';
        $result = query_get_user_creation($db, $id);
        return $result;
    }
    $_SESSION['msg'] = "Error : DB Unloaded";
    return FALSE;
}

function new_creation($id_user){
    if ($db = db_init())
    {
        include '../model/creation_query.php';
        $result = query_new_creation($db, $id_user);
        return $result;
    }
    $_SESSION['msg'] = "Error : DB Unloaded";
    return FALSE;
}

function pagination()
{
    if ($db = db_init())
    {
        include '../model/creation_query.php';
        $count = query_count_creation($db);
        $count = $count['COUNT(id)'];
        $nb_page = ceil($count / 5);
        return $nb_page;
    }
    $_SESSION['msg'] = "Error : DB Unloaded";
    return FALSE;
}

function get_all_creation($page)
{
    if ($db = db_init())
    {
        $result = query_get_all_creation($db, $page);
        return $result;
    }
    $_SESSION['msg'] = "Error : DB Unloaded";
    return FALSE;
}

function get_comment($id)
{
    if ($db = db_init())
    {
        $comment = query_get_comment($db, $id);
        return $comment;
    }
    $_SESSION['msg'] = "Error : DB Unloaded";
    return FALSE;
}
?>