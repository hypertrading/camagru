<?php
include 'CI_Controller_class.php';
class montage extends CI_Controller{
    function get_user_creation($id)
    {
        $result = $this->creation_model->get_user_creation($id);
        return $result;
    }

}
?>