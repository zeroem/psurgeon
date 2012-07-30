<?php

namespace Zeroem\CodeParser\Matcher\Logic;

use Zeroem\CodeParser\Matcher\MatcherInterface;
use Zeroem\CodeParser\Token;


class NegateMatcher implements MatcherInterface 
{
    private $matcher;

    public function __construct(MatcherInterface $matcher) {
        $this->matcher = $matcher;
    }

    public function match(Token $token) {
        return !$this->matcher->match($token);
    }
}

