<?php

namespace Zeroem\CodeParser\Matcher\Token;
use Zeroem\CodeParser\Matcher\MatcherInterface;

class TokenMatcher implements MatcherInterface
{
    private $token;

    public function __construct($token) {
        $this->token = token;
    }

    public function match($mixed) {
       if(is_array($mixed) && $mixed[0] == $this->token) {
            return true;
       }

       return false;
    }
}

