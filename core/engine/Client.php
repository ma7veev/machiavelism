<?php

namespace engine;

use models\User;

class Client
{
    private $mode;
    private $module;
    private $moduleNamespace;
    private $session;
    private $enviropment;

    public function __construct(string $mode, string $module)
    {
        $this->mode = $mode;
        $this->module = $module;
        $this->moduleNamespace = '\\' . $this->module;
    }

    public function runAction(string $action, string $object, array $options)
    {
        $controllerName = $this->moduleNamespace . '\Controller';
        $controller = new $controllerName;

        $response = $controller->runAction($action, $object, $options);

        return $response->getOutput();
    }
}