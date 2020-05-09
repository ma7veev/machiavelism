<?php

namespace game;

use client\Response;
use config\ConfigAdapter;

class Controller extends \patterns\Controller
{
    protected $objects_namespace = '\game\objects';
    protected $default_action_path = '\game\Action';
    protected $default_action = 'runDefault';
    protected $input_path = '\game\Input';


    protected function setConfig()
    {
        $actions = ConfigAdapter::getConfig('actions');
        if (isset($actions[ 'game' ])) {
            $this->config = $actions[ 'game' ];
        }
    }
}