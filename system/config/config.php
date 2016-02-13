<?php namespace system\config;

use system\helpers\Settings;

/**
 * Class Config
 * @package system\config
 *
 * Класс конфигурация движка
 *
 */

class Config {

    private $conf;

    function __construct()
    {

        $this->conf = array(

            'site_enable'   => true,
            'theme_site'    => 'default',
            'theme_admin'   => 'default',

            'db' => array(
                'db_host'    => '127.0.0.1',
                'db_name'    => 'taynik',
                'db_login'   => 'root',
                'db_pass'    => 'root',
                'db_charset' => 'utf8',
                'db_prefix'  => 'tnk_'
            ),

            'routes' => array(
                'site' => BASE_DIR . 'app' . DIR_SEP . 'site' . DIR_SEP,
                'administrator' => BASE_DIR . 'app' . DIR_SEP . 'administrator' . DIR_SEP
            ),

            'meta'   => array(
                'description' => 'descriptions meta',
                'keywords'    => 'keywords meta'
            ),

            'cards' => array(
                'count_main'  => 10
            )

        );

        Settings::add($this->conf);

    }

}