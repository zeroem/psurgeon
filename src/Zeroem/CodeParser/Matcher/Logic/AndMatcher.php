<?php

namespace Zeroem\CodeParser\Matcher\Logic;

use Zeroem\CodeParser\Token;

class AndMatcher extends BooleanMatcher
{
    public function match(Token $token) {
        foreach($this->matchers as $matcher) {
            if(!$matcher->match($token)) {
                return false;
            }
        }

        return true;
    }
}

