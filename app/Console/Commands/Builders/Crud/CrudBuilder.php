<?php

namespace App\Console\Commands\Builders\Crud;

use App\Console\Commands\Tokens\Tokens;
use App\Console\Commands\Builders\Writers\CrudFileWriter;

class CrudBuilder
{

    public $initialValues = [];

    public $fileWritePaths = [];

    public $fileAppendPaths = [];

    public $tokens = [];


    public function makeCrudFiles($input)
    {
        $this->setConfig($input);

        $this->writeCrudFiles();

        return true;


    }

    private function writeCrudFiles()
    {

        $writer = new CrudFileWriter($this->fileWritePaths,
                                     $this->fileAppendPaths,
                                     $this->tokens);

        $writer->writeAllCrudFiles();


    }

    private function setConfig($input)
    {

        $this->setInput($input);

        $this->setTokens();

        $this->setFilePaths();


    }

    private function setFilePaths()
    {

            $this->fileWritePaths['model'] = base_path() . '/app/' . $this->tokens['upperCaseModelName'] . '.php';

            $this->fileWritePaths['controller'] = base_path() . '/app/Http/Controllers/'
                . $this->tokens['controllerName'] . '.php';

            $this->fileWritePaths['apiController'] = base_path() . '/app/Http/Controllers/ApiController.php';

            $this->tokens['front'] == 'front' ?
                $this->fileWritePaths['allController'] = base_path() . '/app/Http/Controllers/'
                . $this->tokens['allControllerName'] . '.php'
                : false;

            $this->tokens['front'] == 'front' ?
                $this->fileWritePaths['frontApiController'] = base_path()
                . '/app/Http/Controllers/FrontApiController.php'
                : false;

            $this->fileWritePaths['imageConfig'] = base_path() . '/config/image-defaults.php';

            $this->tokens['front'] == 'front' ?
                $this->fileWritePaths['allQuery'] = base_path() . '/app/Queries/GridQueries/'
                . $this->tokens['allQueryName'] . 'Query.php'
                : false;

            $this->fileWritePaths['dataQuery'] = base_path() . '/app/Queries/GridQueries/Contracts/' . 'DataQuery.php';

            $this->fileAppendPaths['routes'] = base_path() . '/routes/web.php';

            $this->fileWritePaths['migration'] = base_path() . '/database/migrations/' . date('Y_m_d_His') . '_create_'
                .$this->tokens['tableName'] . '_table'. '.php';

            $this->fileWritePaths['factory'] = base_path() . '/database/factories/'
                . $this->tokens['upperCaseModelName'] . 'Factory.php';

            $this->fileWritePaths['gridQuery'] = base_path() . '/app/Queries/GridQueries/' . 'GridQuery.php';

            $this->fileWritePaths['modelQuery'] = base_path() . '/app/Queries/GridQueries/'
                . $this->tokens['upperCaseModelName'] . 'Query.php';




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

        $this->initialValues['front'] = strtolower($input['Front']);

        $this->initialValues['parent'] = isset($input['ParentName']) ? $input['ParentName'] : false;

        $this->initialValues['child'] = isset($input['ChildName']) ? $input['ChildName'] : false;
    }


}