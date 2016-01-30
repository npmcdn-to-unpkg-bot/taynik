<?php namespace system\core;

use system\helpers\Defines;
use system\config\Config;

class Bootstrap {

    private $router;

    function __construct()
    {

        if (!$this->router)
        {

            new Config();
            new Defines();

            Db::init();

            $this->router = new Router();

        }

    }

    /**
     *
     */
    public function run ()
    {

        $this->router->start();

    }

}