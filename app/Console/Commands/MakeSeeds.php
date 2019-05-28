<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Console\Commands\Builders\Seeds\SeedsBuilder;

class MakeSeeds extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:seeds
                           {Name}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'create a seed file';





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
    public function handle(SeedsBuilder $config)
    {



        if ( $config->makeSeedsFiles($this->argument()) ) {

            $this->sendSuccessMessage();

            return;

        } else {


            $this->error('Oops, something went wrong!');

            return;

        }



    }

    private function sendSuccessMessage()
    {

        $this->info('Seeds file successfully created');

    }


}
