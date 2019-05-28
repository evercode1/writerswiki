<?php

namespace App\Console\Commands\Templates\CrudTemplates;



class CrudTemplateAssembler
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

        if (file_exists(base_path(). '/app/Templates')){

            $this->addCustomTokens();

            $file = base_path(). '/app/Templates/CrudTemplates/templates/' . $template . '.txt';

            $content = file_get_contents($file);

            return $this->insertTokensIntoContent($content, $this->tokens);

        }

        $file = __DIR__ . '/templates/' . $template . '.txt';

        $content = file_get_contents($file);

        return $this->insertTokensIntoContent($content, $this->tokens);

    }

    private function addCustomTokens()
    {

        $addTokens = new \App\Templates\CustomTokens($this->model, $this->modelPath);

        $this->tokens = $this->mergeTokens($this->tokens, $addTokens->customTokens);

    }

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