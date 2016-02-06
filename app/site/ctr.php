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

        $content = \app\site\modules\card\Controller::showListCard();

        $this->view->generate(THEME . 'template.html', $content, $this->data);

    }

}