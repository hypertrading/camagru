<?php
session_start();
include '../model/user_model_class.php';
$user = new User_model_class();
if(isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL) == TRUE)
{
    $acount = $user->get_one_by_email($_POST['email']);
    if (isset($acount['login']))
    {
        $login = $acount['login'];
        $id = $acount['id'];
        $to = $_POST['email'];
        $subject = "New password on camagru";
        $message =  $message = '
							 	<html>
								<head>
									<title>New password</title>
								</head>
								<body>
								 	<h3>Hello ! Apparently you lost you password.</h3>
								 	<p>Use this link to set a new password.
								 	<a href="'.$_SERVER['SERVER_NAME'].'/camagru/controllers/set_new_password.php?login='.$login.'&id='.$id.'" onclick="javascript:event.target.port=8080">New password</a></p>
								</body>
								</html>';
        $headers  = 'MIME-Version: 1.0' . "\r\n";
        $headers .= 'Content-type: text/html; charset=UTF8' . "\r\n";
        mail($to, $subject, $message, $headers);
        $_SESSION['msg'] = "You will receved a email to reset you password.";
        header("Location: ../views/login.php");
        exit ();
    }
}

$_SESSION['msg'] = "Error : Invalid";
header("Location: ../views/lost_password.php");
exit ();
?>