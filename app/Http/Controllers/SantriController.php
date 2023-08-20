<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\SantriModel;

class SantriController extends Controller
{
    //TAMPIL SANTRI
    public function santri(Request $request)
    {
        $santri =  SantriModel::select('*')
        ->get();
        return view('tampilsantri', ['santri' => $santri]);
    }
}
