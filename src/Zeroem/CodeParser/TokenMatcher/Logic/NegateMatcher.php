<?php

namespace Zeroem\CodeParser\TokenMatcher\Logic;

use Zeroem\CodeParser\TokenMatcher\TokenMatcherInterface;
use Zeroem\CodeParser\Token;


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

