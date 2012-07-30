<?php

namespace Zeroem\CodeParser\Matcher\Token;
use Zeroem\CodeParser\Matcher\MatcherInterface;
use Zeroem\CodeParser\Token;

class TokenMatcher implements MatcherInterface
{
    private $token;

    public function __construct($token) {
        $this->token = token;
    }

    public function match(Token $token) {
        return $token->getType() == $this->token;
    }

    public function getToken() {
        return $this->token;
    }

    public function getTokenName() {
        return token_name($this->token);
    }
}

