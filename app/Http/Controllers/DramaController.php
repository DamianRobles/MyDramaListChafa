<?php

namespace App\Http\Controllers;

class DramaController extends Controller
{
    public function index()
    {
        $dramas=[
            ['titulo'=>'Dr. Koto Shinryojo', 'anio'=>2003,'estado'=>'Finalizado'],
            ['titulo'=>'Good Luck!!', 'anio'=>2003,'estado'=>'Finalizado'],
            ['titulo'=>'Plastic Beauty', 'anio'=>2026,'estado'=>'En emision']
        ];
        return view('dramas.index', ['dramas'=>$dramas]);
    }
}
