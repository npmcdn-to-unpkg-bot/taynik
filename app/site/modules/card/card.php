<?php
namespace app\site\modules\card;

use system\core\Db;

class Card
{

    public static function getCard ($id, $start, $limit)
    {

    }

    public static function getListCard ($start, $limit)
    {
        return Db::select('message', 1, null, $start, $limit);
    }

    public static function createCard ($data)
    {

    }

}