<?php

namespace Zeroem\Psurgeon\TokenMatcher\Logic;
use Zeroem\Psurgeon\Token;

class XorTokenMatcher extends AbstractBooleanTokenMatcher
{
    private $found = false;
    
    public function match(Token $token) {
        foreach($this->matchers as $matcher) {
            if($matcher->match($token)) {
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

