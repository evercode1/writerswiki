<?php

namespace App\Console\Commands\RemoveCommands;


use Illuminate\Console\Command;


class RemoveConfig extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */

    protected $signature = 'remove:config
                           {Name}';


    /**
     * The console command description.
     *
     * @var string
     */

    protected $description = 'remove config file';



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

        $file = base_path('/config/'. $this->argument('Name') . '.php');

        if ( unlink($file)){

            $this->sendSuccessMessage();

            return;

        }

        $this->error('No Such file');






    }

    private function sendSuccessMessage()
    {

        $this->info('Config File for ' . $this->argument('Name') . ' successfully removed.');

    }





}
