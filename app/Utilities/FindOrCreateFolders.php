<?php

namespace App\Utilities;

class FindOrCreateFolders
{

    public static function make($folderNames, $basePath)
    {

        // basePath variable has to be either public_path or base_path

        // folderNames can either be string or array


        if (is_array($folderNames)) {

            if ( ! file_exists(public_path($folderNames[0])) ) {

                foreach($folderNames as $folderName){

                    mkdir($basePath($folderName));

                }

            }


        } else {


            if ( ! file_exists($basePath($folderNames))) {

                mkdir($basePath($folderNames));


            }

        }


    }





}