<?php

namespace config;

/**
 * Class ConfigAdapter
 * @package config
 */
class ConfigAdapter
{
    private static $path = '/..';
    private static $map = [
        'actions' => 'php',

    ];

    /**
     * @param string $name
     * @static
     * @return array
     */
    public static function getConfig(string $name)
    : array
    {
        $map = self::$map;
        if (isset($map[ $name ])) {
            $data = require(__DIR__ . static::$path . "/$name." . $map[ $name ]);
            if (!empty($data)) {
                switch ($map[ $name ]) {
                    case 'php':
                    default:
                        return self::parsePHP($data);
                }
            }
        }

        return [];
    }

    /**
     * @param $data
     * @static
     * @return array
     */
    private static function parsePHP($data)
    :array
    {
        if (is_array($data)) {
            return $data;
        }

        return [];
    }
}