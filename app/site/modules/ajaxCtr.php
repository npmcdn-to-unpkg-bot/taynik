<?php

namespace app\site\modules;

use app\site\modules\card\Controller;

require_once $_SERVER['DOCUMENT_ROOT'] . '/ajax.php';

try{

    $response = array();

    switch($_POST['action']) {

        case 'loadCards' :
            $response = loadCards();
            break;

        default :
            $response = false;
    }

    echo $response;

}
catch (Exception $e)
{

    die(json_encode(array('error' => $e->getMessage())));

}

function loadCards ()
{

    return Controller::showListCard($_POST['start']);

}