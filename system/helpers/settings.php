<?php namespace system\helpers;

/**
 * Class Settings
 * @package system\classes
 *
 * Класс обработки настроек движка
 *
 */

class Settings {

    private static $settings;

    /**
     * @param $params
     *
     * Функция загружает настройки определенные в классе Config
     *
     */
    public static function add ($params)
    {

        self::$settings = $params;

    }

    /**
     * @param $params
     *
     * Функция для добавления или изменения настроек
     *
     */

    public static function  set ($params)
    {

        if ($params)
        {

            foreach ($params as $key => $value)
            {

                if (is_array($key))
                {

                    foreach ($key as $key2 => $value2)
                    {

                        self::$settings[$key][$key2] = $value2;

                    }

                }
                else
                {

                    self::$settings[$key] = $value;

                }

            }

        }

    }

    /**
     * @param $param1
     * @param null $param2
     * @return mixed
     *
     * Функция для получения настроек
     *
     */

    public static function get ($param1, $param2 = null)
    {

        if (empty($param2))
        {

            return self::$settings[$param1];

        }
        else
        {

            return self::$settings[$param1][$param2];

        }

    }

} 