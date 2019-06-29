<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\MediaLink;


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

        $videos = MediaLink::where('media_link_type_id', $typeId)->get();

        $video = $videos->random(1);

        $video = $video->first();

        return $video;
    }
}
