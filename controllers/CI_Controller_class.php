<?php
include '../model/creation_model_class.php';
class CI_Controller{
    public $creation_model;
    function __construct()
    {
        $this->creation_model = new Creation_model_class();
    }

}
?>