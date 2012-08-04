<?php

namespace Zeroem\Psurgeon\TokenMatcher\Token;
use Zeroem\Psurgeon\TokenMatcher\TokenMatcherInterface;
use Zeroem\Psurgeon\Token;


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

