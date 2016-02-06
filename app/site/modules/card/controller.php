<?php

namespace app\site\modules\card;


use system\helpers\Settings;

class Controller
{

    public static function showListCard ()
    {
        $list = Card::getListCard(0, Settings::get('cards', 'count_main'));

        ob_start();

        require_once MODULES . "card" . DIR_SEP . "html" . DIR_SEP . "card_list.html";

        return ob_get_clean();

    }

}