<?php

namespace Zeroem\Psurgeon\Test\TokenMatcher\Token;

use Zeroem\Psurgeon\TokenMatcher\Token\TextMatcher;
use Zeroem\Psurgeon\Token;

class TextMatcherTest extends \PHPUnit_Framework_TestCase
{
  public function testMatcher() {
    $big = new Token('HERP');
    $little = new Token('herp');
    $bad = new Token('derp');
    $matcher = new TextMatcher('herp');

    $this->assertTrue($matcher->match($little));
    $this->assertFalse($matcher->match($big));
    $this->assertFalse($matcher->match($bad));

    $matcher = new TextMatcher('HERP',true);

    $this->assertTrue($matcher->match($little));
    $this->assertTrue($matcher->match($big));
    $this->assertFalse($matcher->match($bad));
 }
}

