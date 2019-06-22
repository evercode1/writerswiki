<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\ActionBeat;
use Illuminate\Support\Facades\Auth;

class ActionBeatDetailsController extends Controller
{
    public function index($type)
    {

        $actionBeat = ActionBeat::findOrFail($type);

        $contributor = 0;

        if(Auth::check()){

            $contributor = Auth::user()->is_contributor;

        }


        return view('action-beat-details.index', compact('type', 'actionBeat', 'contributor'));


    }
}
