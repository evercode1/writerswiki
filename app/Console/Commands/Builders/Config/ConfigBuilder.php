<?php

namespace App\Console\Commands\Builders\Config;

use App\Console\Commands\Tokens\Tokens;
use App\Console\Commands\Builders\Writers\ConfigFileWriter;

class ConfigBuilder
{

    public $initialValues = [];

    public $fileWritePaths = [];

    public $fileAppendPaths = [];

    public $tokens = [];


    public function makeConfigFiles($input)
    {
        $this->setConfig($input);

        $this->writeConfigFiles();

        return true;


    }

    private function writeConfigFiles()
    {

        $writer = new configFileWriter($this->fileWritePaths,
                                     $this->fileAppendPaths,
                                     $this->tokens);

        $writer->writeAllConfigFiles();


    }

    private function setConfig($input)
    {

        $this->setInput($input);

        $this->setTokens();

        $this->setFilePaths();


    }

    private function setFilePaths()
    {

            $this->fileWritePaths['config'] = base_path() . '/config/' . $this->tokens['configName'] . '.php';


    }

    private function setTokens()
    {

        $tokenBuilder = new Tokens($this->initialValues);

        $this->tokens = $tokenBuilder->tokens;


    }

    /**
     * @param $input
     */

    private function setInput($input)
    {
        $this->initialValues['configName'] = $input['Name'];


    }


}