<?php

namespace Zeroem\CodeParser;

class Tokenizer
{
    public function tokenize($str) {
        $rawTokens = token_get_all($str);
        $objectTokens = array();

        $line = 0;

        foreach($rawTokens as $rawToken) {
            if(is_array($rawToken)) {
                $token = new Token($rawToken[1],$rawToken[0],$rawToken[2]);
                $line = $rawToken[2];
            } else {
                $token = new Token($rawToken, null, $line); 
            }

            $objectTokens[] = $token;
        }

        return $objectTokens;
    }
}

