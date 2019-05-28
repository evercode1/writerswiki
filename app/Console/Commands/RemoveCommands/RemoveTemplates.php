<?php

namespace App\Console\Commands\RemoveCommands;

use App\Console\Commands\RemoveCommands\RemoveTraits\RemovesFiles;
use Illuminate\Console\Command;

class RemoveTemplates extends Command
{
    use RemovesFiles;
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'remove:templates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'remove templates folder from app';


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

        $path = base_path('/app/Templates');

        if ( $this->deleteDirectoryAndFiles($path) ) {

            $this->sendSuccessMessage();

            return;

        }

        $this->error('Oops, something went wrong!');


    }

    private function sendSuccessMessage()
    {

        $this->info('Template Files successfully removed');

    }



}

