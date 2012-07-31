<?php

namespace Zeroem\CodeParser\TokenMatcher\Logic;

use Zeroem\CodeParser\Token;

class AndTokenMatcher extends BooleanTokenMatcher
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

