<?php

namespace Zeroem\CodeParser\Matcher\Token;
use Zeroem\CodeParser\Matcher\MatcherInterface;
use Zeroem\CodeParser\Token;


class TextMatcher implements MatcherInterface
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

