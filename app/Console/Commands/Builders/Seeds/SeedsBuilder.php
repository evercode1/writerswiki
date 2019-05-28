<?php

namespace App\Console\Commands\Builders\Seeds;

use App\Console\Commands\Tokens\Tokens;
use App\Console\Commands\Builders\Writers\SeedsFileWriter;

class SeedsBuilder
{

    public $initialValues = [];

    public $fileWritePaths = [];

    public $fileAppendPaths = [];

    public $tokens = [];


    public function makeSeedsFiles($input)
    {
        $this->setConfig($input);

        $this->writeSeedsFiles();

        return true;


    }

    private function writeSeedsFiles()
    {

        $writer = new SeedsFileWriter($this->fileWritePaths,
                                     $this->fileAppendPaths,
                                     $this->tokens);

        $writer->writeAllSeedsFiles();


    }

    private function setConfig($input)
    {

        $this->setInput($input);

        $this->setTokens();

        $this->setFilePaths();


    }

    private function setFilePaths()
    {

            $this->fileWritePaths['seed'] = base_path() . '/seeds/' . $this->tokens['seedsName'] . '.php';






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
        $this->initialValues['seedsName'] = $input['Name'];


    }


}