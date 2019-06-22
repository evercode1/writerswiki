<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Emotion;
use Illuminate\Support\Facades\Auth;

class EmotionExpressionController extends Controller
{
    public function index($type)
    {

        $emotion = Emotion::findOrFail($type);

        $contributor = 0;

        if(Auth::check()){

            $contributor = Auth::user()->is_contributor;

        }


        return view('emotion-expression.index', compact('type', 'emotion', 'contributor'));


    }


}
