<?php

namespace Zeroem\CodeParser\Matcher;

class OrMatcher extends BooleanMatcher
{
    public function match($mixed) {
        foreach($this->matchers as $matcher) {
            if($matcher->match($mixed)) {
                return true;
            }
        }

        return false;
    }
}

