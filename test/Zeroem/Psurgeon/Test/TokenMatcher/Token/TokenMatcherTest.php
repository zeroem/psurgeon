<?php

namespace Zeroem\Psurgeon\Test\TokenMatcher\Token;

use Zeroem\Psurgeon\TokenMatcher\Token\TokenMatcher;
use Zeroem\Psurgeon\Token;

class TokenMatcherTest extends \PHPUnit_Framework_TestCase
{
  public function testMatcher() {
    $function = new Token('function', T_FUNCTION);
    $whitespace = new Token(' ', T_WHITESPACE);
    $matcher = new TokenMatcher(T_WHITESPACE);

    $this->assertTrue($matcher->match($whitespace));
    $this->assertFalse($matcher->match($function));
 }
}

