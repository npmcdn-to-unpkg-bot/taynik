<?php

//запускаю сессию
session_start();

error_reporting(E_ERROR);

//Автозагрузка классов
spl_autoload_register( function($class){

    if(!require_once str_replace('\\', DIRECTORY_SEPARATOR , strtolower($class)) . '.php')
    {

        throw new Exception("Нет такого класса");

    }

});

define('DIR_SEP', DIRECTORY_SEPARATOR);
define('BASE_DIR', __DIR__ . DIR_SEP);

//запускаю загрузчик

new \system\core\Bootstrap();