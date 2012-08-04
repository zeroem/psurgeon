<?php

namespace Zeroem\Psurgeon\Test;

use Zeroem\Psurgeon\Tokenizer;


class TokenizerTest extends \PHPUnit_Framework_TestCase
{
  public function testHtmlTokenize() {
    $tokenizer = new Tokenizer();

    $tokens = $tokenizer->tokenize(file_get_contents(__DIR__.'/../Fixture/html_only.php'));

    $this->assertCount(1,$tokens);

    $token = current($tokens);
    $this->assertEquals(T_INLINE_HTML, $token->getType());
  }

  public function testPhpTokenize() {
    $tokenizer = new Tokenizer();

    $tokens = $tokenizer->tokenize(file_get_contents(__DIR__.'/../Fixture/php_only.php'));

    $this->assertCount(2,$tokens);
    $this->assertEquals(T_OPEN_TAG, $tokens[0]->getType());
    $this->assertEquals(T_CLOSE_TAG, $tokens[1]->getType());
  }

  public function testPhpAndHtmlTokenize() {
    $tokenizer = new Tokenizer();

    $tokens = $tokenizer->tokenize(file_get_contents(__DIR__.'/../Fixture/php_and_html.php'));

    $this->assertCount(4,$tokens);
    $this->assertEquals(T_INLINE_HTML, $tokens[0]->getType());
    $this->assertEquals(T_OPEN_TAG, $tokens[1]->getType());
    $this->assertEquals(T_CLOSE_TAG, $tokens[2]->getType());
    $this->assertEquals(T_INLINE_HTML, $tokens[3]->getType());
  }

}
