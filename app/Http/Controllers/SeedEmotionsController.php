<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use EmotionSeeder;

class SeedEmotionsController extends Controller
{
    public function __construct()
    {

        $this->middleware(['auth', 'admin']);

    }


    public function index()
    {

        $this->seed('EmotionSeeds');


    }


    public function seed($filename)
    {


        $seeder = new EmotionSeeder($filename);

        $seeder->run();

        echo "you seeded the emotions";


    }

}
