<?php
include "../model/model_class.php";
function init_db()
{
    $create_table_users = "CREATE TABLE IF NOT EXISTS `users` (
                  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                  login VARCHAR(30) NOT NULL,
                  email VARCHAR(45) NOT NULL,
                  passwd varchar(255) NOT NULL,
                  droits INT(2) NOT NULL DEFAULT 0,
                  date_register TIMESTAMP)";
    $passwd_admin = hash('whirlpool', "root");
    $new_user_admin = "INSERT INTO `users` (`login`, `passwd`, `droits`) VALUES ('admin', '" . $passwd_admin . "', '1')";

    $create_table_creation = "CREATE TABLE IF NOT EXISTS `creation` (
                              id INT (6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                              id_user INT(6) NOT NULL,
                              date_creation TIMESTAMP)";

    $create_table_likes = "CREATE TABLE IF NOT EXISTS `likes` (
                              id INT (6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                              user_id INT(6) NOT NULL,
                              creation_id INT(6) NOT NULL,
                              date_liked TIMESTAMP)";

    $create_table_comments = "CREATE TABLE IF NOT EXISTS `comments` (
                  id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
                  comment VARCHAR (255) NOT NULL,
                  creation_id INT(6) NOT NULL,
                  user_id INT(6) NOT NULL,
                  date_creation TIMESTAMP)";
    require_once '../config/database.php';
    $setup_db = new setup_db();
    $tmp = new PDO('mysql:host=localhost;charset=utf8', $setup_db->get_USER(), $setup_db->get_PASSWORD());
    if ($tmp->exec("CREATE DATABASE IF NOT EXISTS camagru") === FALSE) {
        echo "Error creation database<br>";
        exit ();
    }
    else
    {
        echo "Connection to database camagru OK<br><hr>";
        $i = 0;
        $tmp = NULL;
        $connection = new Model_class();

        if ($connection->db->exec($create_table_users) !== FALSE)
        {
            echo "Table users OK<br>";
            if ($connection->db->exec($new_user_admin) === FALSE)
                echo "Error creation admin account<br>";
            else {
                echo "Admin account OK<br>";
                $i++;
            }
        }
        else
            echo "Error creation table users<br>";
        if ($connection->db->exec($create_table_creation) !== FALSE)
        {
            echo "Table creation OK<br>";
            $i++;
        }
        else
            echo "Error creation table creation<br>";
        if ($connection->db->exec($create_table_likes) !== FALSE)
        {
            echo "Table likes OK<br>";
            $i++;
        }
        else
            echo "Error creation table likes<br>";
        if ($connection->db->exec($create_table_comments) !== FALSE)
        {
            echo "Table comments OK<br>";
            $i++;
        }
        else
            echo "Error creation table comments<br>";
        if($i == 4) {
            echo "<hr>Init website Camagru COMPLETED<br>";
            echo "<a href='../views/home.php?page=0'>Go home</a>";
        }
        else
            echo 'Init Failure. Sorry';
    }
}
init_db();


?>