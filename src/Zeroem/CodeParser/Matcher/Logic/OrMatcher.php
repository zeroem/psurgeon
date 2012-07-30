<?php

namespace Zeroem\CodeParser\Matcher\Logic;

use Zeroem\CodeParser\Token;

class OrMatcher extends AbstractBooleanMatcher
{
    public function match(Token $token) {
        foreach($this->matchers as $matcher) {
            if($matcher->match($token)) {
                return true;
            }
        }

        return false;
    }
}

