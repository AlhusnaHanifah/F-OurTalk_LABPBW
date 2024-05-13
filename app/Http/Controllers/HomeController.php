<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Talk;

class HomeController extends Controller
{

    public function index()
    {
        $talks = Talk::with('comments')->get();
        return view('pages.home', compact('talks'));
    }
}
