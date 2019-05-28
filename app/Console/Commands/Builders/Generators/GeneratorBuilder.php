<?php

namespace App\Console\Commands\Builders\Generators;

use App\Console\Commands\Tokens\Tokens;
use App\Console\Commands\Builders\Writers\GeneratorFileWriter;

class GeneratorBuilder
{

    public $initialValues = [];

    public $fileWritePaths = [];

    public $fileAppendPaths = [];

    public $tokens = [];


    public function makeGeneratorFiles($input)
    {
        $this->setConfig($input);

        $this->writeGeneratorFiles();

        return true;


    }

    private function writeGeneratorFiles()
    {

        $writer = new GeneratorFileWriter($this->fileWritePaths,
                                     $this->fileAppendPaths,
                                     $this->tokens);

        $writer->writeAllGeneratorFiles();


    }

    private function setConfig($input)
    {

        $this->setInput($input);

        $this->setTokens();

        $this->setFilePaths();



    }



    private function setFilePaths()
    {

        $this->fileWritePaths['controller'] = base_path() . '/app/Http/Controllers/'
            . $this->tokens['model'] . 'GeneratorController.php';

        $this->fileWritePaths['seeder'] = base_path() . '/database/seeds/'
            . $this->tokens['model'] . 'Seeder.php';

        $this->fileWritePaths['create'] = base_path() . '/resources/views/'
            . $this->tokens['modelPath'] . '-generator/create.blade.php';

        $this->fileWritePaths['createForm'] = base_path() . '/resources/views/'
            . $this->tokens['modelPath'] . '-generator/create-form.blade.php';

        $this->fileAppendPaths['routes'] = base_path() . '/routes/web.php';


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

        $this->initialValues['model'] = ucfirst($input['SeedName']);


    }


}