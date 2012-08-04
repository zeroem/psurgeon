<?php

namespace Zeroem\Psurgeon\TokenMatcher\Logic;

use Zeroem\Psurgeon\TokenMatcher\TokenMatcherInterface;
use Zeroem\Psurgeon\Token;


class NegateTokenMatcher implements TokenMatcherInterface 
{
    private $matcher;

    public function __construct(TokenMatcherInterface $matcher) {
        $this->matcher = $matcher;
    }

    public function match(Token $token) {
        return !$this->matcher->match($token);
    }
}

