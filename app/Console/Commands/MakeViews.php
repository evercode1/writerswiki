<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Console\Commands\Builders\Views\ViewBuilder;

class MakeViews extends Command
{

    /**
     * The name and signature of the console command.
     * Slug defaults to false.
     * @var string
     */
    protected $signature = 'make:views
                           {ModelName}
                           {MasterPage}
                           {Front=false}';

    /**
     * The console command description.
     *
     * @var string
     */

    protected $description = 'create views';


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
    public function handle(ViewBuilder $builder)
    {

        if ( $builder->makeViewFiles($this->argument()) ) {

            $this->sendSuccessMessage();

            return;

        }

        $this->error('Oops, something went wrong!');


    }

    private function sendSuccessMessage()
    {

        $this->info('Views successfully created');

    }


}
