<?php
session_start();
include '../model/user_model_class.php';
$user = new User_model_class();
if ($_POST['login'] == "" || $_POST['passwd'] == "" || $_POST['email'] == "")
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
			$to = $_POST['email'];
			$subject = "Welcome in Camagru";
			$message =  $message = '
							 	<html>
								<head>
									<title>Validation inscription</title>
								</head>
								<body>
								 	<h3>Hello ! You just register on Camagru</h3>
								 	<p>Plz valide you inscription on this link<a href="http://'.$_SERVER['SERVER_NAME'].':8080/camagru/controllers/valid_acount.php?email='.$to.'">Valid you acount</a></p>
								</body>
								</html>';
			$headers  = 'MIME-Version: 1.0' . "\r\n";
			$headers .= 'Content-type: text/html; charset=UTF8' . "\r\n";
			mail($to, $subject, $message, $headers);
			$_SESSION['msg'] = "Success, you just receved an email to finish you inscription";
			header("Location: ../views/login.php");
			exit ();
		}
	}
	$_SESSION['msg'] = "Error : Wrong format";
	header("Location: ../views/register.php");
	exit ();
}
?>
