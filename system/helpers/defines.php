<?php namespace system\helpers;

class Defines {

    public function __construct()
    {
        //Пути
        define('THEME', BASE_DIR . 'app' . DIR_SEP . 'site' . DIR_SEP. 'themes' . DIR_SEP . Settings::get('theme_site') . DIR_SEP );
        define('MODULES', BASE_DIR . 'app' . DIR_SEP . 'site' . DIR_SEP. 'modules' . DIR_SEP );

        //
        define('PROTOCOL', ((!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] != 'off') || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://");
        define('DOMAIN', PROTOCOL . $_SERVER['HTTP_HOST'] . '/');
    }

}