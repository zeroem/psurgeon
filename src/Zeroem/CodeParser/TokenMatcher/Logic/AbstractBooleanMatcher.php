<?php

namespace Zeroem\CodeParser\TokenMatcher\Logic;

use Zeroem\CodeParser\TokenMatcher\TokenMatcherInterface;
use Zeroem\CodeParser\Token;

abstract class AbstractBooleanTokenMatcher implements TokenMatcherInterface
{
    protected $matchers = array();

    public function __construct(TokenMatcherInterface $matcher) {
        if($matcher instanceof \Zeroem\CodeParser\TokenMatcherInterface) {
            $args = func_get_args();
        } else {
            $args = (array)$matcher;
        }

        foreach($args as $obj) {
            if($obj instanceof \Zeroem\CodeParser\TokenMatcherInterface) {
                $this->matchers[] = $obj;
            } else {
                throw new \InvalidArgumentException(
                    "Expected instance of '\\Zeroem\\CodeParser\\TokenMatcherInterface', got '" . gettype($obj) . "' instead."
                    );
            }
        }
    }

    abstract function match(Token $token);
}
