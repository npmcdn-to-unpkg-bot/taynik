<?php

namespace app\site\modules\user;

use system\core\Db;
use system\helpers\Functions;

class User
{

    public static function registration ($data)
    {
        if (Db::select('users', array('login' => $data['login'])))
            return 'login';
        elseif(Db::select('users', array('email' => $data['email'])))
            return 'email';
        else
        {
            $data['password'] = Functions::hashPassword($data['password']);

            return Db::insert('users', $data);
        }
    }

    public static function login ($data)
    {
        if (!$_SESSION['auth'])
        {
            $pass = Functions::hashPassword($data['password']);

            if ($user = Db::select('users', array('login' => $data['login'], 'password' => $pass)))
            {
                $_SESSION['auth'] = true;
                $_SESSION['uh']   = Functions::hashPassword(time());
                $_SESSION['name'] = $user[0]['name'];

                return true;
            }else return false;
        }
    }
}