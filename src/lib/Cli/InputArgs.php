<?php

namespace TZ\Lib\Cli;

class InputArgs
{
    private $rawArgs;
    private $args;

    private function __construct(array $args)
    {
        $this->rawArgs = $args;
        $this->args = array();
    }

    public static function read(array $args)
    {
        $inputArgs = new static($args);

        foreach ($inputArgs->rawArgs as $arg) {
            $matches = array();
            if (preg_match('/--([a-z]+)=([a-z0-9,.\/\-]*)/iu', $arg, $matches)) {
                $inputArgs->args[$matches[1]] = $matches[2];
            }
        }

        return $inputArgs;
    }

    public function getArg($argName)
    {
        if (array_key_exists($argName, $this->args)) {
            return $this->args[$argName];
        }

        throw new \Exception('Invalid argument');
    }
}
