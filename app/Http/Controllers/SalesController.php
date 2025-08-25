<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;

class SalesController extends Controller
{
    //Listar las ventas anteriores
    public function index()
    {
        return Inertia::render('sales/Index');
    }
}