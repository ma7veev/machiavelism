<?php

namespace client;

final class Response
{
    private $data = [];
    private $success = 1;
    private $code = 200;
    private $message = '';

    public function __construct($code, $data = [], $message = '')
    {
        $this->code = $code;
    }

    public function getOutput()
    {
        return [
            'data'    => $this->data,
            'success' => $this->success,
            'code'    => $this->code,
            'message' => $this->message,
        ];
    }
}