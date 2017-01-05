<?php

use TZ\Cli\InputArgs;
use TZ\Lib\Sequence\NumericSequence;
use TZ\Lib\SequenceChecker\ProgressionChainChecker;

$loader = require_once __DIR__ . "/../vendor/autoload.php";

try {
    $inputArgs = InputArgs::read($argv);
    $sequence = NumericSequence::createFromString($inputArgs->getArg('seq'));
    $checker = new ProgressionChainChecker();

    if ($checker->isValid($sequence)) {
        echo PHP_EOL, 'Sequence is a PROGRESSION.', PHP_EOL;
    } else {
        echo PHP_EOL, 'Sequence is NOT a progression.', PHP_EOL;
    }
} catch (\Exception $e) {
    echo PHP_EOL, 'Error occurred: ', $e->getMessage(), PHP_EOL;
}
