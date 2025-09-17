<?php

namespace App\Http\Controllers\Public;

use App\Http\Controllers\Controller;

class OrganisasiController extends Controller
{
    public function seksi_op()
    {
        return view('public.pages.visi-misi');
    }
}
