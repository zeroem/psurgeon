<?php

namespace Zeroem\Psurgeon\Test;

use Zeroem\Psurgeon\TokenChain;
use Zeroem\Psurgeon\TokenNode;
use Zeroem\Psurgeon\Token;
use Zeroem\Psurgeon\TokenMatcher\Token\TextMatcher;


class TokenChainTest extends \PHPUnit_Framework_TestCase
{
  public function testBasicFunctionality() {
    $chain = new TokenChain();
    $head = new Token();
    $tail = new Token();

    $chain->appendToken($head);
    $this->assertCount(1,$chain);
    $this->assertSame($chain->getHead(), $chain->getTail());

    $chain->appendToken($tail);
    $this->assertCount(2,$chain);
    $this->assertNotSame($chain->getHead(), $chain->getTail());
    $this->assertSame($head,$chain->getHead()->getToken());
    $this->assertSame($tail,$chain->getTail()->getToken());

    $this->assertSame($chain->getTail(), $chain->getHead()->getNext());
    $this->assertSame($chain->getHead(), $chain->getTail()->getPrevious());
  }

  public function testFinder() {
    $chain = new TokenChain();

    $chain
      ->appendToken(new Token('start'))
      ->appendToken(new Token('middle'))
      ->appendToken(new Token('end'));

    $node = $chain->getHead();

    $test = TokenChain::find($node, new TextMatcher('start'));
    $this->assertSame($node, $test);

    $test = TokenChain::find($node, new TextMatcher('not-in-list'));
    $this->assertFalse($test);

    $test = TokenChain::find($node, new TextMatcher('end'), new TextMatcher('middle'));
    $this->assertFalse($test);
  }
}

