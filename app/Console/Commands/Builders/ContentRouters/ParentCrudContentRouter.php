<?php

namespace App\Console\Commands\Builders\ContentRouters;

use App\Console\Commands\Builders\ContentRouters\ContentTraits\HasParentAndChildAndSlug;
use App\Console\Commands\Templates\CrudTemplates\CrudTemplateAssembler;

class ParentCrudContentRouter
{

    use HasParentAndChildAndSlug;


    public function getContentFromTemplate($fileName,  array $tokens, $fileExists=false)
    {

        switch($fileName){

            case 'apiController' :

                if ($fileExists){


                    return $this->routeTemplate($tokens, 'appendApiControllerTemplate');
                    break;

                } else {


                    return $this->routeTemplate($tokens, 'apiControllerTemplate');
                    break;

                }

            case 'controller' :


                if ($this->hasSlug($tokens)){

                    return $this->routeTemplate($tokens, 'controllerSlugTemplate');
                    break;

                }

                return $this->routeTemplate($tokens, 'controllerTemplate');
                break;

            case 'dataQuery' :

                if ( ! $fileExists) {


                    return $this->routeTemplate($tokens, 'dataQueryTemplate');
                    break;

                }

                break;

            case 'factory' :


                if ($this->hasSlug($tokens)){

                    return $this->routeTemplate($tokens, 'factorySlugTemplate');
                    break;
                }

                return $this->routeTemplate($tokens, 'factoryTemplate');
                break;

            case 'gridQuery' :

                if ( ! $fileExists){


                    return $this->routeTemplate($tokens, 'gridQueryTemplate');
                    break;

                } else {


                    break;

                }

            case 'migration' :

                if ($this->hasSlug($tokens)){

                    return $this->routeTemplate($tokens, 'migrationSlugTemplate');
                    break;

                }

                return $this->routeTemplate($tokens, 'migrationTemplate');
                break;

            case 'model' :

                if ($this->hasSlug($tokens)){

                    return $this->routeTemplate($tokens, 'parentModelSlugTemplate');
                    break;

                }

                return $this->routeTemplate($tokens, 'parentModelTemplate');
                break;

            case 'modelQuery':

                if ($this->hasSlug($tokens)){

                    return $this->routeTemplate($tokens, 'modelQuerySlugTemplate');
                    break;

                }

                return $this->routeTemplate($tokens, 'modelQueryTemplate');
                break;


            case 'routes' :

                if ($this->hasSlug($tokens)){

                    return $this->routeTemplate($tokens, 'routeSlugTemplate');
                    break;
                }

                return $this->routeTemplate($tokens, 'routeTemplate');
                break;


            case 'test' :


                return $this->routeTemplate($tokens, 'testTemplate');
                break;


            default :

                return 'Something went wrong';


        }

    }

    private function routeTemplate($tokens, $templateName)
    {

        $crudTemplate = new CrudTemplateAssembler($tokens);

        return $crudTemplate->assembleTemplate($templateName);

    }


}