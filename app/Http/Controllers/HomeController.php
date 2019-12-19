<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\MediaLink;
use App\Profile;


class HomeController extends Controller
{
    public function index()
    {

        $video = $this->video();



        return view('home.index', compact('video'));


    }

    /**
     * @return mixed
     */
    private function video()
    {
        $typeId = DB::table('media_link_types')->where('name', 'Videos')->value('id');

        $maxVonne = Profile::where('name', 'Max Vonne')->pluck('user_id');

        $videos = MediaLink::where([['media_link_type_id', $typeId], ['user_id', $maxVonne], ['by_contributor', 1]])->get();


        $video = $videos->random(1);

        $video = $video->first();

        return $video;
    }
}
