<?php

namespace Zeroem\Psurgeon\TokenMatcher;

use Zeroem\Psurgeon\Token;

interface TokenMatcherInterface
{
    public function match(Token $mixed);
}

