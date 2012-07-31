<?php

namespace Zeroem\CodeParser\TokenMatcher\Token;
use Zeroem\CodeParser\TokenMatcher\TokenMatcherInterface;
use Zeroem\CodeParser\Token;

class TokenTokenMatcher implements TokenMatcherInterface
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

