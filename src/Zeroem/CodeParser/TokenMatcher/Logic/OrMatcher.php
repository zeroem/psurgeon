<?php

namespace Zeroem\CodeParser\TokenMatcher\Logic;

use Zeroem\CodeParser\Token;

class OrTokenMatcher extends AbstractBooleanTokenMatcher
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

