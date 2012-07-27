<?php

namespace Zeroem\CodeParser\Matcher\Logic;

class OrMatcher extends AbstractBooleanMatcher
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

