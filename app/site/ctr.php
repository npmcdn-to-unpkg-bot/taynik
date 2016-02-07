<?php

namespace app\site;

use app\site\modules\card\Card;
use system\core\Controller;

class Ctr extends Controller {

    function index ()
    {

        $content = \app\site\modules\card\Controller::showListCard();

        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {
            Card::createCard($_POST);
        }

        if (isset($_GET['card']))
        {
            $content = \app\site\modules\card\Controller::showCard($_GET['card']);
        }

        $this->view->generate(THEME . 'template.html', $content, $this->data);

    }

}