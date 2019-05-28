<?php

namespace App\Console\Commands\Builders\Writers;

use App\Console\Commands\Builders\ContentRouters\SeedsContentRouter;
use App\Exceptions\FileAlreadyExistsException;


class SeedsFileWriter
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
        $this->content = new SeedsContentRouter();


    }

    public function writeAllSeedsFiles()
    {



        $this->writeEachFile($this->fileWritePaths, $this->content);




    }



    private function writeEachFile(array $fileWritePaths, SeedsContentRouter $content)
    {

                foreach ($fileWritePaths as $fileName => $filePath) {

                    $this->defaultHandler($content, $fileName, $filePath);

                }


    }



    /**
     * @param CrudContentRouter $content
     * @param $fileName
     * @param $filePath
     */
    private function defaultHandler(SeedsContentRouter $content, $fileName, $filePath)
    {


                if (file_exists($filePath)) {


                    throw new FileAlreadyExistsException();

                }

                $txt = $content->getContentFromTemplate($fileName, $this->tokens);

                $handle = fopen($filePath, "w");

                fwrite($handle, $txt);

                fclose($handle);


    }


}