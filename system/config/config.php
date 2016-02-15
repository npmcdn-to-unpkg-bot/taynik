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
                'count_main'  => 6
            ),

            'vk'   => array(
                'active'       => false,
                'access_token' => "b31ff4df6b9f7ca65fac411efeb843d0a188f4c21e8fd0b8a2842b85b215eb353399a6f056ae3dca06c9c",
                'wall_id'      => "-114636226"
            )

        );

        Settings::add($this->conf);

    }

}