<?php
namespace app\site\modules\card;

use system\helpers\Settings;
use system\helpers\Vk;
use system\core\Db;
use system\helpers\Functions;
use system\helpers\SendMail;

class Card
{

    //Получение одной карточки
    public static function getCard ($hash, $who)
    {

        $res = Db::select('message', array('_hash' => $hash));

        if (!empty($res)) self::setReading($res[0], $who);

        return $res;
    }

    //Получение списка карточек
    public static function getListCard ($start, $limit)
    {
        return Db::select('message', array('public' => 'on'), null, $start, $limit);
    }

    //Получение количества карточек
    public static function getCountCards ()
    {
        return count(Db::select('message'));
    }

    //Отправка сообщения и создание карточки
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

            if (self::sendMail($data))
            {
                self::sendVk($data);
                return Db::insert('message', $data);
            }
            else return false;

        }
        else return false;

    }

//-------------------------------------------------------------------------------
//-------------------------------------------------------------------------------

    //Отправка сообщения по email
    private static function sendMail ($data)
    {

        $link_r = PROTOCOL . $_SERVER['HTTP_HOST'] . "/card?card=" . $data['_hash'] . "&w=1#anc";
        $link_s = PROTOCOL . $_SERVER['HTTP_HOST'] . "/card?card=" . $data['_hash'] . "&w=0#anc";

        ob_start();
        require MODULES . "card" . DIR_SEP . "html" . DIR_SEP . "card_mail_r.html";
        $message_r = ob_get_clean();

        ob_start();
        require MODULES . "card" . DIR_SEP . "html" . DIR_SEP . "card_mail_s.html";
        $message_s = ob_get_clean();

        if (SendMail::send($data['receiver'], "анонимное сообщение", $message_r) &&
            SendMail::send($data['sender'], "анонимное сообщение", $message_s))
            return true;
        else return false;

    }

    //Отправка сообщения на стену в ВК
    private static function sendVk ($data)
    {

        $vk = new Vk(Settings::get('vk', 'access_token'));
        $link = PROTOCOL . $_SERVER['HTTP_HOST'] . "/card?card=" . $data['_hash'] . "&w=1#anc";

        $params = array(
            "owner_id"   => Settings::get('vk', 'wall_id'),
            "from_group" => 1,
            "message"    => $data['text'] . "  " . $link,
        );

        $vk->method("wall.post", $params);

    }

    //Ставит статус карточке "прочтено"
    private static function setReading ($data, $who)
    {
        if ($data['reading'] == 0 && $who == 1)
        {
            Db::edit('message', array('_hash' => $data['_hash']), array('reading' => 1));
        }
    }
}