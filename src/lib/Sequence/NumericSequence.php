<?php

namespace TZ\Lib\Sequence;

class NumericSequence implements Sequence
{
    private $numbers;

    public static function createFromString($stringSequence, $delimiter = ',')
    {
        $sequence = new static();
        $numbers = array_map('trim', explode($delimiter, $stringSequence));

        foreach ($numbers as $i => $number) {
            if (!is_numeric($number)) {
                throw new \Exception(sprintf('Invalid value "%s". Only numbers allowed.', $number));
            }

            if (false !== strpos($number, '.')) {
                $number = (float)$number;
            } else {
                $number = (int)$number;
            }

            $numbers[$i] = $number;
        }

        $sequence->numbers = $numbers;

        return $sequence;
    }

    private function __construct(array $array = array(), $flags = 0)
    {
    }

    public function getElements()
    {
        return $this->numbers;
    }
}
