<?php

namespace Zeroem\Psurgeon\TokenMatcher\Token;
use Zeroem\Psurgeon\TokenMatcher\TokenMatcherInterface;
use Zeroem\Psurgeon\Token;

class RegexTokenMatcher implements TokenMatcherInterface
{
    private $regex;

    public function __construct($regex) {
        $this->regex = $regex;
    }

    public function match(Token $token) {
        return preg_match($this->regex,$token->getText()) > 0;
    }
}

