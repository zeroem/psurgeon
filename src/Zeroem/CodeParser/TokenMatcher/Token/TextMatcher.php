<?php

namespace Zeroem\CodeParser\TokenMatcher\Token;
use Zeroem\CodeParser\TokenMatcher\TokenMatcherInterface;
use Zeroem\CodeParser\Token;


class TextTokenMatcher implements TokenMatcherInterface
{
    private $text;
    private $ignoreCase = false;

    public function __construct($text,$ignoreCase = false) {
        $this->ignoreCase = $ignoreCase;

        if($this->ignoreCase) {
            $this->text = strtolower($text);
        } else {
            $this->text = $text;
        }
    }

   private function match(Token $token) {
        if($this->ignoreCase) {
            $str = strtolower($token->getText());
        } else {
            $str = $token->getText();
        }

        return $str === $this->text;
    }
}

