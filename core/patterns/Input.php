<?php

namespace patterns;

abstract class Input
{
    protected $config = [];

    public function __construct(array $params)
    {
        $this->setConfig();
        foreach ($params as $property => $value) {
            $method_name = 'set' . ucfirst($property);
            if (property_exists($this, $property) && method_exists($this, $method_name) && isset($this->config[ $property ])) {
                $value = $this->filterProperty($property, $value);
                call_user_func($method_name, $value);
            }
        }
    }

    private function filterProperty($property, $value)
    {
        return $value;
    }

    abstract protected function setConfig();
}