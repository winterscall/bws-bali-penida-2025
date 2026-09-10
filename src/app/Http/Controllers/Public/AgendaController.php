<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;

class AgendaController extends Controller
{
    public function index()
    {
        return view('public.pages.agenda');
    }

    public function tv()
    {
        return view('public.pages.agenda-tv');
    }
}
