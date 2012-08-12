<?php

namespace Zeroem\Psurgeon\TokenMatcher\Token;
use Zeroem\Psurgeon\TokenMatcher\TokenMatcherInterface;
use Zeroem\Psurgeon\Token;

class TokenMatcher implements TokenMatcherInterface
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

