<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Console\Commands\Builders\Seeds\AppendSeedsBuilder;

class AppendSeeds extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'append:seeds
                           {SeedsName}{GroupTitle}{syllables*}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'append to a seeds file';





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
    public function handle(AppendSeedsBuilder $seeds)
    {



        if ( $seeds->appendSeedsFiles($this->argument()) ) {

            $this->sendSuccessMessage();

            return;

        } else {


            $this->error('Oops, something went wrong!');

            return;

        }



    }

    private function sendSuccessMessage()
    {

        $this->info($this->argument('SeedsName') . ' Seeds file successfully appended');

    }


}
