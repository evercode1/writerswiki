<?php

namespace App\Http\Controllers\Contacts;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class OpenContactController extends Controller
{
    public function index()
    {

        return view('contacts.open-contacts.index');

    }
}
