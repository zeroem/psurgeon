<?php

namespace Zeroem\CodeParser\PatternMatcher;

use Zeroem\CodeParser\Token;

interface PatternMatcherInterface
{
    /**
     * Process the next token
     *
     * @var Token $token
     *
     * @return boolean whether or not the token fits in the patter
     */
    function nextToken(Token $token);

    /**
     * is the pattern complete
     *
     * @return boolean
     */
    function complete();
}

