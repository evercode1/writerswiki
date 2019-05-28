<?php

namespace App\Console\Commands\RemoveCommands;

use App\Console\Commands\RemoveCommands\RemoveTraits\RemovesFiles;
use App\Console\Commands\Tokens\TokenTraits\FormatsModel;
use Illuminate\Console\Command;

class RemoveGenerator extends Command
{
    use FormatsModel, RemovesFiles;

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remove:generator
                           {ModelName}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'remove generator files';

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

        //$this->setCommandType($this->argument('command'));

        //$this->setCrudPaths();

        if ( $this->removeFiles() ) {

            $this->sendSuccessMessage();

            return;

        }

        $this->error('Oops, something went wrong!');


    }

    private function sendSuccessMessage()
    {

        $this->info('Generator Files successfully removed');

    }

    private function removeFiles()
    {

        unlink(base_path('/database/seeds/' . $this->modelName . 'Seeder.php'));
        unlink(base_path('/app/Http/Controllers/' . $this->modelName . 'GeneratorController.php' ));
        unlink(base_path('/resources/views/' . $this->modelPath . '-generator/create.blade.php'));
        unlink(base_path('/resources/views/' . $this->modelPath . '-generator/create-form.blade.php'));

        rmdir(base_path('/resources/views/' . $this->modelPath . '-generator'));

        $this->removeRoute();

        return true;

    }

    private function removeRoute()
    {

        $file = base_path('/routes/web.php');

        $start = '// Begin ' . $this->modelName . ' Generator Routes';

        $end = '// End ' . $this->modelName . ' Generator Routes';

        $replaceWith = "";

        //read the entire string from file

        $content = file_get_contents($file);

        // define pattern

        $stringToDelete = $this->patternMatch($start, $end, $content);

        //replace the file string

        $updatedContent = str_replace("$stringToDelete", "$replaceWith", $content);

        //writes the entire file with updated content

        file_put_contents($file, $updatedContent);




    }




}