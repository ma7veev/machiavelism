<?php

namespace game\objects;

use client\Response;
use game\Input;

class WarAction extends \patterns\Action
{
    public static function start(Input $input)
    {
        return new Response(204);
    }

    public static function cancel(Input $input)
    {
        return new Response(204);
    }
}