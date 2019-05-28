<?php

namespace App\Console\Commands\Builders\ElixirAssets;

use App\Console\Commands\Builders\Writers\AssetsWriter;

class AssetsBuilder
{

    public $files = [];
    public $writer;

    public function __construct()
    {

        $this->writer = new AssetsWriter();

    }


    public function makeAssetFiles()
    {

        $this->writer->writeEachAssetFile( $this->files);

        return true;

    }

    public function setFileNamesAndPaths()
    {

        $this->files['appjs'] = base_path('resources/assets/js/app.js');
        $this->files['appscss'] = base_path('resources/assets/sass/app.scss');
        $this->files['bootstrap'] = base_path('resources/assets/js/bootstrap.js');
        $this->files['components'] = base_path('resources/assets/js/components.js');
        $this->files['main'] = base_path('resources/assets/sass/main.scss');
        $this->files['gulpfile'] = base_path('gulpfile.js');


    }




}