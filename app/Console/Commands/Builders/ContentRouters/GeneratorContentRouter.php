<?php

namespace App\Console\Commands\Builders\ContentRouters;

use App\Console\Commands\Builders\ContentRouters\ContentTraits\HasParentAndChildAndSlug;
use App\Console\Commands\Templates\GeneratorTemplates\GeneratorTemplateAssembler;

class GeneratorContentRouter
{

    use HasParentAndChildAndSlug;


    public function getContentFromTemplate($fileName,  array $tokens, $fileExists=false)
    {

        return $this->defaultHandler($fileName, $tokens, $fileExists);



    }

    private function routeTemplate($tokens, $templateName)
    {


        $generatorTemplate = new GeneratorTemplateAssembler($tokens);

        return $generatorTemplate->assembleTemplate($templateName);


    }

    /**
     * @param $fileName
     * @param array $tokens
     * @param $fileExists
     * @return mixed|string
     */
    private function defaultHandler($fileName, array $tokens, $fileExists)
    {
        switch ($fileName) {


            case 'controller' :


                return $this->routeTemplate($tokens, 'controllerTemplate');
                break;

            case 'seeder' :


                return $this->routeTemplate($tokens, 'seederTemplate');
                break;



            case 'create' :


                return $this->routeTemplate($tokens, 'createTemplate');
                break;



            case 'createForm' :


                return $this->routeTemplate($tokens, 'createFormTemplate');
                break;



            case 'routes' :

                return $this->routeTemplate($tokens, 'routeTemplate');
                break;



            default :

                return 'Something went wrong';


        }
    }





}