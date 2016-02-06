<?php
namespace app\site\modules\card;

use system\core\Db;
use system\helpers\Functions;

class Card
{

    public static function getCard ($id, $start, $limit)
    {

    }

    public static function getListCard ($start, $limit)
    {
        return Db::select('message', array('public' => 'on'), null, $start, $limit);
    }

    public static function createCard ($data)
    {

        $ip    = Db::select('message', array('ip' => Functions::get_IP_address()));
        $email = Db::select('message', array("sender" => $data['sender']));
        $dt    = date('Y-m-d h:i:s', time());
        $diff  = true;

        if (!empty($ip))
        {

            $diff = strtotime($dt) - strtotime($ip[0]['_date']);

            $diff = $diff > 86400;

        }
        elseif (!empty($email))
        {

            $diff = strtotime($dt) - strtotime($email[0]['_date']);

            $diff = $diff > 86400;

        }

        if (empty($ip) && empty($email) && $diff)
        {

            $hash = md5($dt);

            $data['_date'] = $dt;
            $data['_hash'] = $hash;
            $data['ip']    = Functions::get_IP_address();

            return Db::insert('message', $data);

        }
        else return false;

    }

}