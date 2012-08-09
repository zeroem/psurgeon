<?php

namespace Zeroem\Psurgeon\Test;

use Zeroem\Psurgeon\Tokenizer;


class TokenizerTest extends \PHPUnit_Framework_TestCase
{
  public function testHtmlTokenize() {
    $tokenizer = new Tokenizer();

    $tokens = $tokenizer->tokenize(file_get_contents(__DIR__.'/../Fixture/html_only.php'));

    $this->assertCount(1,$tokens);

    $token = current($tokens)->getToken();
    $this->assertEquals(T_INLINE_HTML, $token->getType());
  }

  public function testPhpTokenize() {
    $tokenizer = new Tokenizer();

    $tokens = $tokenizer->tokenize(file_get_contents(__DIR__.'/../Fixture/php_only.php'));

    $this->assertCount(2,$tokens);
    $this->assertEquals(T_OPEN_TAG, $tokens->getHead()->getToken()->getType());
    $this->assertEquals(T_CLOSE_TAG, $tokens->getHead()->getNext()->getToken()->getType());
  }

  public function testPhpAndHtmlTokenize() {
    $tokenizer = new Tokenizer();

    $tokens = $tokenizer->tokenize(file_get_contents(__DIR__.'/../Fixture/php_and_html.php'));

    $this->assertCount(4,$tokens);
    $first = $tokens->getHead();
    $second = $first->getNext();
    $third = $second->getNext();
    $fourth = $third->getNext();

    $this->assertEquals(T_INLINE_HTML, $first->getToken()->getType());
    $this->assertEquals(T_OPEN_TAG, $second->getToken()->getType());
    $this->assertEquals(T_CLOSE_TAG, $third->getToken()->getType());
    $this->assertEquals(T_INLINE_HTML, $fourth->getToken()->getType());
  }

}
