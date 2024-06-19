<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PagesController extends Controller
{
    public function home(): View
    {
        return view('pages.home');
    }

    public function create(): View
    {
        return view('pages.create');
    }

    public function update(): View
    {
        return view('pages.update');
    }

    public function account(): View
    {
        return view('auth.account');
    }
}