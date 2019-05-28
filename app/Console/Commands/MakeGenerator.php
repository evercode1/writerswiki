<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Console\Commands\Builders\Generators\GeneratorBuilder;

class MakeGenerator extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:generator
                           {SeedName}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create generator controller, seeder file, views, nav, routes';





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
    public function handle(GeneratorBuilder $generator)
    {


        if ( $generator->makeGeneratorFiles($this->argument()) ) {

            $this->sendSuccessMessage();

            return;

        } else {


            $this->error('Oops, something went wrong!');

            return;

        }



    }

    private function sendSuccessMessage()
    {

        $this->info('Generator Files successfully created');

    }


}
