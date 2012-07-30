<?php

namespace Zeroem\CodeParser\Matcher\Token;
use Zeroem\CodeParser\Matcher\MatcherInterface;
user Zeroem\CodeParser\Token;

class RegexMatcher implements MatcherInterface
{
    private $regex;

    public function __construct($regex) {
        $this->regex = $regex;
    }

    public function match(Token $token) {
        return preg_match($this->regex,$token->getText()) > 0;
    }
}

