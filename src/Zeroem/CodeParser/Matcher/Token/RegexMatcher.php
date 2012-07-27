<?php

namespace Zeroem\CodeParser\Matcher\Token;
use Zeroem\CodeParser\Matcher\MatcherInterface;

class RegexMatcher implements MatcherInterface
{
    private $regex;

    public function __construct($regex) {
        $this->regex = $regex;
    }

    public function match($mixed) {
        if(is_array($mixed)) {
            return $this->regexMatch($mixed[1]);
        } else {
            return $this->regexMatch($mixed);
        }
    }

    private function regexMatch($mixed) {
        return preg_match($this->regex,$mixed) > 0;
    }
}

