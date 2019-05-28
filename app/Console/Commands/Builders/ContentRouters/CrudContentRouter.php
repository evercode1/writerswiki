<?php

namespace App\Console\Commands\Builders\ContentRouters;

use App\Console\Commands\Builders\ContentRouters\ContentTraits\HasParentAndChildAndSlug;
use App\Console\Commands\Templates\CrudTemplates\CrudTemplateAssembler;

class CrudContentRouter
{

    use HasParentAndChildAndSlug;


    public function getContentFromTemplate($fileName,  array $tokens, $fileExists=false)
    {

        return $this->defaultHandler($fileName, $tokens, $fileExists);



    }

    private function routeTemplate($tokens, $templateName)
    {


        $crudTemplate = new CrudTemplateAssembler($tokens);

        return $crudTemplate->assembleTemplate($templateName);


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

            case 'apiController' :

                if ($fileExists) {


                    return $this->routeTemplate($tokens, 'appendApiControllerTemplate');
                    break;

                } else {


                    return $this->routeTemplate($tokens, 'apiControllerTemplate');
                    break;

                }

            case 'frontApiController' :

                if ($fileExists) {


                    return $this->routeTemplate($tokens, 'appendFrontApiControllerTemplate');
                    break;

                } else {


                    return $this->routeTemplate($tokens, 'frontApiControllerTemplate');
                    break;

                }

            case 'controller' :


                return $this->routeTemplate($tokens, 'controllerTemplate');
                break;

            case 'allController' :


                return $this->routeTemplate($tokens, 'allControllerTemplate');
                break;

            case 'dataQuery' :

                if (!$fileExists) {


                    return $this->routeTemplate($tokens, 'dataQueryTemplate');
                    break;

                }


                break;


            case 'factory' :


                return $this->routeTemplate($tokens, 'factoryTemplate');
                break;

            case 'gridQuery' :

                if (!$fileExists) {


                    return $this->routeTemplate($tokens, 'gridQueryTemplate');
                    break;

                } else {


                    break;

                }

            case 'migration' :


                return $this->routeTemplate($tokens, 'migrationTemplate');
                break;

            case 'model' :


                return $this->routeTemplate($tokens, 'modelTemplate');
                break;

            case 'modelQuery':


                return $this->routeTemplate($tokens, 'modelQueryTemplate');
                break;

            case 'allQuery':


                return $this->routeTemplate($tokens, 'allQueryTemplate');
                break;


            case 'routes' :

                if ($this->hasFront($tokens)) {

                    return $this->routeTemplate($tokens, 'routeFrontTemplate');
                    break;
                }

                return $this->routeTemplate($tokens, 'routeTemplate');
                break;

            case 'imageConfig' :

                return $this->routeTemplate($tokens, 'imageConfigTemplate');
                break;

            default :

                return 'Something went wrong';


        }
    }





}