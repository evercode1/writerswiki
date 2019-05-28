<?php

namespace App\Console\Commands\Builders\Views;

use App\Console\Commands\Builders\Writers\ChildViewsFileWriter;
use App\Console\Commands\Tokens\Tokens;

class ChildViewBuilder
{

    public $initialValues = [];

    public $fileWritePaths = [];

    public $tokens = [];

    public function makeViewDirectory()
    {

        if (file_exists(base_path('/resources/views/' . $this->tokens['modelPath']))) {

            return false;

        }

        mkdir(base_path('/resources/views/' . $this->tokens['modelPath']));


        return true;




    }


    public function makeViewFiles($input)
    {
        $this->setConfig($input);

        if ( ! $this->makeViewDirectory() ){

            return false;

        }

        if ( ! $this->writeViewFiles() ){

            return false;

        }



        return true;


    }

    private function writeViewFiles()
    {

        $writer = new ChildViewsFileWriter($this->fileWritePaths, $this->tokens);

        $writer->writeAllViewFiles();

        return true;


    }

    private function setConfig($input)
    {

        $this->setInput($input);

        $this->setTokens();

        $this->setFilePaths();

    }

    private function setFilePaths()
    {

        $this->fileWritePaths['index'] = base_path() . '/resources/views/'
            . $this->tokens['modelPath']
            . '/index.blade.php';

        $this->fileWritePaths['create'] = base_path() . '/resources/views/'
            . $this->tokens['modelPath']
            . '/create.blade.php';

        $this->fileWritePaths['edit'] = base_path() . '/resources/views/'
            . $this->tokens['modelPath']
            . '/edit.blade.php';

        $this->fileWritePaths['show'] = base_path() . '/resources/views/'
            . $this->tokens['modelPath']
            . '/show.blade.php';

        $this->fileWritePaths['component'] = base_path() . '/resources/assets/js/components/'
            . $this->tokens['gridComponentName']
            . '.vue';

        $this->fileWritePaths['components'] = base_path() . '/resources/assets/js/components.js';


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
        $this->initialValues['model'] = $input['ChildName'];

        $this->initialValues['masterPageName'] = $input['MasterPage'];

        $this->initialValues['slug'] = strtolower($input['Slug']);

        $this->initialValues['parent'] =  $input['ParentName'];

        $this->initialValues['child'] = $input['ChildName'];
    }

}