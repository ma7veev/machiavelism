<?php

namespace patterns;

use client\Response;
use exceptions\ParamsException;

abstract class Controller
{
    protected $config;
    protected $objects_namespace = '\default';
    protected $default_action_path = 'DefaultAction';
    protected $default_action = 'default';
    protected $input_path = 'DefaultInput';

    public function __construct()
    {
        $this->setConfig();
    }

    public function runAction(string $action, string $object, array $options)
    {
        $action_path = $this->objects_namespace . '\\' . ucfirst($object) . 'Action';

        $inputName = $this->input_path;
        try {
            if (!class_exists($inputName)) {
                return new Response(406);
            }
            $input = new $inputName($options);
        } catch (ParamsException $e) {
            return new Response(406);
        }
        if (class_exists($action_path)) {
            if (method_exists($action_path, $action)) {
                return call_user_func($action_path . '::' . $action, $input);
            }
        }
        if (class_exists($this->default_action_path) && method_exists($this->default_action_path, $this->default_action)) {
            return call_user_func($this->default_action_path . '::' . $this->default_action, $action, $object, $input);
        }

        return new Response(404);
    }

    abstract protected function setConfig();
}