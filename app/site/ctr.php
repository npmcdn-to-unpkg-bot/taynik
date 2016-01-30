<?php

namespace app\site;

use system\core\Controller;

class Ctr extends Controller {

    function index ()
    {

        $content = \app\site\modules\card\Controller::showListCard();

        $this->view->generate(THEME . 'template.html', $content, $this->data);

    }

}