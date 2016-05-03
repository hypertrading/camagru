<?php
session_start();
include '../model/user_model_class.php';
$user = new User_model_class();
if ($_POST['submit'] != "OK" || $_POST['login'] == "" || $_POST['passwd'] == "" || $_POST['email'] == "")
{
	$_SESSION['msg'] = "Error : Form empty or partially";
	header("Location: ../views/register.php");
	exit ();
}
else {
	if ($user->check_form($_POST['login']) != FALSE && $user->check_form($_POST['passwd']) != FALSE && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) != FALSE)
	{
		if ($user->get_one_user($_POST['login']))
		{
			$_SESSION['msg'] = "Error : User already exist";
			header("Location: ../views/register.php");
			exit ();
		}
		else
		{
			$passwd = hash("whirlpool", $_POST['passwd']);
			if ($user->add_new_user($_POST['login'], $passwd, $_POST['email']) == FALSE)
			{
				$_SESSION['msg'] = "Error : Fail to add user in db";
				header("Location: ../views/register.php");
				exit ();
			}
			$_SESSION['msg'] = "Success";
			header("Location: ../views/login.php");
			exit ();
		}
	}
	$_SESSION['msg'] = "Error : Wrong format";
	header("Location: ../views/register.php");
	exit ();
}
?>
