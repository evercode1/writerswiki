<?php

namespace App\Console\Commands\Builders\Writers;

use App\Console\Commands\Builders\ContentRouters\GeneratorContentRouter;

class GeneratorFileWriter
{

    public $fileWritePaths;
    public $fileAppendPaths;
    public $tokens = [];
    public $content;

    public function __construct($fileWritePaths, $fileAppendPaths, Array $tokens)
    {

        $this->fileWritePaths = $fileWritePaths;
        $this->fileAppendPaths = $fileAppendPaths;
        $this->tokens = $tokens;
        $this->content = new GeneratorContentRouter();


    }

    public function writeAllGeneratorFiles()
    {

        $this->makeViewFolder();

        $this->writeEachFile($this->fileWritePaths, $this->content);

        $this->appendEachFile($this->fileAppendPaths, $this->content);


    }

    private function makeViewFolder()
    {

        $viewPath = base_path(). '/resources/views/' . $this->tokens['folderName']. '-generator';

        mkdir($viewPath);


    }

    private function writeEachFile(array $fileWritePaths, GeneratorContentRouter $content)
    {

                foreach ($fileWritePaths as $fileName => $filePath) {



                        $this->defaultHandler($content, $fileName, $filePath);





                }




    }

    // could not get this to work

    private function writeNavFile()
    {

        $filePath = base_path('resources/views/layouts/admin-dash-partials/side-nav.blade.php');

        $path = $this->tokens['modelPath'];

        $model = $this->tokens['model'];


        $contents = file($filePath);
        $contents[30] = $contents[30] . "\n\n\n\n\n\n"; // Gives a new line
        file_put_contents($filePath, implode('',$contents));

        $contents = file($filePath);
        $contents[31] = <<<EOF
        
        <!-- Begin $model Generator Nav -->
        <li><a href="/$path-generator" class="waves-effect">$model Generator
            <i class="fa fa-star"></i></a></li>
        <!-- End $model Generator Nav -->

EOF;

        file_put_contents($filePath, implode('',$contents));




    }

    private function appendEachFile(array $fileAppendPaths, GeneratorContentRouter $content)
    {

        foreach ($fileAppendPaths as $fileName => $filePath) {

            if ( ! is_array($fileName)) {

                $txt = $content->getContentFromTemplate($fileName, $this->tokens);

                file_put_contents($filePath, $txt, FILE_APPEND);

            }

        }
    }

    /**
     * @param CrudContentRouter $content
     * @param $fileName
     * @param $filePath
     */
    private function defaultHandler(GeneratorContentRouter $content, $fileName, $filePath)
    {


                if (!is_array($fileName)) {

                    $txt = $content->getContentFromTemplate($fileName, $this->tokens);

                    $handle = fopen($filePath, "w");

                    fwrite($handle, $txt);

                    fclose($handle);
                }


    }


}