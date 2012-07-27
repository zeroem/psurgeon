<?php

namespace Zeroem\CodeParser\Matcher\Logic;

class AndMatcher extends BooleanMatcher
{
    public function match($mixed) {
        foreach($this->matchers as $matcher) {
            if(!$matcher->match($mixed)) {
                return false;
            }
        }

        return true;
    }
}

