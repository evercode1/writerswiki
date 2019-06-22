<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Description;

class DescriptionDetailController extends Controller
{
    public function index($type)
    {

        $description = Description::findOrFail($type);

        $contributor = 0;

        if(Auth::check()){

            $contributor = Auth::user()->is_contributor;

        }

        return view('description-detail.index', compact('description', 'contributor'));

    }
}
