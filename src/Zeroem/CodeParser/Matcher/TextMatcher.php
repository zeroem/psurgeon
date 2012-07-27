<?php

namespace Zeroem\CodeParser\Matcher;

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

    public function match($mixed) {
        if(is_array($mixed)) {
            return $this->stringMatch($mixed[1]);
        } else {
            return $this->stringMatch($mixed);
        }
    }

    private function stringMatch($str) {
        if($this->ignoreCase) {
            $str = strtolower($str);
        }

        return $str === $this->text;
    }
}

