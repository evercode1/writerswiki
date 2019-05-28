<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Console\Commands\Templates\CopyTemplates;


class MakeTemplates extends Command
{

    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:templates';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Copy Templates folder to App folder for customization';





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

    public function handle(CopyTemplates $copier)
    {

        if ( $copier->copyTemplates() ) {

            $this->sendSuccessMessage();

            return;

        } else {


            $this->error('Oops, something went wrong!');

            return;

        }



    }

    private function sendSuccessMessage()
    {

        $this->info('Templates successfully created');

    }


}
