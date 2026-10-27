<?php

namespace App\Http\Controllers;

use App\Models\Testimoni;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $testimonis = Testimoni::take(3)->get();

        return view('home', compact('testimonis'));
    }
}