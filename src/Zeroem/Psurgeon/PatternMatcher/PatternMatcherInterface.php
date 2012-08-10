<?php

namespace Zeroem\Psurgeon\PatternMatcher;

use Zeroem\Psurgeon\Token;

interface PatternMatcherInterface
{
    /**
     * Process the next token
     *
     * @var Token $token
     *
     * @return boolean whether or not the token fits in the patter
     */
    public function nextToken(Token $token);

    /**
     * is the pattern complete
     *
     * @return boolean
     */
    public function complete();
}

