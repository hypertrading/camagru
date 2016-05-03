<?php
include '../model/creation_model_class.php';
class CI_Controller{
    public $creation_model;
    function __construct()
    {
        session_start();
        $this->creation_model = new Creation_model_class();
    }

}
?>