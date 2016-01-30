<?php namespace system\core;


class Controller {

    public $view;
    public $data = array();
    public $user;

    public function __construct ()
    {

        $this->view = new View();

    }



    public function index(){}

} 