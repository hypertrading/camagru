<?php
include 'CI_Controller_class.php';
class home extends CI_Controller{
    function pagination()
    {
        $count = $this->creation_model->count_creation();
        $count = $count['COUNT(id)'];
        $nb_page = ceil($count / 5);
        return $nb_page;
    }

    function get_all_creation($page)
    {
        $result = $this->creation_model->get_all_creation($page);
        return $result;
    }

    function get_comment($id)
    {
        $comment = $this->creation_model->get_comment($id);
        return $comment;
    }

    function already_like($creation_id, $user_id)
    {
        if ($this->creation_model->already_like($creation_id, $user_id) == TRUE)
            return TRUE;
        return FALSE;
    }

    function like_it($creation_id, $user_id){
        if ($this->creation_model->liked($creation_id, $user_id))
        {
            header('Location: ' . $_SERVER['HTTP_REFERER']);
            exit ();
        }
        $_SESSION['msg'] = "Error, you can't like it. Blame the fucking developpeur";
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        exit ();
    }
}
?>