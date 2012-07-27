<?php

namespace Zeroem\CodeParser\Matcher;

class NegateMatcher implements MatcherInterface 
{
    private $matcher;

    public function __construct(MatcherInterface $matcher) {
        $this->matcher = $matcher;
    }

    public function match($mixed) {
        return !$this->matcher->match($mixed);
    }
}

