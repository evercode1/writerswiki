<?php

namespace App\Console\Commands\RemoveCommands;

use App\Console\Commands\RemoveCommands\RemoveTraits\RemovesFiles;
use App\Console\Commands\Tokens\TokenTraits\FormatsModel;
use Illuminate\Console\Command;

class RemoveFoundation extends Command
{
    use FormatsModel, RemovesFiles;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remove:foundation
                           {ModelName}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'remove foundation files';

    public $folderName;


    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {

        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {

        $this->modelName = $this->formatModel($this->argument('ModelName'));

        $this->modelPath = $this->formatModelPath($this->argument('ModelName'));

        $this->setCommandType($this->argument('command'));

        $this->setCrudPaths();

        if ( $this->deleteFiles() ) {

            $this->sendSuccessMessage();


        } else {

            $this->error('Oops, something went wrong!');

        }

        $this->clearFilePaths();

        $this->folderName = $this->formatModelPath($this->argument('ModelName'));

        $this->modelName = $this->formatModel($this->argument('ModelName'));

        $this->setCommandType($this->argument('command'));

        $this->setViewPaths();


        $path = base_path('resources/views/'. $this->folderName);

        if ( $this->removeViewFolder($path) && $this->deleteFiles() ) {

            $this->sendViewsSuccessMessage();

            return;

        }

        $this->error('No Such Directory');


    }

    private function sendSuccessMessage()
    {

        $this->info('Crud Files successfully removed');

    }

    private function sendViewsSuccessMessage()
    {

        $this->info('View Files successfully removed');

    }



}

