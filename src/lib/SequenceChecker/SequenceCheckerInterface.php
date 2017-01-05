<?php

namespace TZ\Lib\SequenceChecker;

use TZ\Lib\Sequence\Sequence;

interface SequenceCheckerInterface
{
    public function isValid(Sequence $sequence);
}
