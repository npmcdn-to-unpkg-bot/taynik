<?php
//запускаю сессию
session_start();


date_default_timezone_set('Etc/GMT-6');

//отображаю ошибки

// error_reporting(E_ERROR | E_WARNING | E_PARSE);
error_reporting(E_ALL);

ini_set('display_errors', 1);

//проверяю версию php
if(version_compare(phpversion(), '5.3.0', '<') == true) {
    die('PHP >= 5.3.0 Only (Версия пхп должна быть >= 5.3.0)');
}

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

$boot = new \system\core\Bootstrap();

$boot->run();