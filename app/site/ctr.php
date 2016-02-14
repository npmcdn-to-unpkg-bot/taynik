<?php

namespace app\site;

use app\site\modules\card\Card;
use system\core\Controller;

class Ctr extends Controller {

    function index ()
    {

        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {
            Card::createCard($_POST);
        }

        $this->data['cards'] = \app\site\modules\card\Controller::showListCard();
        $this->data['count_cards'] = Card::getCountCards();

        $this->view->generate(THEME . 'template.html', "", $this->data);

    }


    /**
     *Входные параметры card = hash, w = 1(получатель), 0(отправитель)
     */
    function card ()
    {

        if (isset($_GET['card']) && isset($_GET['w']))
        {
            $content = \app\site\modules\card\Controller::showCard($_GET['card'], $_GET['w']);
        }
        else $content = "<h1 style='text-align: center;'>Неверная ссылка</h1>";

        $this->data['count_cards'] = Card::getCountCards();

        $this->view->generate(THEME . 'template.html', $content, $this->data);

    }

}