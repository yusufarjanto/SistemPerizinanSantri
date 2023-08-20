<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\OrangTuaModel;

class OrangTuaController extends Controller
{
    public function index()
    {
        return view('ortu');
    }
}
