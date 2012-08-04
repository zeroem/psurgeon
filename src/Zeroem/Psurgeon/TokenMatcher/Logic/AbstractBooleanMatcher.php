<?php

namespace Zeroem\Psurgeon\TokenMatcher\Logic;

use Zeroem\Psurgeon\TokenMatcher\TokenMatcherInterface;
use Zeroem\Psurgeon\Token;

abstract class AbstractBooleanTokenMatcher implements TokenMatcherInterface
{
    protected $matchers = array();

    public function __construct(TokenMatcherInterface $matcher) {
        if($matcher instanceof \Zeroem\Psurgeon\TokenMatcherInterface) {
            $args = func_get_args();
        } else {
            $args = (array)$matcher;
        }

        foreach($args as $obj) {
            if($obj instanceof \Zeroem\Psurgeon\TokenMatcherInterface) {
                $this->matchers[] = $obj;
            } else {
                throw new \InvalidArgumentException(
                    "Expected instance of '\\Zeroem\\Psurgeon\\TokenMatcherInterface', got '" . gettype($obj) . "' instead."
                    );
            }
        }
    }

    abstract function match(Token $token);
}
