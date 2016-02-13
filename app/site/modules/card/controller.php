<?php

namespace app\site\modules\card;


use system\helpers\Settings;

class Controller
{

    public static function showListCard ($start = 0)
    {
        $list = Card::getListCard($start, Settings::get('cards', 'count_main'));

        ob_start();

        require_once MODULES . "card" . DIR_SEP . "html" . DIR_SEP . "card_list.html";

        return ob_get_clean();

    }

    public  static function showCard ($hash, $who)
    {
        $card = Card::getCard($hash, $who);

        ob_start();

        require_once MODULES . "card" . DIR_SEP . "html" . DIR_SEP . "card.html";

        return ob_get_clean();
    }

}