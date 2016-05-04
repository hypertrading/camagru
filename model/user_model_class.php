<?php
include 'model_class.php';
class User_model_class extends Model_class {
    function get_one_user($login)
    {
        $query = "SELECT * FROM `users` WHERE login='$login'";
        $result = $this->db->query($query)->fetch();
        return $result;
    }

    function add_new_user($login, $passwd, $email)
    {
        $query = "INSERT INTO `users` (`login`, `passwd`, `email`)
	 				VALUES ('$login', '$passwd', '$email')";
        if ($this->db->exec($query))
            return TRUE;
        return FALSE;
    }

    function auth($login, $passwd)
    {
        if ($user = $this->get_one_user($login))
        {
            $passwd = hash("whirlpool", $passwd);
            if ($passwd == $user['passwd'] && $user['status'] == 1)
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

    function check_form($str)
    {
        if (preg_match("/^\w{4,16}$/", $str) == 0)
            return FALSE;
        return TRUE;
    }

    function valid_acount($email)
    {
        $query = "UPDATE `users` SET `status`=1 WHERE `email`='$email'";
        if ($this->db->exec($query))
            return TRUE;
        return FALSE;
    }
}
?>