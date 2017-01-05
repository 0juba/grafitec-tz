<?php

namespace TZ\Lib\SequenceChecker;

use TZ\Lib\Sequence\NumericSequence;
use TZ\Lib\Sequence\Sequence;

class FibonacciNumbersChecker implements SequenceCheckerInterface
{
    const MIN_SEQUENCE_SIZE = 3;

    public function isValid(Sequence $sequence)
    {
        if (!$sequence instanceof NumericSequence) {
            throw new \InvalidArgumentException('Expected numeric sequence.');
        }

        $elements = $sequence->getElements();

        if (self::MIN_SEQUENCE_SIZE > count($elements)) {
            throw new \Exception('Sequence should contain at least 3 elements.');
        }

        for ($i = 2; $i < count($elements); $i++) {
            // Is this Fibonacci number?
            if (!$this->isFibonacci($elements[$i])) {
                return false;
            }

            // We want sequence!
            if ($elements[$i] !== $elements[$i - 1] + $elements[$i - 2]) {
                return false;
            }
        }

        return true;
    }

    private function isFibonacci($number)
    {
        switch ($number) {
            case 1:
            case 2:
            case 3:
            case 5:
            case 8:
                return true;
            default:
                return
                    $this->isPerfectSquare(5 * $number * $number - 4) ||
                    $this->isPerfectSquare(5 * $number * $number + 4);
        }
    }

    private function isPerfectSquare($number)
    {
        if (0 > $number) {
            throw new \InvalidArgumentException('Number should be greater or equal 0.');
        }

        $s = sqrt($number);

        return $s * $s === $number;
    }
}
