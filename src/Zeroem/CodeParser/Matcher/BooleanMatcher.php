<?php

namespace Zeroem\CodeParser\Matcher;

abstract class BooleanMatcher implements MatcherInterface
{
    protected $matchers = array();

    public function __construct($matcher) {
        if($matcher instanceof \Zeroem\CodeParser\MatcherInterface) {
            $args = func_get_args();
        } else {
            $args = (array)$matcher;
        }

        foreach($args as $obj) {
            if($obj instanceof \Zeroem\CodeParser\MatcherInterface) {
                $this->matchers[] = $obj;
            } else {
                throw new \InvalidArgumentException(
                    "Expected instance of '\\Zeroem\\CodeParser\\MatcherInterface', got '" . gettype($obj) . "' instead."
                    );
            }
        }
    }

    abstract function match($mixed);
}
