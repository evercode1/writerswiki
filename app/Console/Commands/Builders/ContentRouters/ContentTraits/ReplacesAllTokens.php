<?php

namespace App\Console\Commands\ContentRouters\ContentTraits;

trait ReplacesAllTokens
{


    public function insertTokensIntoContent($content, Array $tokens)
    {

        foreach ($tokens as $string => $variable) {

            $content = str_replace(':::' . $string . ':::', $variable, $content);
        }

        return $content;
    }

    public function mergeTokens($tokens, $customTokens)
    {


        $tokens = array_merge($tokens, $customTokens);

        return $tokens;


    }



}