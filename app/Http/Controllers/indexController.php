<?php

namespace App\Http\Controllers;

use App\Gitara;
use App\Category;
use App\Master;
use App\Age;
use App\Source;
use App\Kolekcja;
use Illuminate\Http\Request;

class indexController extends Controller
{
    public function index()
    {
        $utwory = Gitara::orderBy('age_id', 'description')->where('magiel', '=', 0)->get();
        // dd($utwory);

        return view('layouts.index', compact('utwory'));
    }
}
