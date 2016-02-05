<?php

namespace app\site;

use system\core\Controller;

class Ctr extends Controller {

    function index ()
    {

        if ($_SERVER['REQUEST_METHOD'] == "POST")
        {

            var_dump($_POST);

        }

        $content = \app\site\modules\card\Controller::showListCard();

        $this->view->generate(THEME . 'template.html', $content, $this->data);

    }

}