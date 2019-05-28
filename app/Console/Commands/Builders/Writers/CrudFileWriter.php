<?php

namespace App\Console\Commands\Builders\Writers;

use App\Console\Commands\Builders\ContentRouters\CrudContentRouter;

class CrudFileWriter
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
        $this->content = new CrudContentRouter();


    }

    public function writeAllCrudFiles()
    {

        $this->makeImageFolders();

        $this->writeEachFile($this->fileWritePaths, $this->content);

        $this->appendEachFile($this->fileAppendPaths, $this->content);


    }

    private function makeImageFolders()
    {

        $imagePath = public_path(). '/imgs/' . $this->tokens['imageFolderName'];

        $thumbPath =  public_path(). '/imgs/' . $this->tokens['imageFolderName'] . '/thumbnails';

        mkdir($imagePath);

        mkdir($thumbPath);



    }

    private function writeEachFile(array $fileWritePaths, CrudContentRouter $content)
    {

                foreach ($fileWritePaths as $fileName => $filePath) {

                    $this->defaultHandler($content, $fileName, $filePath);

                }


    }

    private function appendEachFile(array $fileAppendPaths, CrudContentRouter $content)
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
    private function defaultHandler(CrudContentRouter $content, $fileName, $filePath)
    {
        switch ($fileName) {

            case 'imageConfig' :

                    $fileExists = true;

                    $txt = $content->getContentFromTemplate('imageConfig', $this->tokens, $fileExists);

                    $filename = base_path() . '/config/image-defaults.php';

                    $contents = file($filename);
                    $contents[16] = $contents[16] . "\n\n"; // Gives a new line
                    file_put_contents($filename, implode('',$contents));

                    $contents = file($filename);
                    $contents[17] = $txt;
                    file_put_contents($filename, implode('',$contents));

                    break;


            case 'apiController' :

                if (file_exists($this->fileWritePaths['apiController'])) {

                    $fileExists = true;

                    $txt = $content->getContentFromTemplate('apiController', $this->tokens, $fileExists);

                    $contents = file_get_contents($this->fileWritePaths['apiController']);

                    $classParts = explode('{', $contents, 2);

                    $txt = $classParts[0] . "{\n\n" . $txt . "\n\n" . $classParts[1];

                    $handle = fopen($filePath, "w");

                    fwrite($handle, $txt);

                    fclose($handle);

                    break;
                }

                $txt = $content->getContentFromTemplate('apiController', $this->tokens);

                $handle = fopen($filePath, "w");

                fwrite($handle, $txt);

                fclose($handle);

                break;

            case 'frontApiController' :

                if (file_exists($this->fileWritePaths['frontApiController'])) {

                    $fileExists = true;

                    $txt = $content->getContentFromTemplate('frontApiController', $this->tokens, $fileExists);

                    $contents = file_get_contents($this->fileWritePaths['frontApiController']);

                    $classParts = explode('{', $contents, 2);

                    $txt = $classParts[0] . "{\n\n" . $txt . "\n\n" . $classParts[1];

                    $handle = fopen($filePath, "w");

                    fwrite($handle, $txt);

                    fclose($handle);

                    break;
                }

                $txt = $content->getContentFromTemplate('frontApiController', $this->tokens);

                $handle = fopen($filePath, "w");

                fwrite($handle, $txt);

                fclose($handle);

                break;

            case 'dataQuery' :

                if (file_exists($this->fileWritePaths['dataQuery'])) {

                    break;
                }

                $queryDirectory = '/app/Queries';

                if (!file_exists($queryDirectory)) {

                    mkdir(base_path($queryDirectory));

                }

                $gridQueriesDirectory = 'app/Queries/GridQueries';

                if (!file_exists($gridQueriesDirectory)) {

                    mkdir(base_path($gridQueriesDirectory));

                }

                $contractsDirectory = 'app/Queries/GridQueries/Contracts';

                if (!file_exists($contractsDirectory)) {

                    mkdir(base_path($contractsDirectory));

                }


                $txt = $content->getContentFromTemplate('dataQuery', $this->tokens);

                $handle = fopen($filePath, "w");

                fwrite($handle, $txt);

                fclose($handle);

                break;

            case 'gridQuery' :

                if (file_exists($this->fileWritePaths['gridQuery'])) {

                    break;
                }


                $txt = $content->getContentFromTemplate('gridQuery', $this->tokens);

                $handle = fopen($filePath, "w");

                fwrite($handle, $txt);

                fclose($handle);

                break;

            case 'modelQuery':

                $txt = $content->getContentFromTemplate('modelQuery', $this->tokens);

                $handle = fopen($filePath, "w");

                fwrite($handle, $txt);

                fclose($handle);

                break;

            case 'allQuery':

                $txt = $content->getContentFromTemplate('allQuery', $this->tokens);

                $handle = fopen($filePath, "w");

                fwrite($handle, $txt);

                fclose($handle);

                break;


            default:

                if (!is_array($fileName)) {

                    $txt = $content->getContentFromTemplate($fileName, $this->tokens);

                    $handle = fopen($filePath, "w");

                    fwrite($handle, $txt);

                    fclose($handle);
                }

        }
    }


}