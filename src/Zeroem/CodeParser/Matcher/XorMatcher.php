<?php

namespace Zeroem\CodeParser\Matcher;

class XorMatcher extends BooleanMatcher
{
    private $found = false;
    
    public function match($mixed) {
        foreach($this->matchers as $matcher) {
            if($matcher->match($mixed)) {
                if($this->found) {
                    return false;
                } else {
                    $this->found = true;
                }
            }
        }

        return $this->found;
    }
}

