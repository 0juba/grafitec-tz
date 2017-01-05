<?php

namespace TZ\Lib\SequenceChecker;

use TZ\Lib\Sequence\NumericSequence;
use TZ\Lib\Sequence\Sequence;

class ArithmeticalProgressionChecker implements SequenceCheckerInterface
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

        $delta = $elements[1] - $elements[0];
        for ($i = 2; $i < count($elements); $i++) {
            if ($delta !== ($elements[$i] - $elements[$i - 1])) {
                return false;
            }
        }

        return true;
    }
}
