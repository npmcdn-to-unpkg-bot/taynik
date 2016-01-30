<?php namespace system\helpers;


class Filter {


    /**
     * @param $db
     * @param $value
     * @return string
     *
     * Функция для фильтрации переменных идущих в запросе БД
     *
     */
    public static function fQuote($db, $value) {

        if (!is_numeric($value)) {

            $value = self::fString($value);

            $value = "'".mysqli_real_escape_string($db, $value)."'";

        }

        return $value;

    }

    /**
     * @param $string
     * @return string
     *
     * Функция фильтрации строк
     *
     */
    public static function fString($string)
    {

        if (is_array($string))
        {
            $arr = array();

            foreach ($string as $key => $value)
            {

                $arr[$key] = self::fString($value);

            }

            return $arr;

        }
        else
        {

            $string = strip_tags($string);
            $string = htmlspecialchars($string, ENT_NOQUOTES);
            $string = nl2br($string);

        }

        return $string;

    }

} 