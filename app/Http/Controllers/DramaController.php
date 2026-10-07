<?php

namespace App\Http\Controllers;

use App\Models\Drama;

class DramaController extends Controller
{
    public function index()
    {
        $dramas = Drama::all();

        return view('dramas.index', ['dramas' => $dramas]);
    }
}
