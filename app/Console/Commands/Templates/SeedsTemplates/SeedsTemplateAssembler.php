<?php

namespace App\Console\Commands\Templates\SeedsTemplates;



class SeedsTemplateAssembler
{


    public $tokens = [];
    public $model;
    public $modelPath;

    public function __construct($tokens)
    {

        $this->tokens = $tokens;
        $this->model = $tokens['model'];
        $this->modelPath = $tokens['modelPath'];


    }

    public function assembleTemplate($template)
    {

        $file = __DIR__ . '/templates/' . $template . '.txt';

        $content = file_get_contents($file);

        return $this->insertTokensIntoContent($content, $this->tokens);

    }


    public function insertTokensIntoContent($content, Array $tokens)
    {

        foreach ($tokens as $string => $variable) {

            $content = str_replace(':::' . $string . ':::', $variable, $content);
        }

        return $content;
    }


}