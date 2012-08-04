<?php

namespace Zeroem\Psurgeon\TokenMatcher\Logic;

use Zeroem\Psurgeon\Token;

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

