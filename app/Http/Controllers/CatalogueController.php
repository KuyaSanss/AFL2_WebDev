<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class CatalogueController extends Controller
{
    public function index()
    {
        $barangs = Barang::take(3)->get();

        return view('catalogue', compact('barangs'));
    }
}