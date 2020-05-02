<?php

use engine\Client;

function call($module, $action, $object, ...$options)
{
    if (isset($options[0])){
        $options = $options[ 0 ];
    }
    // $session = new Session();
    $client = new Client('console', $module);
    // $client->setSession();
    $out = $client->runAction($action, $object, $options);

    return $out;
}