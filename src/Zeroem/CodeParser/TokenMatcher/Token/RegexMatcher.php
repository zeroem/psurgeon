<?php

namespace Zeroem\CodeParser\TokenMatcher\Token;
use Zeroem\CodeParser\TokenMatcher\TokenMatcherInterface;
user Zeroem\CodeParser\Token;

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

