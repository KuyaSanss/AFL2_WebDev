<?php

namespace App\Http\Controllers;

use App\Models\Barang;
use Illuminate\Http\Request;

class CatalogueController extends Controller
{
    public function index(Request $request)
    {
        $cari   = $request->cari;
        $urutan = $request->urutan;

        $query = Barang::query();

        if ($cari) {
            $query->where('name', 'like', '%' . $cari . '%');
        }

        if ($urutan == 'termurah') {
            $query->orderBy('hargaJual', 'asc');
        } elseif ($urutan == 'termahal') {
            $query->orderBy('hargaJual', 'desc');
        } else {
            $query->orderBy('number', 'asc');
        }

        $barangs = $query->paginate(50)->withQueryString();

        return view('catalogue', compact('barangs', 'cari', 'urutan'));
    }
}
