<?php

namespace App\Console\Commands\Builders\ContentRouters;

use App\Console\Commands\Builders\ContentRouters\ContentTraits\HasParentAndChildAndSlug;
use App\Console\Commands\Templates\ViewTemplates\ViewTemplateAssembler;

class ViewsContentRouter
{
    use HasParentAndChildAndSlug;


    public function getContentFromTemplate($fileName, $tokens)
    {

        switch($fileName){

            case 'index' :

                return $this->routeTemplate($tokens, 'indexTemplate');

                break;

            case 'create' :

                return $this->routeTemplate($tokens, 'createTemplate');

                break;

            case 'create-form' :

                return $this->routeTemplate($tokens, 'createFormTemplate');

                break;

            case 'edit' :

                return $this->routeTemplate($tokens, 'editTemplate');

                break;

            case 'edit-form' :

                return $this->routeTemplate($tokens, 'editFormTemplate');

                break;

            case 'show' :

                return $this->routeTemplate($tokens, 'showTemplate');

                break;

            case 'component' :


                return $this->routeTemplate($tokens, 'componentTemplate');

                break;


            case 'components' :

                return $this->routeTemplate($tokens, 'componentsTemplate');

                break;


            case 'all-component' :


                return $this->routeTemplate($tokens, 'allComponentTemplate');

                break;

            case 'all-components' :

                return $this->routeTemplate($tokens, 'allComponentsTemplate');

                break;

            case 'all-index' :

                return $this->routeTemplate($tokens, 'allIndexTemplate');

                break;


            default:

                return 'Filename not recognized';



        }

    }

    private function routeTemplate($tokens, $templateName)
    {


        $builder = new ViewTemplateAssembler($tokens);

        return $builder->assembleTemplate($templateName);


    }


}