<?php

namespace TZ\Lib\SequenceChecker;

use TZ\Lib\Sequence\Sequence;

class ProgressionChainChecker implements SequenceCheckerInterface 
{
    private $checkers;

    public function __construct()
    {
        $this->checkers = array(
            new FibonacciNumbersChecker(),
            new ArithmeticalProgressionChecker(),
            new GeometricProgressionChecker(),
        );
    }

    public function isValid(Sequence $sequence)
    {
        foreach ($this->checkers as $checker) {
            if ($checker->isValid($sequence)) {
                return true;
            }
        }

        return false;
    }
}
