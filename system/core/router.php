<?php namespace system\core;

use system\helpers\Settings;

/**
 * Класс маршрутизатор для определения запрашиваемой страницы.
 *
 * Цепляет классы контроллеров и моделей.
 * Создает экземпляры контролеров страниц и вызывает действия этих контроллеров.
 *
 */

class Router {

    private $controller = 'site';
    private $action = 'index';
    private $app;

    /**
     * Конструктор класса разбивает адресную строку на состовляющие и записывает их в переменные
     * $controller - контроллер
     * $action     - экшен
     * $app        - раздел сайта
     */

    function __construct ()
    {

        $start_uri = explode('/', $_SERVER['REQUEST_URI']);

        $uri_controller = 1;
        $uri_action = 2;

        /////////////////////////////////////////

        //Определяем имена контроллера экшена и параметров
        if (!empty($start_uri[$uri_controller]))
        {

            $ctr = trim($start_uri[$uri_controller]);

            $ctr = explode('?', $ctr);

            $ctr = array_shift($ctr);

            if($ctr != 'administrator')
            {

                $this->app = $this->controller;

                $uri_action = 1;

            }
            else
            {

                $this->app = 'administrator';

            }

        }
        else $this->app = $this->controller;

        Settings::set(array('app' => $this->app));

        if (!empty($start_uri[$uri_action]))
        {

            $a = $this->action;

            $a = trim($start_uri[$uri_action]);

            $a = explode('?', $a);

            $a = array_shift($a);

            if (!empty($a)) $this->action = $a;

        }

    }

    /**
     *Функция запускает контроллер и метод в ней, передает параметры
     */
    function start ()
    {

//        $file = Settings::get('routes', $this->app) . 'controllers' . DIR_SEP . strtolower($this->controller) . '.php';
        $file = Settings::get('routes', $this->app) . 'ctr.php';

        if (file_exists($file))
        {

            $action = $this->action;

//            $class_load = 'app\\' . $this->app . '\\controllers\\' . ucfirst($this->controller);

            $class_load = 'app\\' . $this->app . '\\Ctr';

            $controller = new $class_load();

            $controller->$action();

        }
        else
        {

            die('Нет такой страницы!');

        }

    }

} 