<?php

namespace game;

use client\Response;

class Action extends \patterns\Action
{

    public static function runDefault(string $action, string $object, Input $input)
    {
        $response = new Response(404);
        $model_path = '\game\objects\\' . ucfirst($object);
        if (class_exists($model_path)) {
            $model = new $model_path($input);
            $result = call_user_func([$model, 'check']);
            if (!empty($result)) {
                $response->setCode(200);
                $response->setData($result);
            }
        }

        return $response;
    }
}