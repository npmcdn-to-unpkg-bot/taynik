<?php namespace system\core;

/**
 * Class View
 * @package system\core
 *
 * Класс родитель для генерации страницы
 *
 */

class View {

    function generate ($template, $content, $data)
    {

        extract($data);

        require_once $template;

    }

} 