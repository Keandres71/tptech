<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductoController extends Controller
{
    public function index(){
        return view('Adminlte.productos.index');
    }

    public function store(){
        return view('Adminlte.productos.create');
    }
}
