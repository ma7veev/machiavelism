<?php

namespace patterns;

class Controller
{
    protected $objects_namespace = '\default';

    public function call(string $action, string $object, array $options)
    {
        $action_path = $this->objects_namespace . '\\' . ucfirst($object) . 'Action';

        if (class_exists($action_path)) {
            if (method_exists($action_path, $action)) {
                return call_user_func_array($action_path . '::' . $action, $options);
            }
        }
    }
}