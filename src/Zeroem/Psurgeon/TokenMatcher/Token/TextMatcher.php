<?php

namespace Zeroem\Psurgeon\TokenMatcher\Token;
use Zeroem\Psurgeon\TokenMatcher\TokenMatcherInterface;
use Zeroem\Psurgeon\Token;


class TextMatcher implements TokenMatcherInterface
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

    public function match(Token $token) {
        if($this->ignoreCase) {
            $str = strtolower($token->getText());
        } else {
            $str = $token->getText();
        }

        return $str === $this->text;
    }
}

