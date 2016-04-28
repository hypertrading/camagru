<?php
session_start();
include "main_functions.php";
include '../model/user_query.php';
if ($_POST['submit'] != "OK" || $_POST['login'] == "" || $_POST['passwd'] == "" || $_POST['email'] == "")
{
	$_SESSION['msg'] = "ERROR CREATE_USER (form empty or partially)";
	header("Location: ../views/register.php");
	exit ();
}
else {
	if (check_form($_POST['login']) != FALSE && check_form($_POST['passwd']) != FALSE && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) != FALSE)
	{
		if (!$db = db_init())
		{
			$_SESSION['msg'] = "DB Unloaded";
			header("Location: ../views/register.php");
			exit ();
		}
		if (query_get_one_user($db, $_POST['login']))
		{
			$_SESSION['msg'] = "User already exist";
			header("Location: ../views/register.php");
			exit ();
		}
		else
		{
			$passwd = hash("whirlpool", $_POST['passwd']);
			if (query_add_new_user($db, $_POST['login'], $passwd, $_POST['email']) == FALSE)
			{
				$_SESSION['msg'] = "FAILED TO ADD USER IN DB";
				header("Location: ../views/register.php");
				exit ();
			}
			$_SESSION['msg'] = "SUCCESS";
			header("Location: ../views/login.php");
			exit ();
		}
	}
	$_SESSION['msg'] = "WRONG FORMAT";
	header("Location: ../views/register.php");
	exit ();
}
?>
