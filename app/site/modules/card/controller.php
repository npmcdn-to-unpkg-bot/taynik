<?php

namespace app\site\modules\card;


use system\helpers\Functions;
use system\helpers\Settings;

class Controller
{

    public static function showListCard ($start = 0)
    {
        $res = Card::getListCard($start, Settings::get('cards', 'count_main'));
        $list  = array();

        foreach ($res as $value)
        {
            $value['full_text'] = $value['text'];
            $value['text'] = Functions::cut_paragraph($value['text'], 300);
            $list[] = $value;
        }

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