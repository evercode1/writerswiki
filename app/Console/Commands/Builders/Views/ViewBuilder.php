<?php

namespace App\Console\Commands\Builders\Views;

use App\Console\Commands\Builders\Writers\ViewsFileWriter;
use App\Console\Commands\Tokens\Tokens;

class ViewBuilder
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

        $writer = new ViewsFileWriter($this->fileWritePaths, $this->tokens);

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

        $this->fileWritePaths['create-form'] = base_path() . '/resources/views/'
                                                            . $this->tokens['modelPath']
                                                            . '/create-form.blade.php';

        $this->fileWritePaths['edit'] = base_path() . '/resources/views/'
                                                    . $this->tokens['modelPath']
                                                    . '/edit.blade.php';

        $this->fileWritePaths['edit-form'] = base_path() . '/resources/views/'
                                                         . $this->tokens['modelPath']
                                                         . '/edit-form.blade.php';

        $this->fileWritePaths['show'] = base_path() . '/resources/views/'
                                                    . $this->tokens['modelPath']
                                                    . '/show.blade.php';

        $this->fileWritePaths['component'] = base_path() . '/resources/js/components/'
            . $this->tokens['gridComponentName']
            . '.vue';

        $this->fileWritePaths['components'] = base_path() . '/resources/js/components.js';

        if( $this->initialValues['front'] == 'front'){


            $this->fileWritePaths['all-component'] = base_path() . '/resources/js/components/'
                . $this->tokens['allGridComponentName']
                . '.vue';

            $this->fileWritePaths['all-components'] = base_path() . '/resources/js/components.js';

            $this->fileWritePaths['all-index'] = base_path() . '/resources/views/'
                . $this->tokens['allViewFolder']
                . '/index.blade.php';


        }





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
        $this->initialValues['model'] = $input['ModelName'];

        $this->initialValues['masterPageName'] = $input['MasterPage'];

        $this->initialValues['front'] = strtolower($input['Front']);

    }

}