<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PagesController extends Controller
{
    public function account(): View
    {
        return view('auth.account');
    }
}
