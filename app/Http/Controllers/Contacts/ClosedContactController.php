<?php

namespace App\Http\Controllers\Contacts;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class ClosedContactController extends Controller
{
    public function index()
    {

        return view('contacts.closed-contacts.index');

    }
}
