<?php

namespace Zeroem\CodeParser\TokenMatcher\Logic;
use Zeroem\CodeParser\Token;

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

