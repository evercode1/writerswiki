<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Utilities\FetchInsideArrayFile;


class EmotionSeeder extends Seeder
{
    private $file;

    public function __construct($file)
    {
        $this->file = $file;

    }


    public function run()
    {


        DB::table('emotions')->truncate();



        $file = base_path('seeds/' . $this->file . '.php');



        $values = FetchInsideArrayFile::get($file);



        foreach( $values as $value){

            DB::table('emotions')->insert([
                'name' => $value,
                'is_active' => 1,
                'slug' => 'how-to-describe-' . $value . '-in-writing',
                'user_id' => Auth::id(),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}