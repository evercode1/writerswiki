<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Emotion;

class EmotionExpressionController extends Controller
{
    public function index($type)
    {

        $emotion = Emotion::findOrFail($type);

        return view('emotion-expression.index', compact('type', 'emotion'));


    }


}
