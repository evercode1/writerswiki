<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Console\Commands\Builders\Crud\CrudBuilder;

class MakeCrud extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:crud
                           {ModelName}
                           {Front=false}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create model, migration, route, controller, factory, test, and component';





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
    public function handle(CrudBuilder $crud)
    {


        if ( $crud->makeCrudFiles($this->argument()) ) {

            $this->sendSuccessMessage();

            return;

        } else {


            $this->error('Oops, something went wrong!');

            return;

        }



    }

    private function sendSuccessMessage()
    {

        $this->info('Crud Files successfully created');

    }


}
