<?php

namespace App\Http\Controllers\Backpanel;

use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function dashboard() {
        return view('backpanel.pages.dashboard');
    }
}
