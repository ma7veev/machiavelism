<?php

namespace game;

use config\ConfigAdapter;

/**
 * Class Input
 * @package game
 */
class Input extends \patterns\Input
{
    /**
     * @return void
     */
    protected function setConfig()
    {
        $params = ConfigAdapter::getConfig('input');
        if (isset($params[ 'game' ])) {
            $this->config = $params[ 'game' ];
        }
    }
}