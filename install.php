<?php
session_start();
include "controllers/main_functions.php";

$create_table_users = "CREATE TABLE `users` (
              id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
              login VARCHAR(30) NOT NULL,
              email VARCHAR(45) NOT NULL,
              passwd varchar(255) NOT NULL,
              droits INT(2) NOT NULL DEFAULT 0,
              date_register TIMESTAMP)";
$passwd_admin = hash('whirlpool', "root");
$new_user_admin = "INSERT INTO `users` (`login`, `passwd`, `droits`) VALUES ('admin', '".$passwd_admin."', '1')";

$create_table_creation = "CREATE TABLE `creation` (
                          id INT (6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                          nom VARCHAR(30) NOT NULL,
                          id_user INT(6) NOT NULL,
                          date_creation TIMESTAMP)";

/*$server = "mysql-hypertrading.alwaysdata.net";
$username = "121422";
$passwd = "rootme42";*/
$server = "localhost";
$username = "root";
$passwd = "";
if (!$db = mysqli_connect($server, $username, $passwd))
{
    echo "Failure in connection server initial !";
}
else
{
    if (!mysqli_query($db, "CREATE DATABASE IF NOT EXISTS camagru"))
    {
        echo "Error creation database<br>";
        exit ();
    }
    else
    {
        echo "Creation database ok<br>";
        mysqli_close($db);
    }
    if ($db = db_init())
    {
        $requete = mysqli_query($db, "SHOW TABLES LIKE 'users' ");
        if (mysqli_num_rows($requete) != 1) {
            if (mysqli_query($db, $create_table_users))
            {
                echo "Table users ok<br>";
                if (mysqli_query($db, $new_user_admin))
                    echo "Admin account ok<br>";
                else
                    echo "Error creation admin account<br>";
            }
            else
                echo "Error creation table users<br>";
        }
        else
            echo "Table users already exists<br>";
        $requete = mysqli_query($db, "SHOW TABLES LIKE 'creation' ");
        if (mysqli_num_rows($requete) != 1) {
            if (mysqli_query($db, $create_table_creation))
                echo "Table creation ok<br>";
            else
                echo "Error creation table users<br>";
        }
        else
            echo "Table users already exists<br>";
    }
    else
        echo "Failure in connection database camagru !";
}

?>
<a href="index.php"><button>Allez vers l'index</button></a>
